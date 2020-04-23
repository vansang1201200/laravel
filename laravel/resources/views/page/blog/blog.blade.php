@extends('layuot')
@section('content')
    <div class="col-sm-9">
        <div class="blog-post-area">
            <h2 class="title text-center">Tin Tức Về Sản Phẩm</h2>
            @foreach($all_blog as $blog)
            <div class="single-blog-post">
                <h3>{{$blog->name_blog}}</h3>
                <div class="post-meta">
                    <ul>
                        <li><i class="fa fa-user"></i> Mac Doe</li>
                        <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                        <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                    </ul>
                    <span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
                </div>
                <a href="">
                    <img src="images/blog/blog-one.jpg" alt="">
                </a>
                <p>{!!$blog->description_blog!!}</p>
                <a  class="btn btn-primary" href="">Read More</a>
            </div>
            @endforeach

        </div>
    </div>


 @endsection
