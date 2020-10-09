<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{asset('')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


@section('css')
    <!-- Latest compiled and minified CSS & JS -->
        <link rel="stylesheet" href="customer/css/bootstrap.min.css">
        <link rel="stylesheet" href="customer/css/header.css">
        <link rel="stylesheet" href="customer/css/menu-toggle.css">
        <link rel="stylesheet" href="customer/css/index.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://codeseven.github.io/toastr/build/toastr.min.css">
        @if(session('toastr'))
            <script>
                var TYPE_MESSAGE = "{{session('toastr.type')}}";
                var MESSAGE = "{{session('toastr.message')}}";

            </script>
        @endif
    @show

    <title>Trang chủ | Hana Spa</title>
</head>
<body>

@include('frontend.partial.header')

@include('frontend.partial.menu')

@yield('content')
<hr>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v8.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="112750716869242"
     theme_color="#e68585"
     logged_in_greeting="Hi! How can we help you?"
     logged_out_greeting="Hi! How can we help you?">
</div>

<div class="zalo-chat-widget" data-oaid="579745863508352884" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="10000" data-width="350" data-height="420"></div>

<script src="https://sp.zalo.me/plugins/sdk.js"></script>
@include('frontend.partial.foot')


@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="customer/js/menu-toggle.js"></script>

    <script src="https://codeseven.github.io/toastr/build/toastr.min.js"></script>
    <script type="text/javascript">
        if(typeof TYPE_MESSAGE != "undefined")
        {
            switch (TYPE_MESSAGE) {
                case 'success':
                    toastr.success(MESSAGE)
                    break;
                case 'error':
                    toastr.error(MESSAGE)
                    break;
            }
        }

        $(".js-show-login").click(function (event){
           event.preventDefault();
           toastr.warning("You need to be logged in to perform this function")
        });
    </script>

@show
</body>
</html>
