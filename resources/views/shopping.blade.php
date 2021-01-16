@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12">
					<h4 class="title-block">Mua sắm</h4>		
				</div>
			</div>
			<div class="row no-gutters container-fluid">
				<div class="col-12">
<div class="row no-gutters container-fluid row-shopping">
						<div class="col-12">
							<img src="{{asset('/resources/image/img_app/ALIBABA.png')}}" onclick="location.href='https://vietnamese.alibaba.com/'"/>
						</div>
					</div>
					<div class="row no-gutters container-fluid row-shopping">
						<div class="col-12">
							<img src="{{asset('/resources/image/img_app/tiki.png')}}" onclick="location.href='https://tiki.vn/'"/>
						</div>
					</div>
					<div class="row no-gutters container-fluid row-shopping">
						<div class="col-12">
							<img src="{{asset('/resources/image/img_app/shopee.png')}}" onclick="location.href='https://shopee.vn/'"/>
						</div>
					</div>
					<div class="row no-gutters container-fluid row-shopping">
						<div class="col-12">
							<img src="{{asset('/resources/image/img_app/lazada.png')}}" onclick="location.href='https://lazada.vn/'"/>
						</div>
					</div>
					<div class="row no-gutters container-fluid row-shopping">
						<div class="col-12">
							<img src="{{asset('/resources/image/img_app/sendo.png')}}" onclick="location.href='https://sendo.vn/'"/>
						</div>
					</div>
				</div>
			</div>
			
				
		</div>
	</main>
@endsection