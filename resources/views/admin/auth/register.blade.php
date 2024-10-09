<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"> 
</head>
<body>
    <div class="container">
        <div class="register">
            <div class="login-app">
            <h1>Registration</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.register.post') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name"><strong>Name:</strong></label>
        <input type="text" name="name" id="name" required class="form-control" placeholder="Enter your name" size="">
    </div>

    <div class="form-group">
        <label for="email"><strong>Email:</strong></label>
        <input type="email" name="email" id="email" required class="form-control" placeholder="Enter your email">
    </div>

    <div class="form-group">
        <label for="password"><strong>Password:</strong></label>
        <input type="password" name="password" id="password" required class="form-control" placeholder="Enter your password">
    </div>

    <div class="form-group">
        <label for="password_confirmation"><strong>Confirm Password:</strong></label>
        <input type="password" name="password_confirmation" id="password_confirmation" required class="form-control" placeholder="Confirm your password">
    </div>

    <button type="submit" class="btn btn-primary">Register</button>
</form>


            <!-- <div class="login-link" style="margin-top: 20px; text-align: center;">
                <strong>Already have an account?</strong>
                <a href="{{ route('admin.login') }}" class="btn btn-secondary" style="margin-left: 10px;">Login</a>
            </div> -->
        </div>
        </div>
    </div>
</body>
</html>
