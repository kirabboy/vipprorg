@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
            <h4 class="title-block">MUA BÁN COIN</h4>
            <br/>
				</div>
			</div>
			
      <div class="row  container-fluid">
				<div class="col-6">
					<div class="vip-coin  text-center"  >
                <img src="{{URL::to('/resources/image/img_app/vipcoin.png')}}"/>
                <h5>GIÁ COIN VIP THƯỜNG</h5>
                <p>Mua vào : 100 coin = 7.000 vnđ</p>
<p>Bán ra : 100 coin = 25.000 vnđ</p>
                <a href="https://zalo.me/g/kbofpt812" class="btn btn-danger">Mua ngay</a>
          </div>
        </div>
				<div class="col-6">
					<div class="vip-coin  text-center"  >
                <img src="{{URL::to('/resources/image/img_app/vipcoin.png')}}"/>
                <h5>GIÁ COIN VIP 1</h5>
                <p>Mua vào : 100 coin = 17.000 vnđ</p>
                <p>Bán ra : 100 coin = 40.000 vnđ</p>

                <a href="https://zalo.me/g/kbofpt812" class="btn btn-danger">Mua ngay</a>
          </div>
        </div>
      </div>
      <br/>
      <div class="row  container-fluid text-center">
				<div class="col-12" >
          <p style="border-radius: 5px; border: 1px solid #eee; padding: 10px">Hướng dẫn : Hiện do nhu cầu mua bán tăng cao nên VIPPRO sẽ chính thức tung giá bán ra và mua vào cho tất cả các member của app. Giá mua vào nghĩa là bạn có thể bán số coin trong nick cho app. Còn nếu bạn muốn mua thêm coin để thăng hạng hoặc kinh doanh thì bên ap sẽ có mục giá bán ra . Mọi chi tiết ấn vào mục ( LIÊN HỆ MUA BÁN ) để thực hiện giao dịch.</p>
        </div>
      </div>
    </div>
            
	</main>
@endsection