@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<h4 class="title-block">Rút tiền về ngân hàng</h4>
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
			<div class="row no-gutters container-fluid">
				<div class="col-12">
					<form id="form-info" action="" method="POST" >
						{{ csrf_field() }}
						
						<div id="alert-deposit" class="alert alert-warning text-center" role="alert">
							<h5 style="color: #000">Xác nhận đúng thông tin ngân hàng của bạn, nếu sai chúng tôi không chịu trách nhiệm về khoản tiền này</h5>
							<div class="text-left">
								<b>Tên ngân hàng: </b><span style="color: red;">{{$bank->bankname}}</span><br/>
								<b>Chủ tài khoản: </b><span style="color: red;">{{$bank->username}}</span><br />
								<b>Số tài khoản: </b><span style="color: red;">{{$bank->banknumber}}</span><br />
							</div>
						</div>
						  
						<div class="form-group">
							<label>Cấp của bạn được rút ít nhất {{number_format($role->min_withd,0,',','.')}} vnđ</label>
							<input id="amount" class="form-control" type="number" name="amount" value="" min="{{$role->min_withd}}" required/>
						</div>
					
						<div class="form-group text-center">
							<button class="btn btn-danger">Rút</button>
						</div>
					</form>
				
				</div>
			</div>
		</div>
	</main>
@endsection