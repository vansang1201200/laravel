@extends('home')
@section('title', 'Chỉnh sửa khách hàng')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12"><h1>Chỉnh sửa sản phẩm</h1></div>
            <div class="col-12">
                <form method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name" value="{{ $product->name }}" >
{{--                        @error('name')--}}
{{--                        <div class="alert text-danger">--}}
{{--                            {{ $message }}--}}
{{--                        </div>--}}
{{--                        @enderror--}}
                    </div>
                    <div class="form-group">
                        <label>Nhà sản suất</label>
                        <input type="text" class="form-control" name="producer" value="{{ $product->producer }}" >
{{--                        @error('producer')--}}
{{--                        <div class="alert text-danger">--}}
{{--                            {{ $message }}--}}
{{--                        </div>--}}
{{--                        @enderror--}}
                    </div>
                    <div class="form-group">
                        <label>Giá sản phẩm</label>
                        <input type="text" class="form-control" name="price" value="{{$product->price}}" >
{{--                        @error('price')--}}
{{--                        <div class="alert text-danger">--}}
{{--                            {{ $message }}--}}
{{--                        </div>--}}
{{--                        @enderror--}}
                    </div>
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select name="category_id" id="">
                            @foreach($categories as $cate)
                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ảnh sản phẩm</label>
                        <input type="file" class="form-control" name="img" {{ $product->img }} >
                        @error('img')
                        <div class="alert text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                     <div class="form-group">
                        <label>Mô tả sản phẩm</label>
                         <textarea type="" class="ckeditor" name="describe_product" value="" >{!! $product->describe_product !!}</textarea>
                         @error('describe_product')
                         <div class="alert text-danger">
                             {{ $message }}
                         </div>
                         @enderror
                    </div>

                    <div class="form-group">
                        <label>Khối lượng</label>
                        <input type="text" class="form-control" name="weight" value="{{ $product->weight }}" >
{{--                        @error('weight')--}}
{{--                        <div class="alert text-danger">--}}
{{--                            {{ $message }}--}}
{{--                        </div>--}}
{{--                        @enderror--}}
                    </div>

                    <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'describe_product' );
    </script>
@endsection
