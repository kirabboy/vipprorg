@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<div class="block area-title-page">
						<h5>Lịch sử rút</h5>
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
					<table class="table table-bordered table-cus" style="background: #fff;">
						<thead>
						  <tr>
							<th scope="col">Phone</th>
							<th scope="col">Tiền</th>
							<th scope="col">Trạng thái</th>
						  </tr>
						</thead>
						<tbody>
							@foreach($lenhrut as $value)
						  <tr>
							<td>{{$value->ofuser}}</td>
							<td>{{$value->amount}} vnđ</td>
							<td>
								@if($value->status == 0)
								Chưa Duyệt
								@elseif($value->status==1)
								Đã Duyệt
								@elseif($value->status==2)
								Đã huỷ
								@endif
							</td>

						  </tr>
                            @endforeach
						</tbody>
                      </table>
                   
			</div>
		</div>
	</main>
@endsection