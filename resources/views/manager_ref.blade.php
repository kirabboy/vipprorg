@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<h4 class="block title-block">
						Tất cả thành viên f1
					</h4>			
					
				</div>
			</div>
			<div class="row no-gutters container-fluid">
				<div class="col-12">
					<div class="area-mission">
						@foreach($ref as $value)
						<?php $info = DB::table('info_users')->where('ofuser', $value->phone)->first();?>
							<div class="alert alert-warning" role="alert">
								<div class="row row-mission ">
									<div class="col-12">
										<div class="row">
											<div class="col-6">
												<b>Số điện thoại: </b> <span>{{$value->phone}}</span>
											</div>
											<div class="col-6">
												<b>Nickname: </b> <span>{{$info->nickname}}</span>
											</div>
										</div>
										<div class="row">
											<div class="col-6">
												<b>Zalo: </b> <span>{{$info->zalo}}</span>
											</div>
											<div class="col-6">
												<b>Vip : </b> <span>{{$value->role}}</span>
											</div>
										</div>
									</div>
								
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection