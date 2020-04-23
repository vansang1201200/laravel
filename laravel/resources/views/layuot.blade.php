<!DOCTYPE html>
<html lang="en">
{{--head--}}
@include('partials.home.head')
<body>

{{--   echo Session::get('customer_id');--}}
{{--    echo Session::get('shopping_id');--}}

<header id="header" style= "font-size:25px"><!--header-->

    <div class="header_top" ><!--header_top-->
        @include('partials.home.header_top')
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        @include('partials.home.header_middle')
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        @include('partials.home.header_bottom')
    </div><!--/header-bottom-->
</header><!--/header-->

<section id="slider"><!--slider-->
    @include('partials.home.slider')
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                   <!--/category-products-->
                         @include('partials.home.category_product')
                    <div class="brands_products"><!--brands_products-->
                         @include('partials.home.brands_product')
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->



{{--                        @include('partials.home.price_range')--}}



                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        @include('partials.home.shipping')
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                @yield('content')
            </div>
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
       @include('partials.home.footer_top')
    </div>

    <div class="footer-widget">
{{--        @include('partials.home.footer_widget')--}}
    </div>

    <div class="footer-bottom">
        @include('partials.home.footer_botom')
    </div>

</footer><!--/Footer-->

{{--js--}}
@include('partials.home.js')

</body>
</html>
