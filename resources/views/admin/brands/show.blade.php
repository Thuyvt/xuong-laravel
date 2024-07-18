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
    <h1>Chi tiết thương hiệu</h1>
    {{--    @dd($category->toArray())--}}
    <ul>
        @foreach($brand->toArray() as $column => $value)
            <li>{{$column}}: {{$value}}</li>
        @endforeach
    </ul>

{{--    <p>Tên danh mục: {{$category->name}}</p>--}}
</body>
</html>
