@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12">
                    <div class="area-account-top">
                        <div class="khung-{{$role->ofrole}}">
                        <div class="row no-gutters">
                            <div class="col-6 text-center">
                                <div class="account-avatar block">
                                    <div class="khung-avatar khung-avatar-{{$role->ofrole}}" style="background-image: url('{{asset('/resources/image/img_avatar/'.$user->avatar)}}')">
                                        <div class="avatar" ></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 text-left">
                                <div class="account-info block">
                                        <a class="btn btn-info" data-toggle="modal" data-target="#nickname-modal">Đổi nickname</a>

                                    @if($user->role >=2)
                                        <a class="btn btn-warning" data-toggle="modal" data-target="#avatar-modal"><i class="fa fa-id-badge"></i> Đổi Avatar</a>
                                    @else
                                        <a class="btn btn-warning" href="{{URL::to('/upgrate')}}"><i class="fa fa-id-badge"></i>  Đổi avatar</a>
                                    @endif
                                    @if($user->role >=3)
                                        <a class="btn btn-success" data-toggle="modal" data-target="#status-modal">Đổi cảm nghĩ</a>
                                    @else
                                        <a class="btn btn-success" href="{{URL::to('/upgrate')}}">Đổi cảm nghĩ</a>
                                    @endif
                                    @if($user->role >=4)
                                        <a class="btn btn-light" href="https://zalo.me/">Thư ký riêng</a>
                                    @else
                                        <a class="btn btn-success" href="{{URL::to('/upgrate')}}">Thư ký riêng</a>
                                    @endif
                                    <a class="btn btn-primary" href="{{URL::to('/change-password')}}"><i class="fa fa-key"></i> Đổi mật khẩu</a>

                                    <a class="btn btn-danger" href="{{URL::to('/logout')}}"><i class="fa fa-share-square"></i> Đăng xuất</a>

                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters account-block-name alert alert-name">
                            <div class="col-6">
                                <b> Tài khoản: <span>{{$user->phone}}</span></b><br/>
                                <b> Nickname: <span>{{$info->nickname}}</span></b><br/>
                            </div>
                            <div class="col-6" style="border-left: 1px dotted #eee;padding-left: 10px">
                                <b> Cấp độ: <span>{{$role->name}}</span></b><br/>
                                <a type="button" style="color: red" data-toggle="modal" data-target="#ref-modal">
                                    Lấy link giới thiệu
                                </a>
                            </div>
                        </div>

      <div class="row no-gutters" style="    border-radius: 10px;padding: 10px;margin: 10px 10px;border: 3px solid red;">
                                <div class="col-12 text-center">
                                        <a href="{{URL::to('/transfer')}}" class="btn btn-info" id="">Chuyển coin</a>
                                        
                                </div>
                            </div>

                        @if($user->role == 5)

                            <div class="row no-gutters" style="    border-radius: 10px;padding: 10px;margin: 10px 10px;border: 3px solid red;">
                                <div class="col-12 text-center">
                                        <button class="btn btn-info" id="robot">Robot</button>
                                        
                                </div>
                            </div>
                            <div class="modal fade" id="robot-notice" role="dialog">
                                <div class="modal-dialog  modal-dialog-centered">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Robot làm nhiệm vụ</h4>
                                    </div>
                                    <div class="modal-body text-center" style="color: #fff">
                                        
                                            <button style="color: #fff !important" type="button" id="batdau" class="btn btn-warning" autocomplete="off" style="width:8em">
                                                Bắt đầu
                                            </button>
                                            <br/>
                                            <br/>
                                            <br/>

                                            <div class="progress" id="submit_progress" >
                                                <div class="progress-bar progress-bar-success " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="load" style="width:0%">
                                                0%
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                              <script>
                                $('#batdau').click(function() {
                                    $.ajax({
                                        type: "get",
                                        url: "{{URL::to('/robot')}}",
                                        data: {}, 
                                        error: function(reponses){
                                            console.log(reponses);
                                            console.log('false');
                                        },
                                        success: function(reponses)
                                        {
                                            console.log(reponses); 
                                        }
                                    });  

                                    var timerId, percent;

                                    // reset progress bar
                                    percent = 0;
                                    $('#batdau').attr('disabled', true);
                                    $('#load').css('width', '0px');
                                    $('#load').addClass('progress-bar-striped active');


                                    timerId = setInterval(function() {

                                    // increment progress bar
                                    percent += 5;
                                    $('#load').css('width', percent + '%');
                                    $('#load').html(percent + '%');


                                    // complete
                                    if (percent >= 100) {
                                        clearInterval(timerId);
                                        $('#batdau').addClass('btn-success');
                                        $('#batdau').removeClass('btn-warning');
                                        $('#batdau').text('Đã xong');
                                        // $('#load').removeClass('progress-bar-striped active');
                                        // $('#load').html('payment complete');

                                        // do more ...

                                    }

                                    }, 200);


                                    });
                                $('#robot').click(function(){
                                    $("#robot-notice").modal();
                                });
                                
                            </script>
                        @endif
                        <div class="row no-gutters">
                            <div class="col-6 text-center">
                                <button onclick="location.href='{{URL::to('/upgrate')}}'" style="width: 100% ;color:white !important;" class="btn btn-warning">
                                    <img style="width: 30px; " src="{{asset('/resources/image/img_app/deposit-a.png')}}" /> Nạp tiền</button>
                            </div>
                            <div class="col-6 text-center">
                                <button onclick="location.href='{{URL::to('/withdrawn')}}'" style="width: 100% ;color:white !important;" class="btn btn-danger">
                                    <img style="width: 30px; " src="{{asset('/resources/image/img_app/withd-a.png')}}" /> Rút tiền</button>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-12">
                                <div class="alert alert-warning text-center" role="alert">
                                    <h5 class="text-center" style="color: red; font-weight: 600;text-decoration: underline">Cảm nghĩ</h5>
                                    <marquee> {{$user->status}}</marquee>
                                </div>
                            </div>
                        </div>
                        @if($role->ofrole > 0)
                        <div class="foot-vip">
                            <img src="{{asset('/resources/image/img_app/'.$role->img_bot)}}"/>
                        </div>
                        @endif
                        </div>
                 
             
                        </div>

                        
                    
                        <div class="row no-gutters">
                            <div class="col-12">
                                <h4 class="block title-block">
                                    Thông tin tài khoản
                                </h4>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-6 text-center">
                                <div class="block-g area-amount">
                                    <p class="amount-title">
                                        Số dư
                                    </p>
                                    <p class="amount-price">
                                        {{number_format($wallet->balance,0,',','.')}} vnđ
                                    </p> 
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <div class="block-g area-amount">
                                    <p class="amount-title">
                                        Điểm VIP
                                    </p>
                                    <p class="amount-price">
                                        {{number_format($wallet->coin,0,',','.')}} coin
                                    </p> 
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-4 text-center">
                                <div class="block-g area-amount">
                                    <p class="amount-title">
                                        Tổng thu nhập
                                    </p>
                                    <p class="amount-price">
                                        {{number_format($statistical->total,0,',','.')}} vnđ
                                    </p> 
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <div class="block-g area-amount">
                                    <p class="amount-title">
                                        Tổng hoa hồng
                                    </p>
                                    <p class="amount-price">
                                        {{number_format($statistical->total_referal,0,',','.')}} vnđ
                                    </p> 
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <div class="block-g area-amount" onclick="location.href='{{URL::to('/manager-ref')}}'">
                                    <p class="amount-title">
                                        Thành viên
                                    </p>
                                    <p class="amount-price">
                                        {{$count_f}}<br/>
(Xem chi tiết)
                                    </p> 
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-4 text-center">
                                <div class="block-g area-amount" onclick="location.href='{{URL::to('/my-info')}}'">
                                    <p class="amount-title">
                                        Cá nhân
                                    </p>
                                    <p class="amount-price">
                                        <img src="{{asset('/resources/image/img_app/edit.png')}}"/>
                                    </p> 
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <div class="block-g area-amount" onclick="location.href='{{URL::to('/depwith-history')}}'">
                                    <p class="amount-title">
                                        Lịch sử nạp rút
                                    </p>
                                    <p class="amount-price">
                                        <img src="{{asset('/resources/image/img_app/deposit.png')}}"/>
                                    </p> 
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <div class="block-g area-amount" onclick="location.href='{{URL::to('/bank-info')}}'">
                                    <p class="amount-title">
                                        Ngân hàng
                                    </p>
                                    <p class="amount-price">
                                        <img src="{{asset('/resources/image/img_app/bank-building.png')}}"/>
                                    </p> 
                                </div>
                            </div>
                        </div>
                  
                     

  
                        
                    </div>
				</div>
			</div>
        </div>
        <div class="modal fade" id="ref-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body">
                    <div class="row no-gutters container-fluid ">
                        <div class="col-12 text-center">                              
                            <label style="color: red">Link giới thiệu</label><br/>
                            <b style="color: #fff"> Mã giới thiệu: <span>{{$user->referal_code}}</span></b><br/>

                        </div>
                        <div class="col-9">
                            <div class="form-group link-ref text-center">
                                <input class="form-control" id="linkref" value="{{URL::to('/register/'.$user->referal_code)}}"/>
                            </div>
                        </div>
                    <div class="col-3">
                            <div class="form-group text-center">
                                <button onclick="copiecode()" class="btn btn-info">Copy</button>
                            </div>
                        </div>
                    </div>
                    
                    <script>
                        function copiecode() {
                          var copyText = document.getElementById("linkref");
                          copyText.select();
                          copyText.setSelectionRange(0, 99999)
                          document.execCommand("copy");
                          alert("Đã copy link của bạn: " + copyText.value);
                        }
                        </script>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="avatar-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body">
                    <form action="{{URL::to('/up-avatar')}}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
                        <div class="form-group">
                            <label>Chọn ảnh đại diện của bạn</label>
                            <input type="file" class="form-control" name="avatar" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="status-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body">
                    <form action="{{URL::to('/up-status')}}" method="POST">
						{{ csrf_field() }}
                        <div class="form-group">
                            <label>Điền cảm nghĩ của bạn</label>
                            <textarea style="text-left" name="status" cols="12" class="form-control" rows="5" required>

                            </textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="nickname-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body">
                    <form action="{{URL::to('/up-nickname')}}" method="POST">
						{{ csrf_field() }}
                        <div class="form-group">
                            <label>Điền nickname của bạn</label>
                            <input type="text" class="form-control" name="nickname" >
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
    </main>
    
@endsection