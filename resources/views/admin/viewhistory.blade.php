@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<div class="block area-title-page">
						<h5>Cộng thêm coin</h5>
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
			<div class="row no-gutters container-fluid">
				<div class="col-12">
                    <form action="{{URL::to('/admin/viewhistory')}}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label style="color: #fff">Nhập số điện thoại người cần xem</label>
                            <input class="form-controll" name="phone" type="text" required/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Xem</button>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</main>
@endsection