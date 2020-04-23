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



            <div class="register-req">
                <p>Làm ơn đăng kí hoặc đăng nhập giỏ hàng và xem lại lịch sử mua hàng</p>
            </div><!--/register-req-->

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                            <p>Điền thông tin gửi hàng  </p>
                            <div class="form-one">
                                <form action="{{url('/save-checkout-customer/')}}" method="POST">
                                    {{@csrf_field()}}
                                    <input type="text" name="shopping_name" placeholder="Họ và Tên">
                                    <input type="text" name="shopping_email" placeholder="Email">
                                    <input type="text" name="shopping_phone" placeholder="Số điện thoại">
                                    <input type="text" name="shopping_address" placeholder="Địa chỉ">
                                    <textarea name="shopping_nodes"  placeholder="Ghi chú đơn hang của bạn" rows="16"></textarea>
                                    <input type="submit" value="Gửi" name="send_oder" class="btn btn-primary btn-sm">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="review-payment">
                <h2>Xem lại giỏ hàng</h2>
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
            </div>

{{--            là phương thức thanh toán --}}
{{--            <div class="payment-options">--}}
{{--					<span>--}}
{{--						<label><input type="checkbox"> Direct Bank Transfer</label>--}}
{{--					</span>--}}
{{--                <span>--}}
{{--						<label><input type="checkbox"> Check Payment</label>--}}
{{--					</span>--}}
{{--                <span>--}}
{{--						<label><input type="checkbox"> Paypal</label>--}}
{{--					</span>--}}
{{--            </div>--}}
        </div>
    </section> <!--/#cart_items-->
@endsection
