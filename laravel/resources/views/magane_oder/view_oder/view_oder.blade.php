@extends('admin.layout')

@section('title', 'Thông Tin Người Mua')

@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-12"><h1>Thông Tin Người Mua</h1></div>

            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead class="thead-dark">
                <tr>

                    <th scope="col" width="300px">Tên Khách Hàng</th>
                    <th scope="col" width="300px">Số Điện Thoại</th>


                </tr>
                </thead>
                <tbody>


                        <tr>

                            <td>{{$oder_view[0]->customer_name}}</td>
                            <td>{{$oder_view[0]->customer_phone}}</td>

                        </tr>
                </tbody>
            </table>

        </div>
    </div>
    <br><br>

    <div class="col-md-12">
        <div class="row">
            <div class="col-12"><h1>Thông Tin Vận Chuyển</h1></div>

            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead class="thead-dark">
                <tr>

                    <th scope="col" width="300px">Tên Người Vận Chuyển</th>
                    <th scope="col" width="300px">Địa Chỉ</th>
                    <th scope="col" width="300px">Số Điện Thoại</th>


                </tr>
                </thead>
                <tbody>


                <tr>

                    <td>{{$oder_view[0]->shopping_name}}</td>
                    <td>{{$oder_view[0]->shopping_address}}</td>
                    <td>{{$oder_view[0]->shopping_phone}}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

    <br><br>

    <div class="col-md-12">
        <div class="row">
            <div class="col-12"><h1>Chi Tiết Đơn Hàng</h1></div>

            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead class="thead-dark">
                <tr>

                    <th scope="col" width="300px">Tên Sản Phẩm</th>
                    <th scope="col" width="300px">Số Lượng</th>
                    <th scope="col" width="300px">Giá</th>
                    <th scope="col" width="300px">Tổng Tiền</th>


                </tr>
                </thead>
                <tbody>


                <tr>

                    <td>{{$oder_view[0]->product_name}}</td>
                    <td>{{$oder_view[0]->product_sales_quantity}}</td>
                    <td>{{$oder_view[0]->product_price}}</td>
                    <td>{{$oder_view[0]->oder_total}}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
