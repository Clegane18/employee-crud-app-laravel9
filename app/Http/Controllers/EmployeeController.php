<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    /**
     * Display a listing of all employees.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new employee.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created employee in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'      => 'required|string|max:255',
            'last_name'       => 'required|string|max:255',
            'gender'          => 'required|in:male,female',
            'birthday'        => 'required|date',
            'monthly_salary'  => 'required|numeric|min:0',
        ]);

        Employee::create($validated);

        return redirect()->route('employees.create')
                         ->with('success', 'Employee added successfully!');
    }

    /**
     * Show the form for editing an existing employee.
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified employee in the database.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name'      => 'required|string|max:255',
            'last_name'       => 'required|string|max:255',
            'gender'          => 'required|in:male,female',
            'birthday'        => 'required|date',
            'monthly_salary'  => 'required|numeric|min:0',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($validated);

        return redirect()->route('employees.index')
                         ->with('success', 'Employee updated successfully!');
    }

    /**
     * Remove the specified employee from the database.
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')
                         ->with('success', 'Employee deleted successfully!');
    }

     public function summary()
    {
        $maleCount = $this->countGender('male');
        $femaleCount = $this->countGender('female');
        $averageAge = $this->calculateAverageAge();
        $totalSalary = $this->calculateTotalSalary();

        return view('employees.summary', compact('maleCount', 'femaleCount', 'averageAge', 'totalSalary'));
    }

    private function countGender($gender)
    {
        return Employee::where('gender', $gender)->count();
    }

    private function calculateAverageAge()
    {
        return Employee::all()->avg(function ($employee) {
            return Carbon::parse($employee->birthday)->age;
        });
    }

    private function calculateTotalSalary()
    {
        return Employee::sum('monthly_salary');
    }

}
