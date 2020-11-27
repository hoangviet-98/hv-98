<!DOCTYPE html>
<html lang="en">
<head>
    @yield('title')
    <base href="{{asset('')}}">

    <meta name="csrf-token" content="csrf_token()">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HANA SPA</title>
    @section('css')

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="admincontrol/css/master.css">
        <link rel="stylesheet" href="admincontrol/css/content.css">

@show

</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

@include('admin.partial.header')

@include('admin.partial.menu')

    @yield('content')

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

    <div class="control-sidebar-bg"></div>
</div>

{{--Scripts js common--}}
@section('js')
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/PACE/pace.min.js"></script>
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script type="text/javascript">
            // make Pace works on Ajax calls
            $(document).ajaxStart(function () {
                Pace.restart()
            })
            $('.ajax').click(function () {
                $.ajax({
                    url: '#' , success: function (result) {
                        $('.ajax-content').html('<hr>Ajax Request Completa !')
                    }
                })
            })
            $(function () {
                $(".js-preview-transaction").click(function (event) {
                    event.preventDefault();
                    let $this = $(this);
                    let URL   = $this.attr('href');
                    let ID    = $this.attr('data-id');
                    $("#transaction_id").html("#" + ID);
                    $.ajax({
                        url: URL
                    }).done(function (results) {
                        console.log(results)
                        $("#modal-preview-transaction .content").html(results.html)
                        $("#modal-preview-transaction").modal({
                            show : true
                        })
                    });
                })
                $('body').on("click", '.js-delete-order-item', function (event) {
                   event.preventDefault();
                   let URL    = $(this).attr('href');
                   let $this  = $(this);
                   $.ajax({
                       url:URL
                   }).done(function (results) {
                        if (results.code == 200) {
                            $this.parents("tr").remove();
                        }
                   })
                });
            })


            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#out_img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }
            $("#input_img").change(function() {
                readURL(this);
            });
        </script>

{{--        <script type="text/javascript">--}}
{{--            $(document).ajaxStart(function() {--}}
{{--                Pace.restart();--}}
{{--            });--}}
{{--            $('ajax').click(function (){--}}
{{--                $.ajax({--}}
{{--                    url: '#', success: function (result){--}}
{{--                        $('.ajax-content').html('<hr> Ajax Request Completed !')--}}
{{--                    }--}}
{{--                })--}}
{{--            })--}}

{{--                // function showDetailOrder(id) {--}}
{{--                //     console.log(id);--}}
{{--                //     $('#myModalOrder').modal();--}}
{{--                // }--}}
{{--        </script>--}}

@show

</body>
</html>
