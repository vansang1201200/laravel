@extends('layuot')
@section('content')
    <div id="contact-page" class="container">
        <div class="bg">
            <div class="col-sm-12">
                <div class="contact-info">
                    <h2 class="title text-center">Liên Hệ</h2>
                    <address>
                        @foreach($all_contact as $contact)
                            <h2>
                        <p>Tên:{{$contact->name_contact}}</p>
                        <p>Địa Chỉ: {{$contact->address_contact}}</p>
                        <p>Số Điện Thoại: {{$contact->phone_contact}}</p>
                        <p>Email: {{$contact->email}}</p>
                            </h2>
                        @endforeach
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Mạng Xã Hội</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
