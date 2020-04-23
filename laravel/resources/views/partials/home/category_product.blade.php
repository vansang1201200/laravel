
<h2>Danh Mục Sản Phẩm</h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->


    <div class="panel panel-default">
        @foreach($categories as $categorys)
        <div class="panel-heading">
            <h4 class="panel-title"><a href="{{'/category-product/'. $categorys->id}}">{{$categorys->name}}</a></h4>
        </div>
        @endforeach
    </div>
</div>

