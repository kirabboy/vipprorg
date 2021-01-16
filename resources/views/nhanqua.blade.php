@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<h4 class="title-block">Nhận thưởng hàng ngày</h4>
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
      <div class="text-center" role="">
<img width="100%" src="{{asset('/resources/image/img_app/banner-coin.jpg')}}"/>
      </div>
      <div class="modal fade" id="quanotice" role="dialog">
        <div class="modal-dialog  modal-dialog-centered">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-center">Nhận thưởng hàng ngày</h4>
            </div>
            <div class=" text-center" style="color: #fff">
              
            </div>
            <div class="modal-body text-center" style="color: #fff">
            </div>
           
            
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
          </div>
          
        </div>
      </div>
      <script>
          function nhanqua(){
              $.ajax({
                  type: "get",
                  url: "{{URL::to('/nhanqua')}}",
                  data: {}, 
                  error: function(reponses){
                      console.log(reponses);
                      console.log('false');
                  },
                  success: function(reponses)
                  {
                      $('#quanotice .modal-body').html(reponses);
                      $("#quanotice").modal();
                      console.log(reponses); 
                  }
              });          
          }
          
      </script>
			<div class="row  container-fluid">
				<div class="col-6">
					<div class="card-qua text-center"  >
              <img onclick="nhanqua()" style="" class="card-img-top" src="{{URL::to('/resources/image/img_app/gift.png')}}" alt="Card image cap">
          </div>
        </div>
        <div class="col-6">
					<div class="card-qua text-center" >
            <img onclick="nhanqua()"  style="" class="card-img-top" src="{{URL::to('/resources/image/img_app/gift.png')}}" alt="Card image cap">
            
          </div>
        </div>
				
      </div>
      <div class="row  container-fluid">
				<div class="col-6">
					<div class="card-qua text-center"  >
              <img onclick="nhanqua()"  style="" class="card-img-top" src="{{URL::to('/resources/image/img_app/gift.png')}}" alt="Card image cap">
          </div>
        </div>
        <div class="col-6">
					<div class="card-qua text-center" >
            <img onclick="nhanqua()"  style="" class="card-img-top" src="{{URL::to('/resources/image/img_app/gift.png')}}" alt="Card image cap">
            
          </div>
        </div>
				
      </div>
      <div class="row  container-fluid">
				<div class="col-6">
					<div class="card-qua text-center"  >
              <img onclick="nhanqua()"  style="" class="card-img-top" src="{{URL::to('/resources/image/img_app/gift.png')}}" alt="Card image cap">
          </div>
        </div>
        <div class="col-6">
					<div class="card-qua text-center" >
            <img onclick="nhanqua()"  style="" class="card-img-top" src="{{URL::to('/resources/image/img_app/gift.png')}}" alt="Card image cap">
            
          </div>
        </div>
				
      </div>
    </div>
	</main>
@endsection