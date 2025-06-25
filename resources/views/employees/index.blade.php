<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
</head>
<body>
    <div class="container">

        <!-- Action Buttons: Logout, View Summary, Add Employee -->
        <div class="action-buttons">
            <div class="left-buttons">
                <a href="{{ route('employees.create') }}">
                    <button type="button">Add New Employee</button>
                </a>
                <a href="{{ route('employees.summary') }}">
                    <button type="button">View Summary</button>
                </a>
            </div>
            <div class="right-button">
                <button type="button" class="logout-button" onclick="openLogoutModal()">Logout</button>
            </div>
        </div>

        <h2>Employee Records</h2>

        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Birthday</th>
                    <th>Monthly Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($employees as $employee)
                    <tr>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ ucfirst($employee->gender) }}</td>
                        <td>{{ $employee->birthday }}</td>
                        <td>{{ number_format($employee->monthly_salary, 2) }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $employee->id) }}">
                                <button type="button">Edit</button>
                            </a>

                            <button type="button" onclick="openDeleteModal({{ $employee->id }})">Delete</button>

                            <form id="delete-form-{{ $employee->id }}" action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No employees found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Delete Confirmation Modal --}}
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <h3>Confirm Deletion</h3>
            <p>Are you sure you want to delete this employee?</p>
            <div class="modal-actions">
                <button type="button" onclick="closeModal()">Cancel</button>
                <button type="button" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>

    {{-- Logout Confirmation Modal --}}
    <div id="logoutModal" class="modal">
        <div class="modal-content">
            <h3>Confirm Logout</h3>
            <p>Are you sure you want to log out?</p>
            <div class="modal-actions">
                <button type="button" onclick="closeLogoutModal()">Cancel</button>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(employeeId) {
            document.getElementById('deleteModal').style.display = 'block';
            document.getElementById('confirmDeleteBtn').onclick = function () {
                document.getElementById('delete-form-' + employeeId).submit();
            };
        }

        function closeModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        function openLogoutModal() {
            document.getElementById('logoutModal').style.display = 'block';
        }

        function closeLogoutModal() {
            document.getElementById('logoutModal').style.display = 'none';
        }
    </script>
</body>
</html>
