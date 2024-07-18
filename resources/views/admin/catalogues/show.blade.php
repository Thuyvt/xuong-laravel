@php use Illuminate\Support\Facades\Storage;
 use Illuminate\Support\Str;
@endphp
@extends('admin.layouts.master')

@section('title')
    Danh sách danh mục sản phẩm
@endsection

@section('content')
    <table>
        <thead>
        <tr>
            <th>Trường</th>
            <th>Giá trị</th>
        </tr>
        </thead>
        <tbody>
        @foreach($model->toArray() as $key=>$value)
            <tr>
                <td>{{$key}}</td>
                <td>
                @php
                    if ($key == 'cover') {
                        $url = Storage::url($value);
                        echo "<img src=\"$url\" width=\"50px\">";
                    } elseif (Str::contains($key, 'is_')) {
                        echo $value ? "<span class=\"badge bg-primary\">Kích hoạt</span>" :
                        "<span class=\"badge bg-danger\">Ngừng kích hoạt</span>";
                    } elseif ($key == 'created_at' || $key == 'updated_at') {
                        echo date('d-m-Y', strtotime($value));
                    } else {
                        echo $value;
                    }
                @endphp
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
