<!-- resources/views/admin/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"> 
</head>
<body>
    <div class="container">
        <div class="login-app">
         <h1 class="tit"><img src="{{ asset('images/icon.png') }}" alt="icon"> To-do List</h1>   
        <h1><img src="{{ asset('images/logo2.png') }}" alt="logo">Sign In</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email"> <strong>Email:</strong> </label>
                <input type="email" name="email" id="email" required class="form-control" placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label for="password"> <strong>Password:</strong> </label>
                <input type="password" name="password" id="password" required class="form-control" placeholder="Enter your password">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div class="register-link" style="margin-top: 20px; text-align: center;">
                <strong>Don't have an account?</strong>
                <a href="{{ route('admin.register') }}" class="btn btn-secondary" style="margin-left: 10px;">Register</a>
            </div>
        </div>
    </div>
</body>
</html>

