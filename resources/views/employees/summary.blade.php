<!DOCTYPE html>
<html>
<head>
    <title>Employee Summary</title>
    <link rel="stylesheet" href="{{ asset('css/summary.css') }}">
</head>
<body>
    <div class="container">
        <h2>Employee Summary</h2>

        <div class="summary-grid">
            <div class="summary-card">
                <h3>Male Employees</h3>
                <p>{{ $maleCount }}</p>
            </div>
            <div class="summary-card">
                <h3>Female Employees</h3>
                <p>{{ $femaleCount }}</p>
            </div>
            <div class="summary-card">
                <h3>Average Age</h3>
                <p>{{ number_format($averageAge, 1) }} years</p>
            </div>
            <div class="summary-card">
                <h3>Total Salary</h3>
                <p>₱{{ number_format($totalSalary, 2) }}</p>
            </div>
        </div>

        <a href="{{ route('employees.index') }}">
            <button type="button">← Back to List</button>
        </a>
    </div>
</body>
</html>
