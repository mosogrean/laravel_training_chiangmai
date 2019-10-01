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
            margin-top: 40px;
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
    </style>
</head>
<body>
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
    </div>
    <br>
    <br>
    <br>
    <div class="row justify-content-center">
        <h2 style="color: #f3f3f3">
            <u>แบบฟอร์ม<strong>แก้ไข</strong>หนังสือ</u>
        </h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <form action="{{ route('book.edit') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$book->id}}">
                <div class="form-group">
                    <label for="bookname">หนังสือ - นิตยสาร</label>
                    <input
                        type="text" class="form-control"
                        name="name" id="bookname"
                        aria-describedby="bookHelp"
                        placeholder="ชื่อ หนังสือ - นิตยสาร"
                        value="{{$book->name}}"
                        required
                    >
                    <small id="bookHelp" class="form-text text-muted">ชื่อหนังสือที่คุณต้องการบันทึก</small>
                </div>
                <div class="form-group">
                    <label for="booktype">ประเภทหนังสือ</label>
                    <select multiple class="form-control" id="booktype" name="type">
                        @if($book->type == "สารคดี")
                            <option selected>สารคดี</option>
                            <option>บันเทิง</option>
                            <option>develop</option>
                            <option>นิตยสาร</option>
                        @elseif($book->type == "บันเทิง")
                            <option>สารคดี</option>
                            <option selected>บันเทิง</option>
                            <option>develop</option>
                            <option>นิตยสาร</option>
                        @elseif($book->type == "develop")
                            <option>สารคดี</option>
                            <option>บันเทิง</option>
                            <option selected>develop</option>
                            <option>นิตยสาร</option>
                        @elseif($book->type == "นิตยสาร")
                            <option>สารคดี</option>
                            <option>บันเทิง</option>
                            <option>develop</option>
                            <option selected>นิตยสาร</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="author">ผู้เขียน</label>
                    <input type="text" class="form-control" name="author" id="author" placeholder="ชื่อ ผู้เขียน"
                     value="{{$book->author}}">
                </div>
                <div class="form-group">
                    <label for="describe">คำบรรยาย</label>
                    <textarea type="text" class="form-control" id="describe" name="describe">{{$book->describe}}</textarea>
                </div>

                <div class="form-group">
                    <label for="author">ราคา</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="ราคา"
                           value="{{$book->price}}"
                           required>
                </div>
                <br>
                <div align="right">
                    <button type="submit" class="btn btn-success">บันทึก</button>
                </div>

            </form>
        </div>

    </div>
</div>
</body>
</html>
