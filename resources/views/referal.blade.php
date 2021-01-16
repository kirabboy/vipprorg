@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12">
					<div class="block area-title-page">
						<h5>Giới thiệu bạn bè</h5>
					</div>		
				</div>
			</div>
			<div class="row no-gutters container-fluid">
				<div class="col-8">
					<div class="form-group link-ref">
						<label>Copy link giới thiệu và gửi cho bạn bè của bạn</label>
						<input class="form-control" id="linkref" value="{{URL::to('/register/'.$user->referal_code)}}"/>
					</div>
				</div>
			<div class="col-4">
					<div class="form-group text-center">
						<button onclick="copiecode()" class="btn btn-info">Copy</button>
					</div>
				</div>
			</div>
			
				
		</div>
	</main>
@endsection