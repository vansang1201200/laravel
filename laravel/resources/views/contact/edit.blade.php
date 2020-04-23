@extends('home')
@section('title', 'Thay đổi liên hệ')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thay đổi liên hệ</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('contact.update', $contact->contact_id) }}" >
                    @csrf
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" class="form-control" name="name_contact" value=" {{ $contact->name_contact }}" >
                    </div>
                    <div class="form-group">
                        <label>Đian chỉ</label>
                        <input type="text" class="form-control" name="address_contact" value=" {{ $contact->address_contact }}" >
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" name="phone_contact" value=" {{ $contact->phone_contact }}" >
                    </div>
                    <div class="form-group">
                        <label> Gmail </label>
                        <input type="text" class="form-control" name="email" value=" {{ $contact->email }}" >
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
