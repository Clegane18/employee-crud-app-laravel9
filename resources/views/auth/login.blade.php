<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <h2>Login</h2>

        @if(session('success'))
            <p style="color: green">{{ session('success') }}</p>
        @endif

        @if(session('error'))
            <p style="color: red">{{ session('error') }}</p>
        @endif

        @if($errors->any())
            <p style="color: red">{{ $errors->first() }}</p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
