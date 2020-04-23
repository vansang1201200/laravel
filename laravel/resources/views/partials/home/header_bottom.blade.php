<div class="container" >
    <div class="row">
        <div class="col-sm-6">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="mainmenu pull-left">
                <ul class="nav navbar-nav collapse navbar-collapse">
                    <li><a href="./" class="active">Trang Chủ</a></li>
                    <li class="dropdown"><a href="#">Sản Phẩm<i class="fa fa-angle-down"></i></a>
                        <ul role="menu" class="sub-menu">
                            <li><a href="{{url('/all-product')}}">Products</a></li>
                        </ul>
                    </li>
                    <li class="active"><a href="{{url('/show-blog')}}">Tin Tức</a>
                    </li>
                    <li><a href="{{url('/show_cart')}}">Giỏ Hàng</a></li>
                    <li><a href="{{url('/show-contact')}}">Liên Hệ</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6">
            <form method="POST" action="{{url('/search-home')}}">
                {{@csrf_field()}}
            <div class="search_box pull-right">
                <input type="text" name="keywords_submit" placeholder="Tìm Kiếm Sản Phẩm"/>
                <input type="submit" style="margin-top:0; color: #000000" name="search" class="btn btn-primary btn-sm" value="tìm kiếm"/>
            </div>
            </form>
        </div>
    </div>
</div>
