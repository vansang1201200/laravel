@extends('home')
@section('title', 'Chỉnh sửa khách hàng')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12"><h1>Chỉnh sửa thể loại</h1></div>
            <div class="col-12">
                <form method="post" action="{{ route('category.update', $category->id) }}" >
                    @csrf
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input type="text" class="form-control" name="name" value="{{ $category->name }}" >
                        @error('name')
                        <div class="alert text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> Mô tả </label>
                        <textarea type="" class="form-control" name="describe" value="{{ $category->describe }}" ></textarea>
                        @error('describe')
                        <div class="alert text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'describe' );
    </script>
@endsection
