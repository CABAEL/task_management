<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    @include('template.header')
    <style>
        .signup-form {
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-4">
                <br/>
                <br/>
                <p class="redText">Note: After signing up, your account is pending for access approval of the administrator.</p>
                <hr>

                <div class="alert alert-danger" id="errorsDiv"></div>

                <form action="{{ route('signup') }}" method="POST" id="signup-form">

                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input required  type="text" name="firstname" id="firstname" class="form-control @error('firstname') is-invalid @enderror">
                    </div>

                    <div class="form-group">
                        <label for="middle">Middle Name</label>
                        <input required  type="text" name="middle" id="middle" class="form-control @error('middle') is-invalid @enderror">
                    </div>

                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input required  type="text" name="lastname" id="lastname" class="form-control @error('lastname') is-invalid @enderror">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input required  type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input required  type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Retype Password</label>
                        <input required  type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block" id="submitSignUp">Signup</button>
                </form>
                <br/>
                <a href="/"> << Cancel</a>
            </div>
            <div class="col-md-4">&nbsp;</div>
        </div>
    </div>

    @include('template.footer')
    <script src="{{asset('assets/js/custom_script.js')}}"></script>

</body>
</html>
