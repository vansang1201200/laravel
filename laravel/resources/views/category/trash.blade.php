@extends('admin.layout')
@section('title', 'Danh sách thể loại bị xáo')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Danh Sách Thể Loại Đã Bị Xóa</h1>
            </div>
            <p class="col-12">
                <a style="padding: 10px" href="{{ route('category.restoreAll') }}" class="btn btn-success"><i
                        class="fas fa-trash-restore"></i> Khôi phục tất cả</a>
                <a href="{{ route('category.deleteAll') }}" style="float:right" class="btn btn-danger">
                    <button type="submit"
                            onclick="return confirm('Xóa xong sẽ không thể hồi phục. \n\nBạn chắc chắn muốn xóa tất cả?')"
                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Xóa tất cả
                    </button>
                </a>
            </p>
            <div class="col-12">
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
                    <th scope="col">Tên thể loại</th>
                    <th scope="col">Mô tả thể loại</th>
{{--                    <th scope="col">Số lượng bài viết</th>--}}
{{--                    <th colspan="2">Thao tác</th>--}}

                </tr>
                </thead>
                <tbody>
                @if(count($categorys) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($categorys as $key => $cate)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $cate->name }}</td>
                            <td>{!! $cate->describe !!}</td>
{{--                            <td>{{count($cate->products)}}</td>--}}
{{--                            <td><a style="padding: 5px 10px;border:1px solid #1b1e21"--}}
{{--                                   href="{{ route('category.edit', $cate->id) }}"><i class="fas fa-edit"></i></a></td>--}}
{{--                            <td><a style="padding: 5px 10px;border:1px solid #1b1e21"--}}
{{--                                   href="{{ route('category.destroy', $cate->id) }}" class="text-danger"--}}
{{--                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fas fa-trash-alt"></i></a>--}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
