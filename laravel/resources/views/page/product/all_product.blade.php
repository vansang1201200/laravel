@extends('layuot')
@section('content')

    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Sản Phẩm</h2>
        @foreach($all_product as $productHots)
            <a href="{{url('/product/'.$productHots->id)}}">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="<?= 'data:image;base64,' . $productHots->img ?> " width="80px" height="200px"  alt="" />
                                <h2>{{number_format($productHots->price).' '.'VNĐ'}}</h2>
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
    @endsection
