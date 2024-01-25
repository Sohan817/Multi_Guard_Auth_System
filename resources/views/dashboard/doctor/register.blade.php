<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Doctor Register</title>
        <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

    <body class="bg-info">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                    <h4>Doctor Register</h4>
                    <hr>
                    <form action="{{ route('doctor.create') }}" method="POST" autocomplete="off">
                        @csrf
                        @if (Session::get('Success'))
                            <div class="alert alert-success">
                                {{ Session::get('Success') }}
                            </div>
                        @endif
                        @if (Session::get('Failed'))
                            <div class="alert alert-danger">
                                {{ Session::get('Failed') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name"
                                value="{{ old('name') }}">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="hospital">Hospital</label>
                            <input type="text" class="form-control" name="hospital" placeholder="Enter hospital name"
                                value="{{ old('hospital') }}">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email"
                                placeholder="Enter email address"value="{{ old('email') }}">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password"
                                value="{{ old('password') }}">
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password"
                                value="{{ old('cpassword') }}">
                            <span class="text-danger">
                                @error('cpasword')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div><br>
                        <div class="from-group">
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </div><br>
                        <a href="{{ route('doctor.login') }}">Already have an account?</a>
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>
