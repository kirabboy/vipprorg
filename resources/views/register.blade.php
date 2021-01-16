@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12">
					<div class="row">
						<div class="col">
							<div class="card text-white bg-dark mb-3" style="">
								<div class="card-header">
								  Đăng ky
								</div>
								<div class="card-body">
									<form class="form-register" action="" method="POST"  oninput='repassword.setCustomValidity(password.value != repassword.value ? "Mật khẩu không khớp!" : "")'>
										{{ csrf_field() }}
										@if(Session::has('error'))
											<div class="alert alert-danger" role="alert">
												{{Session::get('error')}}
											</div>
										@endif
				
										<div class="form-group">
											<label><i class='fas fa-phone-square-alt'></i> Số điện thoại</label>
											<input type="number" id="phone" name="phone" class="form-control" required/>
										</div>
										<div class="form-group">
											<label><i class='fas fa-lock'></i> Mật khẩu</label>
											<input type="text" id="password" name="password" class="form-control" required/>
										</div>
										<div class="form-group">
											<label><i class='fas fa-lock'></i> Mật khẩu</label>
											<input type="text" id="repassword" name="repassword" class="form-control" required/>
										</div>
										<div class="form-group">
											<label><i class='fas fa-phone'></i> Mã giới thiệu</label>
											<input type="text" id="refphone" name="codeinvite" class="form-control" value="{{$codeinvite}}" @if($codeinvite != null) readonly @endif/>
										</div>
										<div class="form-group text-center">
											<button class="btn btn-primary">Đăng ký</button>
										</div>
									</form>
								</div>
								<div class="card-footer">
									<div class="text-center">
										<a href="{{URL::to('/login')}}" class="btn btn-danger" style="width: 100%; text-align: center;">Đăng nhập</a>	
									</div>
								</div>
							  </div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</main>
@endsection