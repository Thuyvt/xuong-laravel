<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách danh mục</title>
</head>
<body>
    <h1>List danh mục</h1>
    <a href="{{route('categories.create')}}">Thêm mới</a>
    {{--    Hiển thị messge --}}
    @if(session('msg'))
        <h2>{{session('msg')}}</h2>
    @endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td>
                        <a href="{{route('categories.show', $item)}}">Chi tiết</a>
                        <a href="{{route('categories.edit', $item)}}">Sửa</a>
                        <form action="{{route('categories.destroy', $item)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('chawcs chan xoa khong')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$data->links()}}
</body>
</html>
