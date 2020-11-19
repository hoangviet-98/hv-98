@foreach($productsNew as $new)
    <div class="col-md-3 col-sm-4 col-sm-6">
        <div class="single-post" style="margin-bottom: 40px">
            <div class="post-thumb">
                <a href="{{route('get.detail.product', [$new->pro_slug, $new->id])}}">
                    <img style="width: 250px; height: auto"
                         src="{{ asset(pare_url_file($new->pro_avatar)) }}" alt=""/>
                </a>
            </div>
            <div class="post-thumb-info">
                <div class="post-time">
                    <a href="#">Beauty</a>
                    <span>/</span>
                    <span>Post by</span>
                    <span>Hoang Viet</span>
                </div>
                <div class="postexcerpt">
                    <p style="height: 40px;width: 200px;
                    white-space: nowrap;
                    overflow: hidden;text-overflow: ellipsis;">{{$new->pro_name}}</p>
                    <p style="color: red;"> <span>Price: </span>{{number_format($new->pro_price)}} $</p>
                    <hr>
                    <a href="{{route('add.shopping.cart', $new->id)}}"
                       class="add_to_cart">ADD TO CART</a></div>
            </div>
        </div>
    </div>
@endforeach
