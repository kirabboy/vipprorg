<footer>
    <div class="container-fluid">
        <div class="row no-gutters menu-bottom">
            <div class="col-2" id="p1">
                <a class="{{(url()->current() == URL::to('/')) ? 'active' : '' }}" href="{{URL::to('/')}}">
                    <img src="{{asset('/resources/image/img_app/home.png')}}"/>
                    <h6>Trang chủ</h6>
                </a>
            </div>
            <div class="col-2 col-half-offset" id="p2">
                <a class="{{(url()->current() == URL::to('/upgrate')) ? 'active' : '' }}" href="{{URL::to('/upgrate')}}">
                        <img src="{{asset('/resources/image/img_app/upgrade.png')}}"/>
                    <h6>Nâng cấp</h6>
                </a>
            </div>
            <div class="col-2 col-half-offset" id="p3">
                <a class="{{(url()->current() == URL::to('/earn-money')) ? 'active' : '' }}" href="{{URL::to('/earn-money')}}">
                    <img src="{{asset('/resources/image/img_app/target.png')}}"/>
                    <h6>Nhiệm vụ</h6>
                </a>
            </div>
            <div class="col-2 col-half-offset" id="p4">
                <a class="{{(url()->current() == URL::to('/history')) ? 'active' : '' }}" href="{{URL::to('/history')}}">
                    <img src="{{asset('/resources/image/img_app/history.png')}}"/>
                    <h6>Lịch sử</h6>
                </a>
            </div>
            <div class="col-2 col-half-offset" id="p5">
                <a class="{{(url()->current() == URL::to('/my-account')) ? 'active' : '' }}" href="{{URL::to('/my-account')}}">
                    <img src="{{asset('/resources/image/img_app/account.png')}}"/>
                    <h6>Thông tin</h6>
                </a>
            </div>
        </div>
    </div>

    {{-- <?php
        use App\Http\Controllers\AdminController;
        $adminController = new AdminController();
        $adminController->autoduyetnv();
    ?> --}}
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/TweenMax.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/utils/Draggable.min.js'></script>
    <script src="{{URL::to('resources/views/spin/js/ThrowPropsPlugin.min.js')}}"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/TextPlugin.min.js'></script> --}}
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v9.0" nonce="lkddoczi"></script>
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>
</footer>
</body>

</html>