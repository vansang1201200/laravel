@extends('home')
@section('title', 'Thêm mới khách hàng')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới sản phẩm</h1>

            </div>
            <div class="col-12">
                <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter name" >
{{--                        @error('name')--}}
{{--                            <div class="alert text-danger">--}}
{{--                                {{ $message }}--}}
{{--                            </div>--}}
{{--                        @enderror--}}
                    </div>
                    <div class="form-group">
                        <label> Nhà sản xuất</label>
                        <input type="text" class="form-control" name="producer" placeholder="Enter producer" >
{{--                        @error('producer')--}}
{{--                        <div class="alert text-danger">--}}
{{--                            {{ $message }}--}}
{{--                        </div>--}}
{{--                        @enderror--}}
                    </div>
                    <div class="form-group">
                        <label>Giá sản phẩm</label>
                        <input type="text" class="form-control" name="price" placeholder="Enter price" >
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
                        <label>Ảnh</label>
                        <input type="file" class="form-control" name="img" placeholder="Enter img" >
{{--                        @error('img')--}}
{{--                        <div class="alert text-danger">--}}
{{--                            {{ $message }}--}}
{{--                        </div>--}}
{{--                        @enderror--}}
                    </div>

                    <div class="form-group">
                        <label> Mô tả về sản phẩm</label>
                        <textarea type="text" class="ckeditor" name="describe_product" placeholder="Enter describe product" ></textarea>
{{--                        @error('describe_product')--}}
{{--                        <div class="alert text-danger">--}}
{{--                            {{ $message }}--}}
{{--                        </div>--}}
{{--                        @enderror--}}
                    </div>

                    <div class="form-group">
                        <label>Khối lượng</label>
                        <input type="text" class="form-control" name="weight" placeholder="Enter weight" >
{{--                        @error('weight')--}}
{{--                        <div class="alert text-danger">--}}
{{--                            {{ $message }}--}}
{{--                        </div>--}}
{{--                        @enderror--}}
                    </div>
                    <div class="form-group">
                       <div class="checkbox">
                        <label><input type="checkbox" name="pro_hot"> Nổi Bật</label>
                       </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'describe_product' );
    </script>
@endsection
