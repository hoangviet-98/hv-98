<div style="width: 100%; max-width: 600px; margin: 0 auto">
    <div style="height: 55px; background: #0b93d5; padding: 10px">
        <div style="width: 50%">
            <a href="">
                <img style="height: 55px"
                     src="https://scontent.fhan2-2.fna.fbcdn.net/v/t1.0-9/67413041_462658347893660_1721880310548791296_o.jpg?_nc_cat=111&_nc_sid=dd9801&_nc_ohc=cVsAVNhXuToAX99xwlD&_nc_oc=AQkDmwP4EodjgdS0PkFsDAZXdpXqirDIGPMGc236srb8sRM7-7KSbYOxSStvVmw5UR0&_nc_ht=scontent.fhan2-2.fna&oh=49746695006b2472b04cfa622239c9e3&oe=5F79F83E">
            </a>
        </div>
        <div style="width: 50%"></div>
    </div>
    <div
        style="background: #f4f5f5; box-sizing: border-box; padding: 15px; border-top: 1px solid #dedede; border-bottom: 1px solid #dedede">
        <h2 style="margin: 10px 0; border-bottom: 1px solid #dedede;padding-bottom: 10px">List Product</h2>
        <div>
            @foreach($shopping as $key => $item)
                <div style="border-bottom: 1px solid #dedede; padding-bottom: 10px; padding-top: 10px">
                    <div class="" style="width: 15%;float: left;">
                        <a href="">
                            <img style="max-width: 100%; width: 80px; height: 100px"
                                 src="{{asset(pare_url_file($item->options->avatar))}}"></div>
                        </a>
                    </div>
                    <div style="width: 80%;float: right;">
                        <h4 style="margin: 10px 0">{{$item->name}}</h4>
                        <p style="margin: 4px 0; font-size: 14px;">Price
                            <span>{{number_format($item->price)}} VNĐ</span></p>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            @endforeach
                <h2>Total Price :<b> {{\Cart::subtotal()}} VNĐ</b></h2>
        </div>
        <div>
            <p>Đây là mail tự động vui lòng không trả lời mail này !!!</p>
        </div>
    </div>
    <div style="background: #f4f4f5; box-sizing: border-box; padding: 15px">
        <p style="margin: 2px 0; color: #333">Email : vietht098@gmail.com</p>
        <p style="margin: 2px 0; color: #333">Phone : 0965158092</p>
        <p style="margin: 2px 0; color: #333">Facebook : <a
                href="https://www.facebook.com/profile.php?id=100024484960705">Hoang Viet</a></p>
    </div>
</div>
