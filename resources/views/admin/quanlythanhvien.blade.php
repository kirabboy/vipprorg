@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<div class="block area-title-page">
						<h5>Quản lý thành viên</h5>
					</div>	
				</div>
			</div>
			<div class="row no-gutters container-fluid">
				<div class="col-12">
                    <form action="{{URL::to('/admin/viewchitiet')}}" method="POST">
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
			<div class="row no-gutters container-fluid" style="background: #fff">
				<div class="col-12">
					<table class="table table-bordered table-cus" id="user-table" style="background: #fff;">
						<thead>
						  <tr>
							<th scope="col">Phone</th>
							<th scope="col">Số dư</th>
							<th scope="col">Thành viên</th>
							<th scope="col"></th>
						  </tr>
						</thead>
						<tbody>
							@foreach($users as $value)
						  <tr>
							<td>{{$value->phone}}</td>
							<td>{{number_format((DB::table('wallet')->where('ofuser', $value->phone)->value('balance')),0,',','.')}} vnđ</td>
                          <td>
							<?php
								$count_f = 0;
								$f1 = $f2 = array();
								$f1 = DB::table('users')->where('referal_ofuser', $value->phone)->get();
								foreach($f1 as $val){
									$f2 = DB::table('users')->where('referal_ofuser', $val->phone)->get();
									$count_f += count($f2);
								}
								$count_f += count($f1);
							?>
								{{$count_f}}
						  </td>
							<td>
								<a href="{{URL::to('admin/quanlythanhvien/'.$value->id)}}" class="btn btn-info">Xem</a>
							</td>

						  </tr>
                            @endforeach
						</tbody>
					  </table>
					
                      
				</div>
			</div>
			<div class="text-center row">
				<div class="col-12">
					{{ $users->links() }}
				</div>
			</div>
		</div>
	</main>
@endsection