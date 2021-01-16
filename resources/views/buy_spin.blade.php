@extends('layout.master')
@section('content')
	<main id="main">
		<style>
	.qty {
    width: 40px;
    height: 25px;
    text-align: center;
}
input.qtyplus { width:25px; height:25px;}
input.qtyminus { width:25px; height:25px;}
.quantity label{
	color: #fff;
}
		</style>
		<input type="hidden" value="{{$spin_setting->price_per_round}}" id="price-per-round"/>
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12">
					<div class="block area-title-page text-center">
						<h5>Mua lượt quay</h5>
						@if(Session::has('success'))
						<div class="alert alert-success" role="alert">
							{{Session::get('success')}}
							<div><a href="{{URL::to('/spin')}}"><b style="color: rgb(255, 0, 0)">Bấm vào đây để quay ngay</b></a></div>
						</div>
					@endif
					@if(Session::has('error'))
						<div class="alert alert-danger" role="alert">
							{{Session::get('error')}}
						</div>
					@endif
					</div>		
				</div>
			</div>
			<div class="row no-gutters container-fluid">
				<div class="col-12">
					<div class="gif-buy-spin">
                        <img src="{{asset("/resources/image/slotmac.gif")}}"/>
                    </div>
				</div>
			</div>
			<div class="row no-gutters container-fluid">
				<div class="col-12">
					<div class="alert alert-dark" role="alert">
						<div class="text-center">
							<p >
								<b style="font-weight: 600; color:black ">Số dư cá nhân: <span style="color: red;">{{number_format($wallet->balance,0,',','.')}} vnđ</span></b>
							</p>
							<p >
								<b style="font-weight: 600; color:black ">Lượt quay hiện có: <span style="color: red;">{{number_format($spin_ofuser->count,0,',','.')}}</span></b>

							</p> 
						</div>
					  </div>
					<form action="" method="post" class="text-center quantity">
						{{ csrf_field() }}

						<div class="form-group">
							<label>Giá tiền:</label>
							<input tyle="text" id="price-total" class="form-control text-center"  value="{{$spin_setting->price_per_round}} VNĐ">
						</div>
							<div class="form-group">
								<label>Số lượng</label><br />
								<input type='button' value='-' class='qtyminus minus' field='quantity' />
								<input type='text' name='quantity' value='1' class='qty' />
								<input type='button' value='+' class='qtyplus plus' field='quantity' />
							</div>
							
							<div class="form-group">
								<input type="submit" class="btn btn-warning" value="Mua">
							</div>
					</form>
					<div class="text-center">
						<a href="{{URL::to('/spin')}}">Quay ngay</a>
					</div>
					<script>
						 jQuery(document).ready(($) => {
							$('.quantity').on('click', '.plus', function(e) {
								let $input = $(this).prev('input.qty');
								let val = parseInt($input.val());
								$input.val( val+1 ).change();
								$('#price-total').val($('#price-per-round').val() * $input.val() +" VNĐ");
							});
					
							$('.quantity').on('click', '.minus', 
								function(e) {
								let $input = $(this).next('input.qty');
								var val = parseInt($input.val());
								if (val > 1) {
									$input.val( val-1 ).change();
									$('#price-total').val($('#price-per-round').val() * $input.val() +" VNĐ");

								} 
							});
						});
					</script>
				</div>
			</div>
		</div>
	</main>
@endsection