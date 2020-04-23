@extends('layuot')
@section('content')


    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/">Trang Chủ</a></li>
                    <li class="active">Giỏ Hàng Của Bạn</li>
                </ol>
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
{{--                            <h4><a href="">{{$v_content->name}}</a>--}}
{{--                            <p>{{$v_content->id}}</p>--}}
                                <p>{{$v_content->name}}</p>
                        </td>

                        <td class="cart_weight">
                            <p>{{$v_content->weight. ' '.'ml'}}</p>
                        </td>

                        <td class="cart_price">
                            <p>{{number_format($v_content->price).' '.'VNĐ'}}</p>
                        </td>

                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                             <form action="{{url('/update-cart/')}}"  method="POST">
                                 {{@csrf_field()}}
                                <input class="cart_quantity_input" type="text" name="quantity_cart" value="{{$v_content->qty}}" size="2">

                                <input type="hidden" value="{{ $v_content->rowId}}" name="rowId_cart" class="form-control">

                                <input type="submit" value="update" name="update_cart" class="btn btn-default btn-sm">

                             </form>

                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                {{Cart::subtotal().''.'VNĐ'}}


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
    </section> <!--/#cart_items-->
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>Thanh toán giỏ hàng</h3>
                <p>Thông tin chi tiết đơn hàng của bạn.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Tổng <span> {{Cart::subtotal().''.'VNĐ'}}</span></li>
                            <li>Phí Vận Chuyên <span>Free</span></li>
                            <li>Thành Tiền <span>{{Cart::subtotal().''.'VNĐ'}}</span></li>
                        </ul>
{{--                        <a class="btn btn-default update" href="">Update</a>--}}
                        <?php
                        $customer_id = Session::get('customer_id');
                        if($customer_id != null){
                        ?>
                        <a href="{{url('/checkuot')}}" class="btn btn-default check_out" > Thanh Toán</a>
                        <?php
                        }else{
                        ?>
                        <a href="{{url('/checkuot-login/')}}" class="btn btn-default check_out"> Thanh tóan</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
@endsection


