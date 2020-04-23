@extends('admin.layout')
@section('title', 'Danh sách sản phẩm')
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-12"><h1>Chi Tiết Sản Phẩm</h1></div>
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" width="300px">Tên Sản Phẩm</th>
                    <th scope="col" width="300px">Nhà Sản Xuất</th>
                    <th scope="col" width="300px">Ảnh</th>
                    <th scope="col" width="300px">Khối Lượng</th>
                    <th scope="col"> Mô Tả </th>
                    <th scope="col"> Thể Loại</th>
                    <th scope="col">Nổi Bật</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td> {{$show_product->name}}</td>
                    <td>{{$show_product->producer}}</td>
                    <td>{{$show_product->price}}</td>
                    <td><img src="<?= 'data:image;base64,' . $show_product->img ?> " width="80px" height="80px"></td>
                    <td>{!! $show_product->describe_product !!}</td>
                    <td>{{$show_product->category_id}}</td>
                    <td>{{$show_product->pro_hot}}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>












@endsection
