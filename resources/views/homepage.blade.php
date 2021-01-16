@extends('layout.master')
@section('content')
<main id="main">
    <div class="container-fluid">
       
        <div class="row">
            <div class="col">
                <div class="card text-white bg-dark mb-3" style="">
                    <div class="card-header">
                      <img src="{{asset('/resources/image/img_app/wallet.png')}}" /> Số dư ví
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Tài khoản hiện có: <span class="value">999.999 VNĐ</span></h5>
                      <h5 class="card-title">Tổng thu nhập: <span class="value">999.999 VNĐ</span></h5>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-danger">Chi tiết</button>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card text-white bg-dark mb-3" style="">
                    <div class="card-header">
                        <img src="{{asset('/resources/image/img_app/user.png')}}" /> Thông tin
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Tên đăng nhập: <span class="value">Kira</span></h5>
                      <h5 class="card-title">Cấp độ: <span class="value">Admin</span></h5>
                      <h5 class="card-title">Ngày tham gia: <span class="value">22/01/2021</span></h5>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-danger">Chỉnh sửa</button>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card text-white bg-dark mb-3" style="">
                    <div class="card-header">
                        <img src="{{asset('/resources/image/img_app/group.png')}}" /> Cấp dưới
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Tổng thành viên <span class="value">15</span></h5>
                      <h5 class="card-title">Tổng hoa hồng: <span class="value">999.999 VNĐ</span></h5>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-danger">Chi tiết</button>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card text-white bg-dark mb-3" style="">
                    <div class="card-header">
                        <img src="{{asset('/resources/image/img_app/spinning-wheel.png')}}" /> Săn giải thưởng
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Game: <span class="value">VÒNG QUAY CHỌN GIẢI</span></h5>
                      <h5 class="card-title">Giải thưởng: </h5>
                      <span class="value">Thẻ cào Viettel 100k, Vip 1, Vip 2,...</span>
                      <h5 class="card-title">Thể lệ: </h5>
                      <span class="value">Mỗi ngày bạn sẽ được tặng một vòng quay hoặc bạn có thể mua vòng quay bằng tiền kiếm được...</span>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-danger">Tham gia</button>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</main>
@endsection