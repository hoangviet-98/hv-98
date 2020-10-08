@foreach($articleNews as $aNews)
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="single-post" style="margin-bottom: 40px">
            <div class="post-thumb">
                <a href="#">
                    <img style="width: 350px; height: auto"
                         src="{{ asset(pare_url_file($aNews->a_avatar)) }}" alt=""/>
                </a>
            </div>
            <div class="post-thumb-info1">
                <div class="post-time">
                    <a href="#">Beauty</a>
                    <span>/</span>
                    <span>Post by</span>
                    <span>BootExperts</span>
                </div>
                <div class="postexcerpt">
                    <p style="height: 30px">{{$aNews->a_name}}</p>
                    <a href="#" class="read-more">Read more</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
