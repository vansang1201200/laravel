@extends('layuot')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/">Trang Chủ</a></li>
                    <li class="active">Thanh Toán Giỏ Hàng</li>
                </ol>
            </div><!--/breadcrums-->




            <div class="review-payment">
                <h2>Xem lại giỏ hàng</h2>
            </div>
            <div class="table-responsive cart_info">

                <?php

                $content = Cart::content();
                //                echo '<pre>';
                //                print_r($content);
                //                echo '</pre>';
                ?>

                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình Ảnh</td>
                        <td class="description">Mô Tả</td>
                        <td class="weight">Khối Lượng</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số Lượng</td>
                        <td class="total">Tổng Tiền</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($content as $v_content)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img  src="<?= 'data:image;base64,' . $v_content->options->image ?> " width="50px" height="50px" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$v_content->name}}</a></h4>
                                <p>{{$v_content->id}}</p>
                            </td>

                            <td class="cart_weight">
                                <p>{{$v_content->weight}}</p>
                            </td>

                            <td class="cart_price">
                                <p>{{number_format($v_content->price).' '.'VNĐ'}}</p>
                            </td>

                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    {{--                                <a class="cart_quantity_up" href=""> + </a>--}}
                                    <form action="{{url('/update_cart/')}}"  method="POST">
                                        {{@csrf_field()}}
                                        <input class="cart_quantity_input" type="text" name="quantity_cart" value="{{$v_content->qty}}" size="2">

                                        <input type="hidden" value="{{ $v_content->rowId}}" name="rowId_cart" class="form-control">

                                        <input type="submit" value="update" name="update_cart" class="btn btn-default btn-sm">

                                        {{--                                <a class="cart_quantity_down" href=""> - </a>--}}
                                    </form>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                    {{Cart::subtotal()}}

                                    {{--                             $subtotal = $v_content->price * $v_content->qty;--}}
                                    {{--                             echo number_format($subtotal).' '.'vnđ';--}}

                                </p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{url('/delete_cart/'. $v_content->rowId)}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <h4 style="margin: 40px 0; font-size:20px">Chọn Hình Thức Thanh Toán</h4>
            <form action="{{url('/oder-payment')}}" method="POST">
                {{@csrf_field()}}
            <div class="payment-options">
					<span>
						<label><input name="payment_option" value="1" type="checkbox"> Thanh Toán Bằng ATM</label>
					</span>
                <span>
						<label><input name="payment_option" value="2" type="checkbox"> Thanh Toán Bằng Tiền Mặt</label>
					</span>
                <span>
						<label><input name="payment_option" value="3" type="checkbox"> Thanh Toán Paypal</label>
					</span>
                <input type="submit" value="Đặt Hàng" name="oder_detail" class="btn btn-primary btn-sm">
            </div>
            </form>
        </div>
    </section> <!--/#cart_items-->
@endsection
