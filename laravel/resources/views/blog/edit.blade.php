@extends('home')
@section('title', 'Thêm mới khách hàng')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới thể loại</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('blog.update', $blog->blog_id) }}" >
                    @csrf
                    <div class="form-group">
                        <label>Tên tin tức</label>
                        <input type="text" class="form-control" name="name_blog" value=" {{ $blog->name_blog }}" >

                    </div>
                    <div class="form-group">
                        <label> Nội dung tin tức</label>
                        <textarea type="" class="form-control" name="description_blog" >{!! $blog->description_blog !!}}</textarea>

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
