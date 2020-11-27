@extends('layouts.master_frontend')

@section('js')
    @parent

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
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder='Full Name' >
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
                                    <input id="phone" type="number"  class="form-control" name="phone" value="{{ old('phone') }}" placeholder='0988888888'>
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
                                    <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder=' house number 68, Ha Dong, Ha Noi'>
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
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="abc88@gmail.com">
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
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Aabcd123" >
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
