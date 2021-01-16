@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<div class="block area-title-page">
						<h5>Duyệt lệnh rút</h5>
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
							<th scope="col">Hành động</th>
						  </tr>
						</thead>
						<tbody>
							@foreach($lenhrut as $value)
						  <tr>
<?php $bank = DB::table('bank')->where('ofuser',$value->ofuser)->first();?>
							<td>{{$value->ofuser}}<br/>
{{$bank->bankname}}<br/>
{{$bank->username}}<br/>

{{$bank->banknumber}}



</td>
							<td>{{$value->amount}} vnđ<br/>
{{$value->updated_at}}
</td>
							<td><a class="btn btn-primary" href="{{URL::to('/admin/duyetlenhrut/'.$value->id)}}">✓</a><a href="{{URL::to('/admin/huylenhrut/'.$value->id)}}" class="btn btn-danger">✗</a></td>

						  </tr>
                            @endforeach
						</tbody>
                      </table>
                    
				</div>
			</div>
		</div>
	</main>
@endsection