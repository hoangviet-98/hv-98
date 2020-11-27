<div class="container">
    <div class="area-title"><h2>List Shopping Cart</h2></div>
    <table class="table update_cart_url" data-url="" style="text-align: center">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Sub Total</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1 ?>

        @foreach($shopping as $key => $item)
            {{--         {{dd($key)}}--}}
            <tr>
                <th scope="row" id="rowId">{{$i}}</th>
                <td><img style="width: 150px; height: 100px" src="{{asset(pare_url_file($item->options->avatar))}}"></td>
                <td>{{$item->name}}</td>
                <td>{{number_format($item->price)}} $</td>
                <td>{{number_format($item->price * $item->qty)}} $</td>
                <td style="margin-left: 30px">
                    <input type="number" name="quantity" id="qty"  value="{{$item->qty}}" min="1" style="width: 60px">
                    <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px;"
                       href="{{route('ajax_update.shopping.cart', $key)}}"
                       data-id-product="{{$item->id}}"
                       class="js-update-item-cart" data-id="{{$key}}"> <i class="fa fa-pencil"> </i></a>

                    <a href="{{route('delete.shopping.cart', $key)}}"
                       style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px; color:red"
                       class="fa fa-trash-o"> </a>
                    @csrf
                </td>
            </tr>
            <?php $i++ ?>
        @endforeach
        </tbody>
    </table>
    <div class="col-md-12" style="text-align: right">
        <h5> Total Amount : {{\Cart::subtotal()}} $ </h5>
        <a href="{{route('get.form.pay')}}" class="btn-danger btn" style="width: 150px; border-radius: 22px">PAY</a>
    </div>
</div>
