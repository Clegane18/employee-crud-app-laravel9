<!DOCTYPE html>
<html>
<head>
    <title>Create Employee</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
    <div class="container">
        <h2>Create New Employee</h2>

        @if(session('success'))
            <p style="color: green; text-align: center;">
                {{ session('success') }}
            </p>
        @endif

        @if($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('employees.store') }}">
            @csrf

            <label>First Name:</label>
            <input type="text" name="first_name" required>

            <label>Last Name:</label>
            <input type="text" name="last_name" required>

            <label>Gender:</label>
            <select name="gender" required>
                <option value="">-- Select --</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label>Birthday:</label>
            <input type="date" name="birthday" required>

            <label>Monthly Salary:</label>
            <input type="number" step="0.01" name="monthly_salary" required>

            <button type="submit">Save Employee</button>
        </form>

        <div style="margin-top: 10px;">
            <a href="{{ route('employees.index') }}">
                <button type="button">← Back</button>
            </a>
        </div>
    </div>
</body>
</html>
