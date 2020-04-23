<div class="container" >
    <div class="row">
        <div class="col-sm-4">
            <div class="logo pull-left">
                <a href="index.html"><img src="images/home/logo.png" alt="" /></a>
            </div>
            <div class="btn-group pull-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                        USA
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Canada</a></li>
                        <li><a href="#">UK</a></li>
                    </ul>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                        DOLLAR
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Canadian Dollar</a></li>
                        <li><a href="#">Pound</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="shop-menu pull-right">
                <ul class="nav navbar-nav">
{{--                    <li><a href="{{url('/checkuot-login/')}}"><i class="fa fa-user"></i> Tài Khoản</a></li>--}}


                    <li><a href="#"><i class="fa fa-star"></i> Yêu Thích </a></li>


                    <?php
                    $customer_id = Session::get('customer_id');
                    $shopping_id = Session::get('shopping_id');
                    if($customer_id != null && $shopping_id == null){
                    ?>

                    <li><a href="{{url('/checkuot')}}"><i class="fa fa-crosshairs"></i> Thanh Toán</a></li>
                    <?php
                    }elseif($customer_id !=null && $shopping_id!=null){
                     ?>

                    <li><a href="{{url('/payment/')}}"><i class="fa fa-lock"></i>Thanh Toán</a></li>
                    <?php
                    }else{
                    ?>

                    <li><a href="{{url('/checkuot-login/')}}"><i class="fa fa-lock">Thanh Toán</i></a></li>
                    <?php
                    }
                    ?>



                    <li><a href="{{url('/show_cart/')}}"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a></li>
                    <?php
                    $customer_id = Session::get('customer_id');
//                    $shopping_id = Session::get('shopping_id');
                    if($customer_id != null){
                    ?>
                    <li><a href="{{url('/checkuot-loguot')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>

{{--                    <?php--}}
{{--                    }--}}
{{--                    elseif($customer_id != null && $shopping_id !=null){--}}
{{--                    ?>--}}
{{--                    --}}
{{--                    <li><a href="{{url('/payment')}}"><i class="fa fa-lock"></i> </a></li>--}}

                    <?php
                    }else{
                        ?>

                    <li><a href="{{url('/checkuot-login')}}"><i class="fa fa-lock"></i> Đăng Nhập</a></li>
                    <?php
                    }
                    ?>


                </ul>
            </div>
        </div>
    </div>
</div>
