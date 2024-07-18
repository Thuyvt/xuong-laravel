@extends('admin.layouts.master')

@section('title')
    Thêm mới danh mục sản phẩm
@endsection

@section('content')
    <form action="{{route('admin.catalogues.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Tên:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                </div>
                <div class="mb-3 mt-3">
                    <label for="is_active" class="form-check-label">
                        <input type="checkbox" class="form-check-input" id="is_active" value="1" checked name="is_active">
                        Kích hoạt
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="cover" class="form-label">Ảnh đại diện:</label>
                    <input type="file" class="form-control" id="cover" name="cover">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Tạo mới</button>
    </form>
@endsection
