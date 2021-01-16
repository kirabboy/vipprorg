@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<h4 class="block title-block">
						Chi tiết nhiệm vụ
					</h4>			
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
			<div class="page-mission">

				@if($mission->type == 2)
					<div class="row no-gutters container-fluid">
						<div class="col-12">
							<h4 class="title-block">Cày View</h4>
							<div class="row no-gutters container-fluid">
								<div class="col-12">
									<p class="description-mission">
										Xem video 15s và nhận thưởng nhé
									</p>
								</div>
							</div>
							
							<video width="100%" height="240" controls muted autoplay>
								<source src="{{asset('/resources/video/'.$mission->example)}}" type="video/mp4">
							</video>
						</div>
					</div>
					@if($checkMission != null)
						<div class="text-center">
							<a class="btn btn-danger">Đã xong</a>
						</div>
					@else
						<div class="row no-gutters container-fluid">
							<div class="col-12 text-center">
								<form action="{{URL::to('/done-video')}}" method="POST">
									{{ csrf_field() }}

									<input type="hidden" name="id_user" value="{{$user->id}}"/>
									<input type="hidden" name="id_mission" value="{{$mission->id}}"/>

									<button class="btn btn-warning" disabled id="btn-skip">Chờ <span class="time-count">15</span>s</button>
								</form>
							</div>
						</div>		
					@endif
					
					<script>
						var n = 15;
							setTimeout(countDown,1000);

							function countDown(){
							n--;
							if(n > 0){
								$('.time-count').html(n);

								setTimeout(countDown,1000);
							}else{
								$('#btn-skip').html('Nhận thưởng');
								$('#btn-skip').removeClass('btn-warning');
								$('#btn-skip').addClass('btn-success');
								$('#btn-skip').addClass('btn-success');
                                                                $('#btn-skip').removeAttr('disabled');
							}
							}			
					</script>	
				@else
					<div class="row no-gutters container-fluid">
						<div class="col-12">
							<div class="area-mission-detail">
								<div class="form-group">
									<h5>Tên: {{$mission->name}}</h5>
								</div>
								<div class="form-group">
									<h5>Tiền nhận được: {{number_format($mission->price,0,',','.')}}</h5>
								</div>
								<div class="form-group">
									<h5>
										@if($mission->type ==1)
										<p>Chia sẽ app lên Facebook sau đó chụp màn hình đăng lên nhận thưởng</p>
<span style="color:red" onclick="copiecode()"> Copy link app</span>
										

										<input id="linkhid" type="text" style="top: -1000px; left:-1000px; position: absolute"  value="{{URL::to('/register/332725288')}}  ( web kiếm tiền dễ nhất từ trước đến giờ mn ơi )"/>
										@elseif($mission->type ==3)
										<p>Chia sẽ app lên Zalo sau đó chụp màn hình đăng lên nhận thưởng </p>
										<span style="color:red" onclick="copiecode()"> Copy link app</span>
										<input id="linkhid" type="text" style="top: -1000px; left:-1000px; position: absolute"  value="{{URL::to('/register/332725288')}}  ( web kiếm tiền dễ nhất từ trước đến giờ mn ơi )"/>
										@endif
										</h5>
										<script>
											function copiecode() {
											var copyText = document.getElementById("linkhid");
											copyText.select();
											copyText.setSelectionRange(0, 99999)
											document.execCommand("copy");
											alert("Đã copy: " + copyText.value);
											}
										</script>
								</div>						
						
							
						
						<div class="form-group text-center">
							<h5>Thao tác nhiệm vụ: </h5>
							@if($checkMission != null)
								@if($checkMission->result != null && $checkMission->status == 0)
									<div class="form-group text-center">
										<a class="btn btn-success" href="{{URL::to('/donemission/'.$mission->id)}}">Xác nhận</a>
									</div>
								@endif
							@endif
							<p class="text-center">
								@if($checkMission != null)
									@if($checkMission->status == 2 )
										<a class="btn btn-success">Đang duyệt</a>
									
									@elseif($checkMission->status == 1)
										<a class="btn btn-danger">Đã huỷ</a>
									@elseif($checkMission->status == 3)
										<a class="btn btn-danger">Đã duyệt</a>
									@endif
								@else
									<a href="{{URL::to('/take-mission/'.$mission->id)}}" class="btn btn-primary">
										Nhận
									</a>
								@endif
							</p>
						</div>
						<div class="form-group img-mission-detail text-center">
							@if($checkMission != null && $checkMission->status != 1)
							<h5>Up ảnh chụp màn hình của bạn lên đây: </h5>
							@endif	
							@if($checkMission != null)
								@if($checkMission->status == 0 )
								<p>
									<form action="{{URL::to("/uploadimgmission")}}" method="POST" enctype="multipart/form-data" >
										{{ csrf_field() }}
										<input type="hidden" name="idmission" value="{{$mission->id}}"/>
										<input  class="form-control" type="file" name="result" multiple required/>
										<button id="upimg" class="btn btn-info" type="submit">
											@if($checkMission->result != null)
											Đổi ảnh	
											@else
											Đăng ảnh
											@endif
										</button>
									</form>
								</p>
								@endif
							@endif
							@if($checkMission != null && $checkMission->status != 1)
								@if($checkMission->result != null && $checkMission->status != 1 )
									<div class="img-result">
										<img src="{{asset('/resources/image/img_mission/'.$checkMission->result)}}"/>
									</div>
								@endif
							@endif
						</div>
								<div class="form-group img-mission-detail">
									<h5>Mẫu: </h5>
									<p>
										<img src="{{asset('/resources/image/img_app/'.$mission->example)}}"/>
									</p>
								</div>
								
									
								
							</div>
						</div>
					</div>
				
					
				@endif
			</div>
		</div>
	</main>
@endsection