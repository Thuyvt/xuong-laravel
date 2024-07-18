<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Cập nhật thương hiệu</h1>
    @if(session('msg'))
        <h2>{{session('msg')}}</h2>
    @endif
    <form action="{{route('brands.update', $brand)}}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Tên:</label>
        <input type="text" name="name" id="name" value="{{$brand->name}}">
        <button type="submit">Tạo mới</button>
    </form>
</body>
</html>
