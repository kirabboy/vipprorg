@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<div class="block area-title-page">
						<h5>Tạo nhiệm vụ</h5>
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
                    <form action="" method="POST">
                        {{ csrf_field() }}
						<div class="form-group">
                            <label style="color: #fff">Chọn loại nhiệm vụ</label>
                            <select name="type" id="type">
								<option>--Chọn loại--</option>
								<option value="1">Facebook</option>
								<option value="2">Youtube</option>
								<option value="3">Zalo</option>
							</select>
						</div>
                        <div class="form-group">
                            <label style="color: #fff">Nhập tên nhiệm vụ</label>
                            <input class="form-control" name="name" id="name" type="text" required/>
						</div>
						
						<div class="form-group">
							<label style="color: #fff">Hướng dẫn nhiệm vụ</label>
							<div class="mota" style="background: rgba(0, 0, 0, 0.418); color:#fff;"></div>
						</div>
						<script>
							$('#type').on('change', function(){
								var type = $('#type').val();
								var mota = "";
								var name = "";
								if(type == 1){
									mota = "B1: bước 1 ấn coppy link chia sẻ<br/>B2: vào Facebook cá nhân đăng lên tường<br/>B3: chụp ảnh màn hình bài đăng như hình dưới và tải lên ở mục tải file và ấn xác nhận";
									$('.mota').html(mota);
									name = "Chia sẻ lên Facebook cá nhân";
									$('#name').val(name);
								}else if(type == 2){
									mota = "B1: bước 1 ấn coppy link chia sẻ<br/>B2: vào link Youtube xem, thích, đăng ký<br/>B3: chụp ảnh màn hình bài đăng như hình dưới và tải lên ở mục tải file và ấn xác nhận";
									$('.mota').html(mota);
									name = "Xem, thích, đăng ký kênh youtube ";
									$('#name').val(name);
								}else{
									mota = "B1: bước 1 ấn coppy link chia sẻ<br/>B2: vào Zalo cá nhân đăng lên tường<br/>B3: chụp ảnh màn hình bài đăng như hình dưới và tải lên ở mục tải file và ấn xác nhận";
									$('.mota').html(mota);
									name = "Chia sẻ lên Zalo cá nhân";
									$('#name').val(name);
								}
							});
						</script>
						<div class="form-group">
                            <label style="color: #fff">Chọn cấp nhiệm vụ</label>
                            <select name="role" id="role">
								<option>--Chọn cấp--</option>
								<option value="-1">Xanh</option>
								<option value="0">Đồng</option>
								<option value="1">Bạc</option>
							</select>
						</div>
						<div class="form-group">
							<label style="color: #fff">Tiền nhận được nhiệm vụ(Hệ thống tự tính theo số tiền tối đa nhận được trong ngày)</label>
							<input type="number" class="form-control" name="price" id="price" value="" required readonly/>
						</div>
						<script>
							$('#role').on('change', function(){
								var type = $('#role').val();
								var price;
								if(type == -1){
									price = 7000;
									$('#price').val(price);
								}else if(type == 0){
									price = 10000;
									$('#price').val(price);

								}else{
									price = 11000;
									$('#price').val(price);

								}
							});
						</script>
						<div class="form-group">
							<label style="color: #fff">Link làm nhiệm vụ</label>
							<input class="form-control" type="text" name="link" id="link" required/>

						</div>
						<div class="form-group">
							<label style="color: #fff">Số lượng nhiệm vụ</label>
							<input class="form-control" type="text" name="count" required/>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Đăng nhiệm vụ</button>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</main>
@endsection