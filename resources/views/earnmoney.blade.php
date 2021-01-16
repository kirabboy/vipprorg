@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<h4 class="block title-block">
						Tất cả nhiệm vụ
					</h4>			
					
				</div>
			</div>
			<div class="row no-gutters container-fluid">
				<div class="col-12">
					<div class="area-mission">
						<div class="group-tabs tab-earn">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs">
							  <li class="active"><a href="#facebook" data-toggle="tab">Facebook</a></li>
							  <li><a class="" href="#youtube" data-toggle="tab">Cày view</a></li>
							  <li><a class="" href="#zalo" data-toggle="tab">Zalo</a></li>
							</ul>
					  
							<!-- Tab panes -->
							<div class="tab-content clearfix">
								<div  class="tab-pane fade in active" id="facebook">
								@foreach($mission_f as $value)
									<div class="alert alert-warning" role="alert">
										<a href="{{URL::to('/mission-detail/'.$value->id)}}">
											<div class="row row-mission ">
												<div class="col-3 img-mission text-center" style="border-right: 1px dashed gray;">
													<img src="{{asset('/resources/image/img_app/f.png')}}"/>
												</div>
												<div class="col-9 text-left">
													<h5 class="mission-price">{{$value->price}} VNĐ</h5>
													<h5 class="mission-name">{{$value->name}}</h5>
												</div>
											
											</div>
										</a>
									</div>
								@endforeach
								</div>
							  <div  class="tab-pane fade" id="youtube">
								@foreach($mission_y as $value)
									<div class="alert alert-warning" role="alert">
										<a href="{{URL::to('/mission-detail/'.$value->id)}}">
											<div class="row row-mission ">
												<div class="col-3 img-mission text-center" style="border-right: 1px dashed gray;">
													<img src="{{asset('/resources/image/img_app/video.png')}}"/>
												</div>
												<div class="col-9 text-left">
													<h5 class="mission-price">{{$value->price}} VNĐ</h5>
													<h5 class="mission-name">{{$value->name}}</h5>
												</div>
											
											</div>
										</a>
									</div>
								@endforeach
							  </div>
							  <div  class="tab-pane fade" id="zalo">
								@foreach($mission_z as $value)
								<div class="alert alert-warning" role="alert">
									<a href="{{URL::to('/mission-detail/'.$value->id)}}">
										<div class="row row-mission ">
											<div class="col-3 img-mission text-center" style="border-right: 1px dashed gray;">
												<img src="{{asset('/resources/image/img_app/zalo.png')}}"/>
											</div>
											<div class="col-9 text-left">
												<h5 class="mission-price">{{$value->price}} VNĐ</h5>
												<h5 class="mission-name">{{$value->name}}</h5>
											</div>
										
										</div>
									</a>
								</div>
								@endforeach
							  </div>
							</div>
						  </div>
						
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection