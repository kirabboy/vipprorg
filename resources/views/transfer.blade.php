@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<h4 class="title-block">Chuyển coin vip</h4>
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
							<b>Coin của bạn: <span style="color: red"> {{number_format(intval($wallet->coin),0,',','.')}}</span> coin</b>
						</div>
						  
						<div class="form-group">
							<label>Số điện thoại nhận coin</label>
							<input class="form-control" type="number" name="phone" value="" required/>
						</div>

					        <div class="form-group">
							<label>Số coin chuyển</label>
							<input class="form-control" type="number" name="amount" value="" required/>
						</div>
					
						<div class="form-group text-center">
							<button class="btn btn-danger">Chuyển</button>
						</div>
					</form>
				
				</div>
			</div>
		</div>
	</main>
@endsection