<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Doctor Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                    <h4>Doctor Login</h4>
                    <hr>
                    <form action="{{ route('doctor.check') }}" method="post" autocomplete="off">
                        @csrf
                        @if (Session::get('Fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('Fail') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter email address"
                                value="{{ old('email') }}">
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
                        </div><br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form><br>
                    <a href="{{ route('doctor.register') }}">Create New account</a>
                </div>
            </div>
        </div>
    </body>

</html>
