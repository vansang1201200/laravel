@extends('admin.layout')
@section('title', 'Danh sách sản phẩm')
@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Danh Sách Sản Phẩm</h1>
            </div>

            <div class="row" style="width: 100%">
                <div class="col-8 input-group">
                    <a style="height: 65%"  class="btn btn-primary" href="{{ route('product.create') }}">Thêm mới</a>
                    <form class="form-inline" action="/searchproduct" style="margin-bottom: 20px; padding-left: 10px" method="get">
                        <div class="form-group">
                            <input type="tex" class="form-control" placeholder="tên sản phẩm ..." name="search"   value="{{\Request::get('name')}}" >
                        </div>
                        <button type="submit" class="btn btn-default"><i class="fa fa-search "></i></button>
                    </form>
                </div>
                <div class="col-4" style="float: left">
                    <a  href="{{ route('product.trash') }}" class="right btn btn-success" style="float: right"><i class="fas fa-trash-restore"></i> Thùng rác</a>
                </div>
            </div>
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                    </p>
                @endif
            </div>
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Stt</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Nhà sản xuất</th>
                    <th scope="col">Giá sản phẩm</th>`
                    <th scope="col">Ảnh</th>
                    <th scope="col">Khổi lượng</th>
                    <th scope="col"> Mô Tả </th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Nổi Bật</th>
                    <th scope="col">Chi Tiết</th>
                    <th colspan="2">Thao tác</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($products) == 0)
                    <tr><td colspan="4">Không có dữ liệu</td></tr>
                @else
                    @foreach($products as $key => $product)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->producer }}</td>
                            <td>{{number_format($product->price)}}</td>
                            <td><img src="<?= 'data:image;base64,' . $product->img ?> " width="80px" height="80px"></td>

                            <td>{{ $product->weight }}</td>
                            <td>{!! $product->describe_product !!}</td>

                            <td>{{ $product->category->name}}</td>
                            <td>
                                <a href="" class="lable {{$product->pro_hot == 0 ? 'lable-default' : 'lable-success'}} ">{{ $product->pro_hot == 0 ? 'không' : 'noi bat' }}</a>
                            </td>
                            <td> <a style="padding: 5px 10px;border:1px solid #2e2f37" href="{{route('product.detail',$product->id)}}"><i class="fas fa-eye-slash"></i></a></td>
                            <td><a style="padding: 5px 10px;border:1px solid #1b1e21" href="{{ route('product.edit', $product->id) }}"><i class="fas fa-edit"></i></a></td>
                            <td><a  style="padding: 5px 10px;border:1px solid #1b1e21; font-size:17px " href = "{{ route('product.destroy', $product->id) }}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fas fa-trash-alt"></i></a></td>

                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>
    </div>
@endsection
