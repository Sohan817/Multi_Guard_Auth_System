<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Dash Board | Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <div class="col-md-6 offset-md-3" style="margin-top: 45px;">
                <h4>User Dashboard</h4>
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ Auth::guard('web')->user()->name }}</td>
                            <td>{{ Auth::guard('web')->user()->email }}</td>
                            <td><a href="{{ route('user.logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>
                                <form action="{{ route('user.logout') }}" method="POST" class="d-none"
                                    id="logout-form">@csrf</form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>

</html>
