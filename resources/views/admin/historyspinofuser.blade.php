@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<div class="block area-title-page">
						<h5>Thay đổi banner</h5>
					</div>	
				</div>
			</div>
			@if(Session::has('success'))
				<div class="alert alert-success" role="alert">
					{{Session::get('success')}}
				</div>
			@endif
			@if(Session::has('error'))
				<div class="alert alert-danger" role="alert">
					{{Session::get('error')}}
				</div>
			@endif
			<div class="row no-gutter row-spin">
				<div class="col-12">
						
					@foreach($historyspins as $value)
						<div class="alert alert-dark" role="alert">
								<div class="row row-mission text-center">
									<div class="col-3 img-mission" style="border-right: 1px dashed gray;">
										<img src="{{asset('/resources/image/lucky.png')}}"/>
									</div>
									<div class="col-9">
										<div class="text-left">
										@if($value->type == 1)
											@if($value->value == 1)
												<h5>{{$value->ofuser}} đã trúng 1 iphone 12 pro</h5>
											@elseif($value->value == 2)
												<h5>{{$value->ofuser}} đã trúng 1 Tivi 50inch</h5>
											@elseif($value->value == 3)
												<h5>{{$value->ofuser}} đã trúng 1 samsung a71</h5>
											@elseif($value->value == 4)
												<h5>{{$value->ofuser}} đã trúng 1 đôi Gucci</h5>
											@elseif($value->value == 5)
												<h5>{{$value->ofuser}} đã trúng 5 chỉ vàng 9999</h5>
											@endif
										@elseif($value->type == 2)
											@if($value->value == 20000)
												<h5>{{$value->ofuser}} đã trúng 20.000 VNĐ</h5>
											@elseif($value->value == 100000)
												<h5>{{$value->ofuser}} đã trúng 100.000 VNĐ</h5>
											@elseif($value->value == 1000000)
												<h5>{{$value->ofuser}} đã trúng 1.000.000 VNĐ</h5>
											@elseif($value->value == 50000000)
												<h5>{{$value->ofuser}} đã trúng 50.000.000 VNĐ</h5>
											@endif
										@endif
										</div>
										<div class="text-right">
											@if($value->type == 1)
												@if($value->status == 0)
													<span style="color:blue; text-decoration: underline;">chưa trao thưởng</a>
												@else
													<span style="color: green; text-decoration: underline;">Đã trao</a>

												@endif
											@else
												@if($value->status == 0)
												<span style="color: yellow; text-decoration: underline;">Chưa nhận</a>

												@else
												<span style="color:green; text-decoration: underline;">Đã nhận</a>
													@endif
											@endif
										</div>
									</div>
							</div>
						</div>
					@endforeach
						
				</div>			
			</div>
		</div>
	</main>
@endsection