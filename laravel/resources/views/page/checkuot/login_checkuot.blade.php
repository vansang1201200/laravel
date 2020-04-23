@extends('layuot')
@section('content')

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Đăng Nhập Tài Khoản</h2>
                        <form action="{{url('/login-customer')}}" method="POST">
                            {{@csrf_field()}}
                            <input type="text" name="email_account" placeholder="Tài Khoản" />
{{--                            @error('email_account')--}}
{{--                            <div class="alert text-danger">--}}
{{--                                {{ $message }}--}}
{{--                            </div>--}}
{{--                            @enderror--}}
                            <input type="password" name="password_account" placeholder="Mật Khẩu " />
{{--                            @error('password_account')--}}
{{--                            <div class="alert text-danger">--}}
{{--                                {{ $message }}--}}
{{--                            </div>--}}
{{--                            @enderror--}}
                            <span>
								<input type="checkbox" class="checkbox">
								Ghi Nhớ Đăng Nhập
							</span>
                            <button type="submit" class="btn btn-default">Đăng Nhập</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Đăng kí</h2>
                        <form action="{{url('/add-customer/')}}" method="POST">
                            {{csrf_field()}}
                            <input type="text" name="customer_name" placeholder="Tên"/>
{{--                            @error('customer_name')--}}
{{--                            <div class="alert text-danger">--}}
{{--                                {{ $message }}--}}
{{--                            </div>--}}
{{--                            @enderror--}}
                            <input type="email" name="customer_email" placeholder="Gmail"/>
{{--                            @error('customer_email')--}}
{{--                            <div class="alert text-danger">--}}
{{--                                {{ $message }}--}}
{{--                            </div>--}}
{{--                            @enderror--}}
                            <input type="password" name="customer_password" placeholder="Mật Khẩu"/>
{{--                            @error('customer_password')--}}
{{--                            <div class="alert text-danger">--}}
{{--                                {{ $message }}--}}
{{--                            </div>--}}
{{--                            @enderror--}}
                            <input type="number" name="customer_phone" placeholder="Số Điện Thoại"/>
{{--                            @error('customer_phone')--}}
{{--                            <div class="alert text-danger">--}}
{{--                                {{ $message }}--}}
{{--                            </div>--}}
{{--                            @enderror--}}
                            <button type="submit"  class="btn btn-default">Đăng Kí</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->

    @endsection
