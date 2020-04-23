@extends('home')
@section('title', 'Thêm mới khách hàng')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới thể loại</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('blog.store') }}" >
                    @csrf
                    <div class="form-group">
                        <label>Tên tin tức</label>
                        <input type="text" class="form-control" name="name_blog"  placeholder="Enter name" >
{{--                        @error('name')--}}
{{--                        <div class="alert text-danger">--}}
{{--                            {{ $message }}--}}
{{--                        </div>--}}
{{--                        @enderror--}}
                    </div>
                    <div class="form-group">
                        <label> Nội dung tin tức</label>
                        <textarea type="text" class="ckeditor" name="description_blog" placeholder="Enter producer" ></textarea>
{{--                        @error('describe')--}}
{{--                        <div class="alert text-danger">--}}
{{--                            {{ $message }}--}}
{{--                        </div>--}}
{{--                        @enderror--}}
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'description_blog' );
    </script>
@endsection
