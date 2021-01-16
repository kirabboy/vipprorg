@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<div class="block area-title-page">
						<h5>Chi tiết thành viên</h5>
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
			<div class="row no-gutters container-fluid" style="background: #fff">
				<div class="col-12">
					<!-- Button trigger modal -->
				
					
					<!-- Modal -->
					<!-- Modal -->
					<div class="modal fade" id="doimatkhau" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle" style="color: red">Đổi mật khẩu tài khoản thành viên</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							</div>
							<div class="modal-body">
								<form class="form form-changepass" action="{{URL::to('admin/quanlythanhvien/changepass')}}" method="POST"  oninput='repassword.setCustomValidity(password.value != repassword.value ? "Mật khẩu không khớp!" : "")'>
									{{ csrf_field() }}
			
									<div class="form-group">
										<label><i class='fas fa-phone-square-alt'></i> Số điện thoại</label>
										<input type="number" id="phone" name="phone" value="{{$member->phone}}" class="form-control" readonly/>
									</div>
									<div class="form-group">
										<label><i class='fas fa-lock'></i> Mật khẩu mới</label>
										<input type="text" id="password" name="password" class="form-control" required/>
									</div>
									<div class="form-group">
										<label><i class='fas fa-lock'></i> Nhập lại mật khẩu</label>
										<input type="text" id="repassword" name="repassword" class="form-control" required/>
									</div>
									<div class="form-group text-center">
										<button class="btn btn-primary" type="submit">Cập nhật mật khẩu</button>
									</div>
								</form>
							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						</div>
						</div>
					</div>
                    <form action="{{URL::to('admin/quanlythanhvien/'.$member->id)}}" id="cttv" method="POST">
                        {{ csrf_field() }}
<div class="form-group">
							<label>Ref của: </label>
							<input type="number" class="form-control" name="ref" value="{{$member->referal_ofuser}}" readonly/>
						</div>
						<div class="form-group">
							<label>Số điện thoại</label>
							<input type="number" class="form-control" name="phone" value="{{$member->phone}}" readonly/>
						</div>
						<div class="form-group">
							<label>Tên</label>
							<input type="text" class="form-control" name="phone" value="{{$info->name}}" readonly/>
						</div>
						<div class="form-group">
							<label>Cấp</label>
							<input type="text" class="form-control" name="phone" value="{{$role->name}}" readonly/>
						</div>
						<div class="form-group">
							<label>Tên tài khoản ngân hàng</label>
							<input type="text" class="form-control" name="username" value="{{$bank->username}}" readonly/>
						</div>
						<div class="form-group">
							<label>Số tài khoản ngân hàng</label>
							<input type="number" class="form-control" name="banknumber" value="{{$bank->banknumber}}" readonly/>
						</div>
						<div class="form-group">
							<label>Tên ngân hàng</label>
							<input type="text" class="form-control" name="bankname" value="{{$bank->bankname}}" readonly/>
						</div>

						<div class="form-group">
							<label>Zalo</label>
							<input type="text" class="form-control" name="zalo" value="{{$info->zalo}}" readonly/>
						</div>
						<div class="form-group">
							<label>Số dư</label>
							<input type="number" class="form-control" name="balance" value="{{$wallet->balance}}"/>
						</div>
						<div class="form-group">
							<label>Số coin</label>
							<input type="number" class="form-control" name="coin" value="{{$wallet->coin}}"/>
						</div>
						<div class="form-group">
							<label>Số thành viên</label>
							<input type="number" class="form-control" name="count_f" value="{{$count_f}}" readonly/>
						</div>
		
						
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Cập nhật</button>
						</div>
						
					</form>
					<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#doimatkhau">
						Đổi mật khẩu
					</button>
					<br/><br/><br/>
				</div>
			</div>
		</div>
	</main>
@endsection