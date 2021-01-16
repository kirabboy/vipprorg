@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<div class="block area-title-page">
						<h5>Nạp tiền nâng cấp tài khoản</h5>
					</div>		
				</div>
			</div>
			<div class="row no-gutters container-fluid">
				<div class="col-12">
					<form id="form-info" action="" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						@if(Session::has('success'))
							<div class="alert alert-success text-center" role="alert">
								{{Session::get('success')}}
							</div>
						@elseif(Session::has('error'))
							<div class="alert alert-danger text-center" role="alert">
								{!!Session::get('error')!!}
							</div>
						@endif
						<div id="alert-deposit" style="display: none" class="alert alert-primary text-center" role="alert">
							<b>Bạn chuyển <span style="color: red" id="amount-alert"></span> vnđ vào tài khoản ngân hàng số tiền muốn nạp và up biên lai lên</b><br />
							<b>Chủ tài khoản: </b><span>KIM DUOC  </span> <br />
							<b>Số tài khoản: </b><span><input type="text" style="width: fit-content;" value="104872467994" readonly id="stk" /></span><span style="cursor: pointer; background: green; border: 1px solid #000; border-radius: 5px; padding: 3px 5px; color: #fff;" onclick="copystk()">copy</span><br />
							<b>Tên ngân hàng: </b><span>Viettinbank Phạm Hùng, quận 8</span>
							
						  </div>
						  <script>
							function copystk() {
								  /* Get the text field */
								  var copyText = document.getElementById("stk");

								  /* Select the text field */
								  copyText.select();
								  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

								  /* Copy the text inside the text field */
								  document.execCommand("copy");

								  /* Alert the copied text */
								  alert("Copy số tài khoản: " + copyText.value);
								  }
						</script>
						<div class="form-group">
							<label>Nhập vào số tiền bạn muốn nạp</label>
							<input id="amount" class="form-control" type="number" name="amount" min="100000" value="" required/>
						</div>
						<div class="form-group">
							<label>Biên lai chuyển tiền</label>
							<input class="form-control" type="file" name="bill" value="" required/>
						</div>
						<div class="form-group text-center">
							<button class="btn btn-primary">Nạp</button>
						</div>	
					</form>
					<script>
						$('#amount').on('keyup', function(){
							$('#alert-deposit').css('display', 'block');
							$('#amount-alert').text($('#amount').val());
						})
					</script>
				</div>
			</div>
		</div>
	</main>
@endsection