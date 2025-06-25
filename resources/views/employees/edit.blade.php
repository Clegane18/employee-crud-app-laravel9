<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
    <div class="container">
        <h2>Edit Employee</h2>

        @if($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('employees.update', $employee->id) }}">
            @csrf
            @method('PUT')

            <label>First Name:</label>
            <input type="text" name="first_name" value="{{ $employee->first_name }}" required>

            <label>Last Name:</label>
            <input type="text" name="last_name" value="{{ $employee->last_name }}" required>

            <label>Gender:</label>
            <select name="gender" required>
                <option value="">-- Select --</option>
                <option value="male" {{ $employee->gender === 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $employee->gender === 'female' ? 'selected' : '' }}>Female</option>
            </select>

            <label>Birthday:</label>
            <input type="date" name="birthday" value="{{ $employee->birthday }}" required>

            <label>Monthly Salary:</label>
            <input type="number" step="0.01" name="monthly_salary" value="{{ $employee->monthly_salary }}" required>

            <button type="submit">Update Employee</button>
        </form>

        <div>
            <a href="{{ route('employees.index') }}">
                <button type="button">← Back</button>
            </a>
        </div>
    </div>
</body>
</html>
