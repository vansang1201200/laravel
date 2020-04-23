@extends('layuot')
@section('content')

    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Kết Quả Tìm Kiếm</h2>
        @foreach($search_home as $productHots)
            <a href="{{url('/product/'.$productHots->id)}}">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="<?= 'data:image;base64,' . $productHots->img ?> " width="80px" height="200px"  alt="" />
                                <h2>{{ $productHots->price .' '.'VNĐ'}}</h2>
                                <p>{{$productHots->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified" >
                                <li><a href="#"><i class="fa fa-plus-square"></i>Yêu Thích</a></li>
                                <li><a href="#"><i class="fa fa-plus-square"></i>So Sánh</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </a>
        @endforeach
    </div>

{{--    //sản phẩm--}}
{{--    <div class="category-tab">--}}
{{--        <div class="col-sm-12">--}}
{{--            <ul class="nav nav-tabs">--}}
{{--                <li class="active"><a href="#tshirt" data-toggle="tab">Sản Phẩm</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <div class="tab-content">--}}
{{--            <div class="tab-pane fade active in" id="tshirt" >--}}
{{--                @foreach($search_home as $products)--}}
{{--                    <a href="{{url('/product/'.$products->id)}}">--}}
{{--                        <div class="col-sm-3">--}}
{{--                            <div class="product-image-wrapper">--}}
{{--                                <div class="single-products">--}}
{{--                                    <div class="productinfo text-center">--}}
{{--                                        <img src="<?= 'data:image;base64,' . $products->img ?> " width="20px" height="100px" alt="" />--}}
{{--                                        <h2>{{$products->name}}</h2>--}}
{{--                                        <p>Easy Polo Black Edition</p>--}}
{{--                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
