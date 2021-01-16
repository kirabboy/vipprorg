@extends('layout.master')
@section('content')
	<main id="main">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 text-center">
					<h4 class="title-block">Liên hệ</h4>
				</div>
			</div>
			<div class="row  container-fluid">
				<div class="col-6">
					<div class="card-zalo text-center"  >
                      <img style="" class="card-img-top" src="{{URL::to('/resources/image/img_app/z1.jpg')}}" alt="Card image cap">
                      <div class="card-body">
                          <h5 class="card-title" style="color: red; font-weight: 600;">ZALO 1</h5>
                          <p class="card-text"style="color: #000;">Liên lạc qua kênh Zalo của chúng tôi</p>
                          <a href="https://zalo.me/0084928463083" class="btn btn-primary">liên hệ</a>
                        </div>
                      </div>
                </div>
  <div class="col-6">
                <div class="card-zalo text-center" >
                  <img style="" class="card-img-top" src="{{URL::to('/resources/image/img_app/z4.jpg')}}" alt="Card image cap">
                  <div class="card-body">
                                <h5 class="card-title" style="color: red;font-weight: 600;">ZALO 2</h5>
                                <p class="card-text" style="color: #000;">Liên lạc qua kênh Zalo của chúng tôi</p>
                                <a href="https://zalo.me/00855978138325" class="btn btn-primary">Liên hệ</a>
                              </div>
                            </div>
              </div>
                  </div>
               
            </div>
            <div class="row  container-fluid">
            
                    
		</div>
<div class="row  container-fluid">
             
<div class="col-6">
                <div class="card-zalo text-center" >
                  <img style="" class="card-img-top" src="{{URL::to('/resources/image/img_app/vipcoin.png')}}" alt="Card image cap">
                  <div class="card-body">
                                <h5 class="card-title" style="color: red; font-weight: 600;">ZALO Group</h5>
                                <p class="card-text"style="color: #000;">Group Zalo support của chúng tôi</p>
                                <a href="https://zalo.me/g/srehcn387" class="btn btn-primary">liên hệ</a>
                              </div>
                            </div>
                      </div>
                
		</div>

	</main>
@endsection