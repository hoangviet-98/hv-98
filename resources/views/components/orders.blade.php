<table class="table table-condensed">
    <tbody>
    <tr>
        <th style="width: 10px">#</th>
        <th>Name</th>
        <th>Avatar</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
        <th>Action</th>
    </tr>
    @foreach($orders as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td><a href="">{{$item->product->pro_name}}</a></td>
        <td>
            <img src="{{pare_url_file($item->product->pro_avatar)}}" alt=""
                 class="responsive">
        </td>
        <td>{{number_format($item->or_price)}}</td>
        <td>{{$item->or_quantity}}</td>
        <td>{{number_format($item->or_price * $item->or_quantity)}}</td>
        <td>
            <a href="{{route('ajax.admin.transactions.order_item', $item->id)}}" class="btn btn-xs btn-danger js-delete-order-item">Delete</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
