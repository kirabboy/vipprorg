@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<div class="block area-title-page">
						<h5>Duyệt lệnh nạp</h5>
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
							<th scope="col">Bill</th>
							<th scope="col">Hành động</th>
						  </tr>
						</thead>
						<tbody>
							@foreach($lenhnap as $value)
						  <tr>
							<td>{{$value->ofuser}}</td>
							<td>{{$value->amount}} vnđ<br/>
{{$value->updated_at}}
</td>
                          <td><img onclick="showimg(this)" id="img{{$value->id}}" data-id="{{$value->id}}" style="width: 50px; height: 50px;" src="{{asset('/resources/image/img_bill/'.$value->bill)}}"/></td>
							<td><a class="btn btn-primary" href="{{URL::to('/admin/duyetlenhnap/'.$value->id)}}">✓</a><a class="btn btn-danger" href="{{URL::to('/admin/huynap/'.$value->id)}}">✗</a></td>

						  </tr>
                            @endforeach
						</tbody>
                      </table>
                      <div id="myModal" class="modal text-center" >
                          <div class="modal-content" style="background: #fff;">
                            <img  id="img-modal" >
                            <span class="close" style="color: #000">Đóng</span>
                          </div>
                      </div>
                      <script>
                        // Get the modal
                        function showimg(element){
                            $('#img-modal').attr('src',$(element).attr('src'));
                            $('#myModal').css("display","block");

                        }
                        
                        $('.close').click(function(){
                            $('#myModal').css("display","none");
                        });
                     

                        // When the user clicks on <span> (x), close the modal
                     
                        </script>
				</div>
			</div>
		</div>
	</main>
@endsection