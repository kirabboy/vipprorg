@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<div class="block area-title-page">
						<h5>Thông tin tài khoản</h5>
					</div>		
				</div>
			</div>
			<div class="row no-gutters container-fluid">
				<div class="col-12">
					<ul class="list-group">
						<li class="list-group-item"><a href="{{URL::to('/my-info')}}">Chỉnh sửa thông tin cá nhân </a></li>
						<li class="list-group-item"><a href="{{URL::to('/bank-info')}}">Chỉnh sửa thông tin ngân hàng</a></li>
					
						
					  </ul>
				</div>
			</div>
		</div>
	</main>
@endsection