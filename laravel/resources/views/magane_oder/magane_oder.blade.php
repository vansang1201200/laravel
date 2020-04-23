@extends('admin.layout')

@section('title', 'Danh sách đơn hàng')

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-12"><h1>Danh Sách Đơn Hàng</h1></div>
            <div class="col-sm-12">
                <form class="form-inline" action="/searchcategory" style="margin-bottom: 20px" method="get">
                    <div class="form-group">
                        <input type="tex" class="form-control" placeholder="tên sản thể loại ..." name="search"   value="{{\Request::get('name')}}" >
                    </div>
                    {{--                                            thể loại--}}
                    {{--                                        <div class="form-group">--}}
                    {{--                                          <select name="" id="" class="form-control">--}}
                    {{--                                            <option value="">Thể loại</option>--}}
                    {{--                                          </select>--}}
                    {{--                                        </div>--}}
                    <button type="submit" class="btn btn-default"><i class="fa fa-search "></i></button>
                </form>
            </div>
            <div class="col-md-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                    </p>
                @endif
            </div>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" width="200px">Stt</th>
                    <th scope="col" width="300px">Tên Người Mua</th>
                    <th scope="col" width="300px">Tổng Tiền</th>
                    <th scope="col" width="300px">Trạng Thái</th>
                    <th colspan="2">Thao tác</th>

                </tr>
                </thead>
                <tbody>
                @if(count($all_oder) == 0)
                    <tr><td colspan="4">Không có dữ liệu</td></tr>
                @else
                    @foreach($all_oder as $key => $oder)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $oder->customer_name }}</td>
                            <td>{{ $oder->oder_total }}</td>
                            <td>{{ $oder->oder_status }}</td>



                            <td><a style="padding: 5px 10px;border:1px solid #1b1e21" href="{{url('/view-oder/'.$oder->oder_id)}}"><i class="fas fa-edit"></i></a></td>
                            <td><a style="padding: 5px 10px;border:1px solid #1b1e21" href="{{ url('/delete-oder/'.$oder->oder_id) }}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fas fa-trash-alt"></i></a></td>

                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>
    </div>
@endsection
