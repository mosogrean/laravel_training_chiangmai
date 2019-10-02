<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <style>
        body {
            color: white;
            background: #414141;
        }
        .main {
            text-decoration: none;
            color: white;
        }
        .main:hover {
            text-decoration: none;
            color: #4dc0b5;
        }
        .login {
            font-size: 1.3em;
        }
        .login:hover {
            background-color: #1d643b;
            border-radius: 1.1em;
        }

        .regis {
            font-size: 1.3em;
        }

        .regis:hover {
            background-color: #1b5264;
            border-radius: 1.1em;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-sm bg-dark">

        <!-- Links -->
        <div class="container justify-content-end">
            <div class="row">
                <div class="col-12" align="right">

                    @if(!empty(\Illuminate\Support\Facades\Auth::user()))
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link login" href="{{ route('user.logout') }}" style="color: white">{{
                                \Illuminate\Support\Facades\Auth::user()->name
                                }}</a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link login" href="{{ route('user.login.page') }}" style="color: white">เข้าสู่ระบบ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link regis" href="{{ route('user.regis.page') }}" style="color: #a1cbef">สมัครสมาชิก</a>
                            </li>
                        </ul>
                    @endif




                </div>
            </div>
        </div>
    </nav>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <h1>
                    <strong>
                        <a href="{{ route('book.index') }}" class="main">
                            Book Store
                        </a>
                    </strong>
                </h1>
            </div>
            <div class="col-2 offset-7" align="right">
                <h1>
                    <a href="{{ route('book.create.index') }}"
                       class="btn btn-primary"
                    >
                        + Add Book
                    </a>
                </h1>
            </div>
        </div>
        <br>
        <div class="row align-content-center">
            <div class="col-12">
                <table class="table table-hover table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">รูปหนังสือ</th>
                        <th scope="col">หนังสือ</th>
                        <th scope="col">ผู้เขียน</th>
                        <th scope="col">คำบรรยาย</th>
                        <th scope="col">ราคา</th>
                        <th scope="col">ประเภท</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $key => $book)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $book->pic }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->describe }}</td>
                            <td>{{ $book->price }}</td>
                            <td>{{ $book->type }}</td>
                            <td>
                                <a href="{{ route('book.edit.index', $book->id) }}"
                                   class="btn btn-outline-warning"
                                >
                                    แก้ไข
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('book.delete', $book->id) }}"
                                   class="btn btn-danger"
                                >
                                    ลบ
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
