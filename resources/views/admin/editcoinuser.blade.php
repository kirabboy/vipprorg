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
                    <form action="{{URL::to('/admin/editcoinuser')}}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label style="color: #fff">Số điện thoại</label>
                            <input class="form-controll" name="phone" type="text" value="{{$wallet->ofuser}}"  readonly required/>
						</div>
						<div class="form-group">
                            <label style="color: #fff">Số coin hiện tại</label>
                            <input class="form-controll" name="oldcoin" type="number" value="{{$wallet->coin}}"  readonly required/>
						</div>
						<div class="form-group">
                            <label style="color: #fff">Số coin thêm</label>
                            <input class="form-controll" name="coinadd" type="number" required/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</main>
@endsection