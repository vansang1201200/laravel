@extends('admin.layout')

@section('title', 'Danh sách liên hệ')

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-12"><h1>Danh Sách liên Hệ</h1></div>
            <div class="col-sm-12">
                <form class="form-inline" action="/searchcategory" style="margin-bottom: 20px" method="get">
                    <div class="form-group">
                        <input type="tex" class="form-control" placeholder="tên sản thể loại ..." name="search"   value="{{\Request::get('name')}}" >
                    </div>
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

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Stt</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th colspan="2">Gmail</th>

                </tr>
                </thead>
                <tbody>
                @if(count($contact) == 0)
                    <tr><td colspan="4">Không có dữ liệu</td></tr>
                @else
                    @foreach($contact as $key => $contacts)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $contacts->name_contact }}</td>
                            <td>{{ $contacts->address_contact }}</td>
                            <td>{{ $contacts->phone_contact }}</td>
                            <td>{{ $contacts->email }}</td>
                            <td><a style="padding: 5px 10px;border:1px solid #1b1e21" href="{{ route('contact.edit', $contacts->contact_id) }}"><i class="fas fa-edit"></i></a></td>
                            <td><a style="padding: 5px 10px;border:1px solid #1b1e21" href="{{ route('contact.destroy', $contacts->contact_id) }}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{ route('contact.create') }}">Thêm mới</a>
        </div>
    </div>
@endsection
