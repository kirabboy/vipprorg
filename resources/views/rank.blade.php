@extends('layout.master')
@section('content')
  <?php
                 if (Auth::guard('users')->check()) {
            $admin = Auth::guard('users')->user();
}
            ?>
	<main id="main">
		<style>
			.camnghi{
				overflow: hidden;
				text-overflow: ellipsis;
				display: -webkit-box;
				-webkit-box-orient: vertical;
				-webkit-line-clamp: 1;
				padding: 0;
			}
		</style>
		<div class="container-fluid p-0 rank-page">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<h4 class="title-block">Bảng xếp hạng</h4>
				</div>
			</div>

			<div class="row no-gutters container-fluid">
				<div class="col-12">
					@for($i = 0 ; $i <count($rank); $i++)
						<?php 
							$user= DB::table('users')->where('phone', $rank[$i]->ofuser)->first();
							$info= DB::table('info_users')->where('ofuser', $rank[$i]->ofuser)->first();
							$wallet= DB::table('wallet')->where('ofuser', $rank[$i]->ofuser)->first();
							$role = DB::table('role')->where('ofrole', $rank[$i]->role)->first();
	
						?>
							<div class="row no-gutters container-fluid rank rank-{{$i}}" data-id="{{$user->id}}" data-top="{{$i}}" onclick="getdetail(this)">
								<div class="col-1 text-center">
									<div style="color: red;margin-top:20px">{{$i+1}}</div>
	
								</div>
								<div class="col-2 text-center">
									<div class="account-avatar" >
										<div class="khung-avatar khung-avatar-{{$role->ofrole}}" style="background-image: url('{{asset('/resources/image/img_avatar/'.$user->avatar)}}')">
											<div class="avatar" ></div>
										</div>
									</div>
	
								</div>
								<div class="col-9">
									<div class="row">
										<div class="col-6 text-left">
											<div class="rank-content"><b><span>{{$info->nickname}}</span></b><br/>
	@if (Auth::guard('users')->check())											
@if($admin->role == 99)
<span style="color:red">{{$user->phone}}</span>
@endif
@endif
											</div>
										</div>
										<div class="col-6 text-right">
											<b style="color:#fff">{{number_format($wallet->coin,0,',','.')}} <span class="coin-{{$user->role}}">coin</span></span></b>
										</div>
									</div>
									<div class="row">
										<div class="col-4 text-left">
											<div class="rank-content">
												<span style="color: red">VIP: {{$user->role}} </span>
											</div>
										</div>
										<div class="col-8 text-right">
											<span class="camnghi" style="color: yellow">{{$user->status}}</span>

 
										</div>
									</div>
									
								</div>
								
							</div>
					@endfor
							
				</div>
		
			
			</div>
						<div class="modal fade" id="detail-vip" role="dialog">
							<div class="modal-dialog  modal-dialog-centered">
							
							  <!-- Modal content-->
							  <div class="modal-content">
								<div class="modal-header">
								  <h4 class="modal-title text-center">Thông tin TOP <span class="top-may" style="color: red; font-weight: 900"></span></h4>
								</div>
								<div class="modal-body text-center" style="color: #fff">
									
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
								</div>
							  </div>
							  
							</div>
						  </div>
						  <script>
							  $( document ).ready(function() {
									$('.topclick').trigger('click');
								});

								function getdetail(e){
									var id = $(e).data('id');
									var top = $(e).data('top');
									$.ajax({
										type: "get",
										url: "{{URL::to('/getdetail')}}",
										data: {id:id}, 
										error: function(reponses){
											console.log(reponses);
											console.log('false');
										},
										success: function(reponses)
										{
											$('#detail-vip .modal-body').html(reponses);
											$('#detail-vip .top-may').text(top+1);
											$("#detail-vip").modal();

										}
									});          
								}
								
						  </script>
						
				
		</div>
	</main>
@endsection