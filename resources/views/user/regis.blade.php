<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        body {
            margin-top: 40px;
            color: white;
            background: #414141;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-3">
                <h1><strong>สมัครสมาชิก</strong></h1>
            </div>
        </div>
        @if(session('error'))
            <div class="row">
                <div class="col-3 offset-3">
                    <h3 style="color: red">{{ session('error') }}</h3>
                </div>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="{{route('user.regis')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input
                            type="text" class="form-control"
                            id="name" placeholder="Enter Your Name" name="name"
                        >
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input
                            type="email" class="form-control"
                            id="email" aria-describedby="emailHelp" placeholder="Enter Email" name="email"
                        >
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="confirmPass">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPass" placeholder="Confirm Password" name="password_confirmation">
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-3 offset-9" align="right">
                                <button type="submit" class="btn btn-primary">สมัคร</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
</html>
