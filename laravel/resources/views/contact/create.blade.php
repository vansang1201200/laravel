@extends('home')
@section('title', 'Thêm mới khách hàng')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới liên hệ</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('contact.store') }}" >
                    @csrf
                    <div class="form-group">
                        <label>Tên </label>
                        <input type="text" class="form-control" name="name_contact"  placeholder="Enter name" >
                    </div>
                    <div class="form-group">
                        <label>Địan chỉ</label>
                        <input type="text" class="form-control" name="address_contact"  placeholder="Enter name" >
                    </div>
                    <div class="form-group">
                        <label> Số điện thoại </label>
                        <input type="text" class="form-control" name="phone_contact"  placeholder="Enter name" >
                    </div>
                    <div class="form-group">
                        <label> Gmail </label>
                        <input type="text" class="form-control" name="email"  placeholder="Enter name" >
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
