@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<div class="block area-title-page">
						<h5>Thay đổi banner</h5>
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
					<div class="fotorama"  data-width="100%" data-nav="false"  data-autoplay="true">
						@foreach($banners as $val)
							<img src="{{asset('/resources/image/img_app/'.$val->name)}}" width="100%">
						@endforeach
					</div>
				</div>
			</div>
			<div class="row no-gutters container-fluid">
				<div class="col-12">
					<form action="" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="form-group">
							<label style="color: #fff;">Chọn các file ảnh banner</label>
							<input class="form-control" type="file" name="photos[]" multiple >
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Thay đổi</button>
						</div>
					<form>
				</div>
			</div>
		</div>
	</main>
@endsection