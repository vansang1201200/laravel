@extends('admin.layout')
@section('title', 'Danh sách sản phẩm')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Danh Sách Sản Phẩm Đã Bị Xóa</h1>
            </div>
            <p class="col-12">
                <a style="padding: 10px" href="{{ route('product.restoreAll') }}" class="btn btn-success"><i
                        class="fas fa-trash-restore"></i> Khôi phục tất cả</a>
                <a href="{{ route('product.deleteAll') }}" style="float:right" class="btn btn-danger">
                    <button type="submit"
                            onclick="return confirm('Xóa xong sẽ không thể hồi phục. \n\nBạn chắc chắn muốn xóa tất cả?')"
                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Xóa tất cả
                    </button>
                </a>
            </p>

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
                    <th scope="col">Giá sản phẩm</th>
                    `
                    <th scope="col">Ảnh</th>
                    <th scope="col">Khổi lượng</th>
                    <th scope="col"> Mô Tả</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Nổi Bật</th>
                    <th scope="col">Chi Tiết</th>
                    {{--                    <th colspan="2">Thao tác</th>--}}
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($products) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($products as $key => $product)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->producer }}</td>
                            <td>{{ $product->price }}</td>
                            <td><img src="<?= 'data:image;base64,' . $product->img ?> " width="80px" height="80px"></td>

                            <td>{{ $product->weight }}</td>
                            <td>{!! $product->describe_product !!}</td>

                            <td>{{ $product->category->name}}</td>
                            <td>
                                <a href=""
                                   class="lable {{$product->pro_hot == 0 ? 'lable-default' : 'lable-success'}} ">{{ $product->pro_hot == 0 ? 'không' : 'noi bat' }}</a>
                            </td>
                            {{--                            <td> <a style="padding: 5px 10px;border:1px solid #2e2f37" href="{{route('product.detail',$product->id)}}"><i class="fas fa-eye-slash"></i></a></td>--}}
                            {{--                            <td><a style="padding: 5px 10px;border:1px solid #1b1e21" href="{{ route('product.edit', $product->id) }}"><i class="fas fa-edit"></i></a></td>--}}
                            {{--                            <td><a  style="padding: 5px 10px;border:1px solid #1b1e21; font-size:17px " href = "{{ route('product.destroy', $product->id) }}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fas fa-trash-alt"></i></a></td>--}}

                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{ route('product.index') }}"> Thoát </a>
        </div>
    </div>
@endsection
