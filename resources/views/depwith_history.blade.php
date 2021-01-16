@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<h4 class="title-block">Lịch sử nạp rút tiền</h4>	
				</div>
			</div>
			<div class="row no-gutters container-fluid">
				<div class="col-12">
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
					<div class="group-tabs tab-depwith">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#nap" data-toggle="tab">Lịch sử nạp</a></li>
                          <li><a class="" href="#rut" data-toggle="tab">Lịch sử rút</a></li>
                        </ul>
                  
                        <!-- Tab panes -->
                        <div class="tab-content clearfix">
                            <div  class="tab-pane fade in active" id="nap">
                                <table class="table table-bordered table-cus" style="background: #fff;">
                                    <thead>
                                      <tr>
                                        <th scope="col">SĐT</th>
                                        <th scope="col">Số tiền</th>
                                        <th scope="col">Trạng thái</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lenhnap as $value)
                                      <tr>
                                        <td>{{$value->ofuser}}</td>
                                        <td>{{number_format($value->amount,0,',','.')}} vnđ</td>
                                        <td>
                                            @if($value->status == 0)
                                            <a > Chưa Duyệt</a>
                                            @elseif($value->status==1)
                                            <a style="color: green"> Đã Duyệt</a>
                                            @else
                                            <a style="color: red;"> Huỷ</a>
                                            @endif
                                        </td>
            
                                      </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                                  
                          
                            </div>
                            <div  class="tab-pane fade" id="rut">
                                <table class="table table-bordered table-cus" style="background: #fff;">
                                    <thead>
                                      <tr>
                                        <th scope="col">SĐT</th>
                                        <th scope="col">Số tiền</th>
                                        <th scope="col">Trạng thái</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lenhrut as $value)
                                      <tr>
                                        <td>{{$value->ofuser}}</td>
                                        <td>{{number_format($value->amount,0,',','.')}} vnđ</td>
                                        <td>
                                            @if($value->status == 0)
                                           <a > Chưa Duyệt</a>
                                            @elseif($value->status==1)
                                            <a style="color: green">Đã Duyệt</a>
                                            @elseif($value->status==2)
                                            <a style="color: red;"> Đã huỷ</a>
                                            @endif
                                        </td>
            
                                      </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                            </div>
                           
                        </div>
                      </div>
				</div>
			</div>
		</div>
	</main>
@endsection