@extends('admin.layout')

@section('title', 'Danh sách thể loại')

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-12"><h1>Danh Sách Thể Loại</h1></div>
            <div class="col-sm-12">
                <form class="form-inline" action="/searchcategory" style="margin-bottom: 20px" method="get">
                    <div class="form-group">
                        <input type="tex" class="form-control" placeholder="tên sản thể loại ..." name="search"   value="{{\Request::get('name')}}" >
                    </div>
                    {{--                                            thể loại--}}
                    {{--                                        <div class="form-group">--}}
                    {{--                                          <select name="" id="" class="form-control">--}}
                    {{--                                            <option value="">Thể loại</option>--}}
                    {{--                                          </select>--}}
                    {{--                                        </div>--}}
                    <button type="submit" class="btn btn-default"><i class="fa fa-search "></i></button>
                </form>
            </div>
            <div class="col-md-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                    </p>
                @endif
            </div>

            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Stt</th>
                    <th scope="col">Tên Tin Tức</th>
                    <th scope="col">Nội dung</th>
                    <th colspan="2">Thao tác</th>

                </tr>
                </thead>
                <tbody>
                @if(count($blog) == 0)
                    <tr><td colspan="4">Không có dữ liệu</td></tr>
                @else
                    @foreach($blog as $key => $blog_index)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $blog_index->name_blog }}</td>
                            <td>{!! $blog_index->description_blog !!}</td>
{{--                            @dd($blog_index->id)--}}

                            <td><a style="padding: 5px 10px;border:1px solid #1b1e21" href="{{ route('blog.edit', $blog_index->blog_id) }}"><i class="fas fa-edit"></i></a></td>
                            <td><a style="padding: 5px 10px;border:1px solid #1b1e21" href="{{ route('blog.destroy', $blog_index->blog_id) }}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fas fa-trash-alt"></i></a></td>

                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{ route('blog.create') }}">Thêm mới</a>
        </div>
    </div>
@endsection
