@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<h4 class="block title-block">
						Đổi mật khẩu tài khoản
					</h4>	
				</div>
			</div>
			<div class="row no-gutters container-fluid">
				<div class="col-12">
					<form id="form-info" action="" method="POST" oninput='repassword.setCustomValidity(password.value != repassword.value ? "Mật khẩu không khớp!" : "")'>
						{{ csrf_field() }}
						@if(Session::has('success'))
							<div class="alert alert-success" role="alert">
								{{Session::get('success')}}
							</div>
						@elseif(Session::has('error'))
							<div class="alert alert-danger" role="alert">
								{{Session::get('error')}}
							</div>
						@endif
						<div class="form-group">
							<label>Mật khẩu cũ</label>
							<input class="form-control" type="password" name="oldpassword" value="" />
						</div>
						<div class="form-group">
							<label>Mật khẩu mới</label>
							<input class="form-control" type="password" name="password" value=""/>
						</div>
						<div class="form-group">
							<label>Nhập lại mật khẩu mới</label>
							<input class="form-control" type="password" name="repassword" value="" />
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