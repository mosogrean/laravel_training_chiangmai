<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book</title>
</head>
<body>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>รูปหนังสือ</th>
                <th>หนังสือ</th>
                <th>ผู้เขียน</th>
                <th>คำบรรยาย</th>
                <th>ราคา</th>
                <th>ประเภท</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $key => $book)
                <tr>
                    <th>{{ $key + 1 }}</th>
                    <th>{{ $book->pic }}</th>
                    <th>{{ $book->name }}</th>
                    <th>{{ $book->author }}</th>
                    <th>{{ $book->describe }}</th>
                    <th>{{ $book->price }}</th>
                    <th>{{ $book->type }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
