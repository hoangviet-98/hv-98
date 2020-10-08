@extends('layouts.master_frontend')

@section('title')
    <title>List Shopping Cart</title>
@endsection

@section('js')
    @parent
    <script src="admincontrol/js/sweetAlert2/js/sweetalert2@9.js"></script>
    <script src="admincontrol/js/logInAdmin/js/list_product.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $(".js-update-item-cart").click(function (event) {
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                let qty = $this.prev().val();
                let idProduct = $this.attr('data-id-product')
                if (url) {
                    $.ajax({
                        url: url,
                        data: {
                            qty: qty,
                            idProduct : idProduct
                        }
                    }).done(function (results) {
                        toastr.success(results.messages);
                        window.location.reload();
                    });
                }
            })
        })
    </script>
    <script>
        // $(document).ready(function () {
        //     $('#upCart').on('change keyup', function (){
        //         let newqty = $('#upCart').val();
        //         let rowId = $('#rowId').val();
        //     alert(rowId);
        //     });
        // })
    </script>
@endsection

@section('css')
    @parent
    <link rel="stylesheet" href="admincontrol/js/logInAdmin/js/list_product.js">
    <link rel="stylesheet" href="customer/css/productindex.css">
@endsection

@section('content')
    <div class="cart_wrapper">
        @include('frontend.components.cart-component')
    </div>

@endsection
