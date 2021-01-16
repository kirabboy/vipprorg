@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<h4 class="block title-block">
						Thông tin tài khoản
					</h4>	
				</div>
			</div>
			<div class="row no-gutters container-fluid">
				<div class="col-12">
					<form id="form-info" action="{{URL::to('/post-editinfo')}}" method="POST">
						{{ csrf_field() }}
						@if(Session::has('success'))
							<div class="alert alert-success" role="alert">
								{{Session::get('success')}}
							</div>
						@endif
						<div class="form-group">
							<label>Họ và tên</label>
							<input class="form-control" name="name" value="{{$info->name}}" />
						</div>
						<div class="form-group">
							<label>Số điện thoại đăng nhập</label>
							<input class="form-control" value="{{$user->phone}}" readonly/>
						</div>
						<div class="form-group">
							<label>Zalo</label>
							<input class="form-control" name="zalo" value="{{$info->zalo}}" />
						</div>
						<div class="form-group text-center">
							<button class="btn btn-primary">Cập nhật</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
@endsection