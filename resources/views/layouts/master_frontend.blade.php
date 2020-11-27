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

    <title>Vania Spa</title>
</head>
<body>

@include('frontend.partial.header')

@include('frontend.partial.menu')

@yield('content')
<hr>
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
