@extends('layout.master')
@section('content')
	<main id="main" class="admin">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<div class="block area-title-page">
						<h5>Quản trị admin</h5>
					</div>	
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col-6 text-center">
			        <button style="width: 100%" class="btn btn-success">Tổng thành viên: {{count($users)}}</button>
				</div>
				<div class="col-6 text-center">
			        <button style="width: 100%" class="btn btn-warning">Đăng ký mới hôm nay: {{$count}}</button>
				</div>
			</div>
			<div class="row no-gutters container-fluid row-home-admin">
				<div class="col-12">
                    <a href="{{URL::to('admin/quanlythanhvien')}}" class="btn btn-danger">Quản lý thành viên</a>
				</div>
			</div>
			<div class="row no-gutters container-fluid row-home-admin">
				<div class="col-6">
                    <a href="{{URL::to('admin/editbalance')}}" class="btn btn-info">Sửa số dư</a>
				</div>
				<div class="col-6">
					<a href="{{URL::to('admin/editbanner')}}" class="btn btn-info">Đổi banner</a>

				</div>
			</div>
			<div class="row no-gutters container-fluid row-home-admin">
				<div class="col-6">
					<a href="{{URL::to('admin/editcoin')}}" class="btn btn-info">Cộng Coin VIP</a>
				</div>
				<div class="col-6">
					<a href="{{URL::to('admin/editflashsale')}}" class="btn btn-info">Sửa flash sale</a>

				</div>
			</div>
			<div class="row no-gutters container-fluid row-home-admin">
				<div class="col-6">
                    <a href="{{URL::to('admin/duyetvip')}}" class="btn btn-info">Duyệt nâng cấp </a>
				</div>
				<div class="col-6">
                    <a href="{{URL::to('admin/lichsunap')}}" class="btn btn-info">Lịch sử nạp</a>
				</div>
			</div>
			<div class="row no-gutters container-fluid row-home-admin">
				<div class="col-6">
                    <a href="{{URL::to('admin/duyetlenhrut')}}" class="btn btn-info">Duyệt lệnh rút</a>
				</div>
				<div class="col-6">
                    <a href="{{URL::to('admin/lichsurut')}}" class="btn btn-info">Lịch sử rút</a>
				</div>
			</div>
<div class="row no-gutters container-fluid row-home-admin">
				<div class="col-6">
                    <a href="{{URL::to('admin/viewhistory')}}" class="btn btn-info">Xem lịch sử</a>
				</div>
				<div class="col-6">
				</div>
			</div>
		</div>
	</main>
@endsection