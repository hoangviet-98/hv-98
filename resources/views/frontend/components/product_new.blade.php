@foreach($productsNew as $new)
    <div class="col-md-3 col-sm-4">
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
                    <span>BootExperts</span>
                </div>
                <div class="postexcerpt">
                    <p style="height: 40px">{{$new->pro_name}}</p>
                    <hr>
                    <a href="{{route('add.shopping.cart', $new->id)}}"
                       class="add_to_cart">ADD TO CART</a></div>
            </div>
        </div>
    </div>
@endforeach
