@extends('admin.layouts.master')

@section('title')
    Danh sách sản phẩm
@endsection

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bảng danh sách</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tên</th>
                        <th>Mã</th>
                        <th>Ảnh</th>
                        <th>Danh mục</th>
                        <th>Giá niêm yết</th>
                        <th>Giá sale</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Tên</th>
                        <th>Mã</th>
                        <th>Ảnh</th>
                        <th>Danh mục</th>
                        <th>Giá niêm yết</th>
                        <th>Giá sale</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->sku}}</td>
                            <td>
                                <div style="width: 100px; height: 100px">
                                    <img src="{{$item->img_thumbnail}}" alt=""
                                         style="max-width: 100%; max-height: 100%;">
                                </div>

                            </td>
                            <td>{{$item->category ?  $item->category->name  : ''}}</td>
                            <td>{{$item->price_regular}}</td>
                            <td>{{$item->price_sale}}</td>
                            <td>{!! $item->is_active == 0 ?  '<span class="badge bg-danger text-white">NO</span>'
                                                                :  '<span class="badge bg-primary text-white">YES</span>'!!}</td>
                            <td>
                                <button class="btn btn-info">
                                    <a href="{{route('admin.products.show', $item)}}" class="text-white">Xem</a>
                                </button>
                                <button class="btn btn-success">
                                    <a href="{{route('admin.products.edit', $item)}}" class="text-white">Sửa</a>
                                </button>
                                <button class="btn btn-danger">
                                    <a href="{{route('admin.products.destroy', $item)}}" class="text-white">Xóa</a>
                                </button>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

@section('script-libs')
    <!-- Page level plugins -->
    <script src="{{asset('theme/admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('theme/admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('theme/admin/js/demo/datatables-demo.js')}}"></script>
@endsection
@section('style-libs')
    <link href="{{asset('theme/admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
