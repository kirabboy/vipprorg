@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid ">
			<div class="row no-gutters">
				<div class="col-12">
					<div class="row">
						<div class="col">
							<div class="card text-white bg-dark mb-3" style="">
								<div class="card-header">
									Đăng nhập
								</div>
								<div class="card-body">
									<form class="form-login" action="" method="POST">
										{{ csrf_field() }}
										@if(Session::has('error'))
											<div class="alert alert-danger" role="alert">
												{{Session::get('error')}}
											</div>
										@endif
										@if(Session::has('success'))
											<div class="alert alert-success" role="alert">
												{{Session::get('success')}}
											</div>
										@endif
										<div class="form-group">
											<label><i class='fas fa-phone-square-alt'></i> Số điện thoại</label>
											<input type="number" id="phone" name="phone" class="form-control" required/>
										</div>
										<div class="form-group">
											<label><i class='fas fa-lock'></i> Mật khẩu</label>
											<input type="password" id="password" name="password" class="form-control" required/>
										</div>
										<div class="form-group text-center">
											<button class="btn btn-primary">Đăng nhập</button>
										</div>
									</form>
								</div>
								<div class="card-footer">
									<div class="text-center">
										<a href="{{URL::to('/register')}}" class="btn btn-danger" style="width: 100%; text-align: center;">Đăng ký</a>
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