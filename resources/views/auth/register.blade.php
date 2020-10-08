{{--@extends('layouts.master_frontend')--}}

{{--@section('content')--}}
{{--<div class="container" style="margin-top: 40px">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @errors('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @errors('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @errors('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                @errors('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @errors('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @errors('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}

@extends('layouts.master_frontend')

@section('js')
    @parent
    {{--    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>--}}
    {{--    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>--}}
    {{--    <script>--}}

    {{--        $.validator.addMethod("validatePassword", function (value, element) {--}}
    {{--            return this.optional(element) || /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test(value);--}}
    {{--        }, 'It must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters');--}}

    {{--        $(document).ready(function () {--}}

    {{--            $("#registerForm").validate({--}}
    {{--                rules: {--}}
    {{--                    password: {--}}
    {{--                        required: true,--}}
    {{--                    },--}}

    {{--                    password2: {--}}
    {{--                        required: true,--}}
    {{--                        equalTo: "#password"--}}
    {{--                    },--}}
    {{--                },--}}
    {{--                messages: {--}}
    {{--                    password2: {--}}
    {{--                        required: "Enter re-password here",--}}
    {{--                        equalTo: "The re-password is not similar as password"--}}
    {{--                    },--}}
    {{--                }--}}
    {{--            });--}}
    {{--        });--}}

    {{--    </script>--}}

@endsection

@section('css')
    @parent
    <link rel="stylesheet" href="customer/css/register.css" />
@endsection
@section('content')

    <div class="container" style="margin-top: 40px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="" id="registerForm">
                            @csrf

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                                </div>
                                @if($errors->has('name'))
                                    <span class="error-text1">
                  {{$errors->first('name')}}
                </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                                <div class="col-md-6">
                                    <input id="phone" type="number"  class="form-control" name="phone" value="{{ old('phone') }}">
                                </div>
                                @if($errors->has('phone'))
                                    <span class="error-text1">
                  {{$errors->first('phone')}}
                </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">
                                </div>
                                @if($errors->has('address'))
                                    <span class="error-text1">
                  {{$errors->first('address')}}
                </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                                @if($errors->has('email'))
                                    <span class="error-text1">
                  {{$errors->first('email')}}
                </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" >
                                </div>
                                @if($errors->has('password'))
                                    <span class="error-text1">
                  {{$errors->first('password')}}
                </span>
                                @endif
                            </div>

{{--                            <div class="form-group row">--}}
{{--                                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                                                            <div class="col-md-6">--}}
{{--                                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
