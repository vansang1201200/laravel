@extends('admin.layout')

@section('title', 'Danh sách thể loại')

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-12"><h1>Danh Sách Thể Loại</h1></div>
            <div class="row" style="width: 100%">
                <div class="col-8 input-group">
                    <a style="height: 65%"  class="btn btn-primary" href="{{ route('category.create') }}">Thêm mới</a>
                    <form class="form-inline" action="/searchcategory" style="margin-bottom: 20px; padding-left: 10px"
                          method="get">
                        <div class="form-group">
                            <input type="tex" class="form-control" placeholder="tên thể loại..." name="search"
                                   value="{{\Request::get('name')}}">
                        </div>
                        <button type="submit" class="btn btn-default"><i class="fa fa-search "></i></button>
                    </form>
                </div>
                <div class="col-4" style="float: left">
                    <a href="{{ route('category.trash') }}" class="right btn btn-success" style="float: right"><i
                            class="fas fa-trash-restore"></i> Thùng rác</a>
                </div>
            </div>
            <div class="col-md-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                    </p>
                @endif
            </div>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Stt</th>
                    <th scope="col">Tên thể loại</th>
                    <th scope="col">Mô tả thể loại</th>
                    <th scope="col">Số lượng bài viết</th>
                    <th colspan="2">Thao tác</th>

                </tr>
                </thead>
                <tbody>
                @if(count($category) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($category as $key => $cate)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $cate->name }}</td>
                            <td>{!! $cate->describe !!}</td>
                            <td>{{count($cate->products)}}</td>
                            <td><a style="padding: 5px 10px;border:1px solid #1b1e21"
                                   href="{{ route('category.edit', $cate->id) }}"><i class="fas fa-edit"></i></a></td>
                            <td><a style="padding: 5px 10px;border:1px solid #1b1e21"
                                   href="{{ route('category.destroy', $cate->id) }}" class="text-danger"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
