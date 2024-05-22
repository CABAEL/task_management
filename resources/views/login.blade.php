<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @include('template.header')
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-form {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h3 class="text-center mb-4">{{env('APP_NAME')}}</h3>
        <p class="myName">By: Mark Valles</p>
        <hr/>
        <form action="{{ route('authenticate') }}" id="loginForm" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" id="loginBtn">Login</button>
            </div>
        </form>
        <p>Don't have an account? Sign up <a href="/signupform">Here.</a></p></button>
    </div>
    @include('template.footer')
    <script src="{{asset('assets/js/custom_script.js')}}"></script>

</body>
</html>
