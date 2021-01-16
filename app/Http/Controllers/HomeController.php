<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHome(){
        $banners = DB::table('banner')->get();
        $notice =DB::table('notice')->first();
        return view('homepage',['banners'=>$banners, 'notice'=>$notice]);
    }
public function getManagerRef()
{
  if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
$ref= DB::table('users')->where('referal_ofuser',$user->phone)->get();
            return view('manager_ref',['ref'=>$ref]);
           
        }
}    
     public function getDetail(Request $request){
        $idvip = $_GET['id'];
        $vip = DB::table('users')->where('id', $idvip)->first();
        $info_vip = DB::table('info_users')->where('ofuser', $vip->phone)->first();
        $wallet_vip = DB::table('wallet')->where('ofuser', $vip->phone)->first();
        $html = '
        <div class="avatar-detail-vip">
        <div class="account-avatar" >
        <div class="khung-avatar khung-avatar-'.$vip->role.'" style="background-image: url('.asset("/resources/image/img_avatar/".$vip->avatar).')">
            <div class="avatar" ></div>
        </div>
    </div>
        </div>
        <h4 style="color: red">'.$info_vip->nickname.'<h4>
        
        <div>
            <h5 style="color: #efd363">Số dư: <span style="color: #fff">'.number_format($wallet_vip->balance,0,',','.').'</span></h5>
            <h5 style="color: #efd363">Số coin: <span style="color: #fff">'.number_format($wallet_vip->coin,0,',','.').'</span></h5>
            <div class="bounce">
                <p>'.$vip->status.'</p>
            </div>
        </div>
        ';
        return $html;
    }

    public function getnhanqua(Request $request){

         if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            return view('nhanqua');
           
        }
        
    }

     public function nhanqua(Request $request){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            $statistical = DB::table('statistical')->where('ofuser', $user->phone)->first();
            $coin = $money = 0;
            if($statistical->status_gift == 0){
                $wallet = DB::table('wallet')->where('ofuser',$user->phone)->first();

                $ran  = rand(0,9);
                if($ran == 0){
                    DB::table('statistical')->where('ofuser', $user->phone)->update(['status_gift'=> 1]);
                    $html = '<div class="text-center"><img width="100%" src="'.asset("resources/image/img_app/sad.png").'"/></div><p>Uizz. Chúc bạn may mắn lần sau</p>';
                    return $html;
                }
                if(0 < $ran && $ran < 3){
                    $type= 0;
                    $coin = 10;
                }
                if(2 < $ran && $ran < 5){
                    $type=0;
                    $money = 20;
                }
                if(4 < $ran && $ran < 7){
                    $type=0;
                    $money = 100;
                }
                if(6 < $ran && $ran < 9){
                    $type=1;
                    $money = 10000;
                }
                if($ran == 9){
                    $type=2;
                    $money = 20000;
                }
               
                if($type == 0){
                    DB::table('wallet')->where('ofuser', $user->phone)->update(['coin'=>$wallet->coin + $coin]);
                    DB::table('statistical')->where('ofuser', $user->phone)->update(['status_gift'=> 1]);

                    $createhistory = new AccountController();
                    $createhistory->createHistory($user->phone, 'Nhận thưởng '.number_format($coin,0,',','.').' coin từ nhận thưởng hàng ngày');
                }else{
                    DB::table('wallet')->where('ofuser', $user->phone)->update(['balance'=>$wallet->balance + $money]);
                    DB::table('statistical')->where('ofuser', $user->phone)->update(['status_gift'=> 1]);

                    $createhistory = new AccountController();
                    $createhistory->createHistory($user->phone, 'Nhận thưởng '.number_format($money,0,',','.').' vnđ từ nhận thưởng hàng ngày');
                }
                if($type ==0){
                    $html = '<div class="text-center"><img width="100%" src="'.asset("resources/image/img_app/vipcoin.png").'"/></div><p>Bạn đã nhận được '.number_format($coin,0,',','.').' coin VIP từ nhận thưởng hàng ngày</p><p>Coin đã được cộng vào ví của bạn. Chúc bạn 1 ngày vui vẻ.</p>';
                    return $html;
                }elseif($type == 1){
                    $html = '<div class="text-center"><img width="100%" src="'.asset("resources/image/img_app/10000vnd.jpg").'"/></div><p>Bạn đã nhận được '.number_format($money,0,',','.').' vnđ từ nhận thưởng hàng ngày</p><p>Tiền đã được cộng vào ví của bạn. Chúc bạn 1 ngày vui vẻ.</p>';
                    return $html;
                }else{
                    $html = '<div class="text-center"><img width="100%" src="'.asset("resources/image/img_app/20000vnd.jpg").'"/></div><p>Bạn đã nhận được '.number_format($money,0,',','.').' vnđ từ nhận thưởng hàng ngày</p><p>Tiền đã được cộng vào ví của bạn. Chúc bạn 1 ngày vui vẻ.</p>';
                    return $html;
                }
            }else{
                return 'Bạn đã nhận thưởng hàng ngày rồi';
            }
           
        }
    }

    public function postNhanqua(Request $request){
        if (Auth::guard('users')->check()) {
            
            $user = Auth::guard('users')->user();
            if(Session::has('type')){
                $type = Session::get('type');
                $amount = Session::get('amount');
                $wallet = DB::table('wallet')->where('ofuser',$user->phone)->first();
                if($type == 0){
                    DB::table('wallet')->where('ofuser', $user->phone)->update(['coin'=>$wallet->coin + $amount]);
                    $createhistory = new AccountController();
                    $createhistory->createHistory($user->phone, 'Nhận thưởng '.number_format($amount,0,',','.').' coin từ nhận thưởng hàng ngày');
                }else{
                    DB::table('wallet')->where('ofuser', $user->phone)->update(['balance'=>$wallet->blance + $amount]);
                    $createhistory = new AccountController();
                    $createhistory->createHistory($user->phone, 'Nhận thưởng '.number_format($amount,0,',','.').' vnđ từ nhận thưởng hàng ngày');
                }
                DB::table('statistical')->where('ofuser', $user->phone)->update(['status_gift'=> 1]);
                Session::forget('type');
                Session::forget('amount');

                return back()->with('success','Nhận quà thành công');
                
            }else{
                return back()->with('success','Bạn đã nhận thưởng rồi');
            }
          
        }else{
           return redirect('/');
        }
    }
    public function getshopping(){
       return view('shopping');
    }

    public function getRank(){
        $rank = DB::table('wallet')->orderBy('coin', 'desc')->where('coin','>',0)->paginate(100);

        return view('rank', ['rank' => $rank]);
    }
    
    public function getHelpCenter(){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            return view('helpcenter', ['user' => $user]);
        }else{
            return redirect('/login');
        }
    }

    public function getIntroduce(){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            return view('introduce', ['user' => $user]);
        }else{
            return redirect('/login');
        }
    }


    public function getContact(){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            return view('contact', ['user' => $user]);
        }else{
            return redirect('/login');
        }
    }

    public function getBuyCoin(){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            return view('buycoin', ['user' => $user]);
        }else{
            return redirect('/login');
        }
    }
    public function robot(Request $request){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
$stt = DB::table('statistical')->where('ofuser',$user->phone)->first();
if($stt->status_robot ==0){
            if($user->role == 5){
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date =date("Y-m-d");
                $checkMissionDones = DB::table('taking_mission')->where('id_user', $user->id)->where(function($query){
                    $query->where('status_day',1)->orWhere('status',3);
                })->get();


                $missions = DB::table('missions')->where('ofrole', $user->role)->get();
                $mission_avai_f = array();
                $mission_avai_y = array();
                $mission_avai_z = array();
                $role = DB::table('role')->where('ofrole', $user->role)->first();
                $statistical = DB::table('statistical')->where('ofuser', $user->phone)->first(); 
            
                $num_f = 1;
                $num_y = $role->max_mission - 2;
                $num_z = 1;

                
                if(count($checkMissionDones) == 0){
                    foreach($missions as $mission){
                    
                        if($mission->type == 1 ){
                            if(count($mission_avai_f) < $num_f){
                                $wallet = DB::table('wallet')->where('ofuser', $user->phone)->first();
                                $statistical = DB::table('statistical')->where('ofuser', $user->phone)->first();
                                DB::table('taking_mission')->insert(['id_mission'=>$mission->id, 'id_user'=>$user->id, 'result'=>'robot-vipro.png', 'today'=>$date, 'status' => 3, 'status_day' => 0 ]);
                                DB::table('wallet')->where('ofuser', $user->phone)->update(['balance'=>$wallet->balance+$mission->price, 'coin'=>$wallet->coin + $mission->price/1000]);
                                DB::table('statistical')->where('ofuser', $user->phone)->update(['total'=>$statistical->total+$mission->price]);
                                $createhistory = new AccountController();
                                $createhistory->createHistory($user->phone, 'Robot đã giúp bạn hoàn thành nhiệm vụ xem video và  nhận được '.number_format($mission->price,0,',','.').'vnđ');
                                $createhistory->createHistory($user->phone, 'Bạn đã đã hoàn thành nhiệm vụ và  nhận được '.number_format(($mission->price/1000),0,',','.').'coin');
                                array_push($mission_avai_f, $mission);

                            }
                        }
                        if( $mission->type == 2 ){
                            if(count($mission_avai_y) < $num_y){
                                $wallet = DB::table('wallet')->where('ofuser', $user->phone)->first();
                                $statistical = DB::table('statistical')->where('ofuser', $user->phone)->first();
                                DB::table('taking_mission')->insert(['id_mission'=>$mission->id, 'id_user'=>$user->id, 'result'=>'robot-vipro.png', 'today'=>$date, 'status' => 3, 'status_day' => 0 ]);
                                DB::table('wallet')->where('ofuser', $user->phone)->update(['balance'=>$wallet->balance+$mission->price, 'coin'=>$wallet->coin + $mission->price/1000]);
                                DB::table('statistical')->where('ofuser', $user->phone)->update(['total'=>$statistical->total+$mission->price]);
                                $createhistory = new AccountController();
                                $createhistory->createHistory($user->phone, 'Robot đã giúp bạn hoàn thành nhiệm vụ xem video và  nhận được '.number_format($mission->price,0,',','.').'vnđ');
                                $createhistory->createHistory($user->phone, 'Robot đã giúp bạn hoàn thành nhiệm vụ và  nhận được '.number_format(($mission->price/1000),0,',','.').'coin');
                                array_push($mission_avai_y, $mission);

                            }
                        }
                        if($mission->type == 3 ){
                            if(count($mission_avai_z) < $num_z){
                                $wallet = DB::table('wallet')->where('ofuser', $user->phone)->first();
                                $statistical = DB::table('statistical')->where('ofuser', $user->phone)->first();
                                DB::table('taking_mission')->insert(['id_mission'=>$mission->id, 'id_user'=>$user->id, 'result'=>'robot-vipro.png', 'today'=>$date, 'status' => 3, 'status_day' => 0 ]);
                                DB::table('wallet')->where('ofuser', $user->phone)->update(['balance'=>$wallet->balance+$mission->price, 'coin'=>$wallet->coin + $mission->price/1000]);
                                DB::table('statistical')->where('ofuser', $user->phone)->update(['total'=>$statistical->total+$mission->price]);
                                $createhistory = new AccountController();
                                $createhistory->createHistory($user->phone, 'Robot đã giúp bạn hoàn thành nhiệm vụ xem video và  nhận được '.number_format($mission->price,0,',','.').'vnđ');
                                $createhistory->createHistory($user->phone, 'Robot đã giúp bạn thành nhiệm vụ và  nhận được '.number_format(($mission->price/1000),0,',','.').'coin');
                                array_push($mission_avai_z, $mission);

                            }
                        }
                            
                        
                    }
                }else{
                    foreach($missions as $mission){
                        $check = true;
                        foreach($checkMissionDones as $checkMissionDone){
                            if($mission->id == $checkMissionDone->id_mission){
                                $check = false;
                            }
                        }
                        if($check && $mission->type == 1 ){
                            if(count($mission_avai_f) < $num_f){
                                $wallet = DB::table('wallet')->where('ofuser', $user->phone)->first();
                                $statistical = DB::table('statistical')->where('ofuser', $user->phone)->first();
                                DB::table('taking_mission')->insert(['id_mission'=>$mission->id, 'id_user'=>$user->id, 'result'=>'robot-vipro.png', 'today'=>$date, 'status' => 3, 'status_day' => 0 ]);
                                DB::table('wallet')->where('ofuser', $user->phone)->update(['balance'=>$wallet->balance+$mission->price, 'coin'=>$wallet->coin + $mission->price/1000]);
                                DB::table('statistical')->where('ofuser', $user->phone)->update(['total'=>$statistical->total+$mission->price]);
                                $createhistory = new AccountController();
                                $createhistory->createHistory($user->phone, 'Robot đã giúp bạn hoàn thành nhiệm vụ xem video và  nhận được '.number_format($mission->price,0,',','.').'vnđ');
                                $createhistory->createHistory($user->phone, 'Robot đã giúp bạn thành nhiệm vụ và  nhận được '.number_format(($mission->price/1000),0,',','.').'coin');
                                array_push($mission_avai_f, $mission);

                            }
                        }
                        if($check && $mission->type == 2 ){
                            if(count($mission_avai_y) < $num_y){
                                DB::table('taking_mission')->insert(['id_mission'=>$mission->id, 'id_user'=>$user->id, 'result'=>'robot-vipro.png', 'today'=>$date, 'status' => 3, 'status_day' => 0 ]);
                                DB::table('wallet')->where('ofuser', $user->phone)->update(['balance'=>$wallet->balance+$mission->price, 'coin'=>$wallet->coin + $mission->price/1000]);
                                DB::table('statistical')->where('ofuser', $user->phone)->update(['total'=>$statistical->total+$mission->price]);
                                $createhistory = new AccountController();
                                $createhistory->createHistory($user->phone, 'Robot đã giúp bạn hoàn thành nhiệm vụ xem video và  nhận được '.number_format($mission->price,0,',','.').'vnđ');
                                $createhistory->createHistory($user->phone, 'Robot đã giúp bạn thành nhiệm vụ và  nhận được '.number_format(($mission->price/1000),0,',','.').'coin');
                                array_push($mission_avai_y, $mission);

                            }
                        }
                        if($check && $mission->type == 3 ){
                            if(count($mission_avai_z) < $num_z){
                                $wallet = DB::table('wallet')->where('ofuser', $user->phone)->first();
                                $statistical = DB::table('statistical')->where('ofuser', $user->phone)->first();
                                DB::table('taking_mission')->insert(['id_mission'=>$mission->id, 'id_user'=>$user->id, 'result'=>'robot-vipro.png', 'today'=>$date, 'status' => 3, 'status_day' => 0 ]);
                                DB::table('wallet')->where('ofuser', $user->phone)->update(['balance'=>$wallet->balance+$mission->price, 'coin'=>$wallet->coin + $mission->price/1000]);
                                DB::table('statistical')->where('ofuser', $user->phone)->update(['total'=>$statistical->total+$mission->price]);
                                $createhistory = new AccountController();
                                $createhistory->createHistory($user->phone, 'Robot đã giúp bạn hoàn thành nhiệm vụ xem video và  nhận được '.number_format($mission->price,0,',','.').'vnđ');
                                $createhistory->createHistory($user->phone, 'Robot đã giúp bạn hoàn thành nhiệm vụ và  nhận được '.number_format(($mission->price/1000),0,',','.').'coin');
                                array_push($mission_avai_z, $mission);

                            }
                        }
                            
                        
                    }

                    
                } 
            }
          }
          DB::table('statistical')->where('ofuser',$user->phone)->update(['status_robot'=>1]);
}
          return 'Thành công';
    }
    

    public function getEarnMoney(){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            $checkMissionDones = DB::table('taking_mission')->where('id_user', $user->id)->where('status_day',1)->get();

            $missions = DB::table('missions')->where('ofrole', $user->role)->get();
            $mission_avai_f = array();
            $mission_avai_y = array();
            $mission_avai_z = array();
            $role = DB::table('role')->where('ofrole', $user->role)->first();
            $statistical = DB::table('statistical')->where('ofuser', $user->phone)->first(); 
            
            $num_f = 1;
            $num_y = $role->max_mission - 2;
            $num_z = 1;

            
            if(count($checkMissionDones) == 0){
                foreach($missions as $mission){
                  
                    if($mission->type == 1 ){
                        if(count($mission_avai_f) < $num_f){
                            array_push($mission_avai_f, $mission);
                        }
                    }
                    if( $mission->type == 2 ){
                        if(count($mission_avai_y) < $num_y){
                            array_push($mission_avai_y, $mission);
                        }
                    }
                    if($mission->type == 3 ){
                        if(count($mission_avai_z) < $num_z){
                            array_push($mission_avai_z, $mission);
                        }
                    }
                        
                    
                }
            }else{
                foreach($missions as $mission){
                    $check = true;
                    foreach($checkMissionDones as $checkMissionDone){
                        if($mission->id == $checkMissionDone->id_mission){
                            $check = false;
                        }
                    }
                    if($check && $mission->type == 1 ){
                        if(count($mission_avai_f) < $num_f){
                            array_push($mission_avai_f, $mission);
                        }
                    }
                    if($check && $mission->type == 2 ){
                        if(count($mission_avai_y) < $num_y){
                            array_push($mission_avai_y, $mission);
                        }
                    }
                    if($check && $mission->type == 3 ){
                        if(count($mission_avai_z) < $num_z){
                            array_push($mission_avai_z, $mission);
                        }
                    }
                        
                    
                }

                
            }
            return view('earnmoney', ['user' => $user, 'mission_f' =>$mission_avai_f, 'mission_y'=>$mission_avai_y,'mission_z'=>$mission_avai_z]);
        }else{
            return redirect('/login');
        }
    }

    public function getMissionDetail(Request $request){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            $mission = DB::table('missions')->where('id', $request->idmission)->first();
            $checkMission = DB::table('taking_mission')->where('id_mission', $request->idmission)->where('id_user', $user->id)->first();
            return view('mission_detail', ['user' => $user, 'mission' =>$mission,'checkMission'=> $checkMission]);
        }else{
            return redirect('/login');
        }
    }

    public function takeMission(Request $request){
        if (Auth::guard('users')->check()){
            $user = Auth::guard('users')->user();
        $mission = DB::table('missions')->where('id', $request->idmission)->first();

if($user->role != $mission->ofrole){
return back()->with('error','Hãy trung thực nếu không chúng tôi sẽ xoá tài khoản của bạn');

}


$role= DB::table('role')->where('ofrole', $user->role)->first();
$taking_mission = DB::table('taking_mission')->where('id_user', $user->id)->where('status_day',0)->get();
for($i = 0; $i < count($taking_mission);$i++){
$mission = DB::table('missions')->where('id', $taking_mission[$i]->id_mission)->first();
 if($mission->ofrole != $user->role){
unset($taking_mission[$i]);

}
}
if(count($taking_mission) >= $role->max_mission ){
return back()->with('error','Hãy trung thực nếu không chúng tôi sẽ xoá tài khoản của bạn');
}
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date =date("Y-m-d");
            DB::table('taking_mission')->insert(['id_mission'=>$request->idmission, 'id_user'=>$user->id, 'today'=>$date, 'status' => 0, 'status_day' => 0 ]);
            return back()->with('success','Nhận nhiệm vụ thành công');
         
            
        }else{
            return redirect('/login');
        }
    }
    
    public function uploadImgMission(Request $request){
        $user = Auth::guard('users')->user();

        $file = $request->file('result');
        $idmission = $request->idmission;
        $mission = DB::table('missions')->where('id', $idmission)->first();
        $wallet = DB::table('wallet')->where('ofuser', $user->phone)->first();
        $statistical = DB::table('statistical')->where('ofuser', $user->phone)->first();

        $file->move('resources/image/img_mission/', $file->getClientOriginalName());
        $idtakingmission = DB::table('taking_mission')->where('id_mission', $request->idmission)->where('id_user', $user->id)->first();
        DB::table('wallet')->where('ofuser', $user->phone)->update(['balance'=>$wallet->balance+$mission->price, 'coin'=>$wallet->coin + $mission->price/1000]);
        DB::table('taking_mission')->where('id', $idtakingmission->id)->update(['result'=>$file->getClientOriginalName()]);
        DB::table('taking_mission')->where('id', $idtakingmission->id)->update(['status' => 3]);
        DB::table('statistical')->where('ofuser', $user->phone)->update(['total'=>$statistical->total+$mission->price]);
        $createhistory = new AccountController();
        $createhistory->createHistory($user->phone, 'Bạn đã  hoàn thành nhiệm vụ và  nhận được '.number_format($mission->price,0,',','.').'vnđ');
        $createhistory->createHistory($user->phone, 'Bạn đã  hoàn thành nhiệm vụ và  nhận được '.number_format(($mission->price/1000),0,',','.').'coin');

        return back()->with('success', 'Bạn đã hoàn thành nhiệm vụ');
        
    }

    public function doneVideo(Request $request){
        $id_user = $request->id_user;
        $id_mission = $request->id_mission;
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $date =date("Y-m-d");
        $user = DB::table('users')->where('id', $id_user)->first();
$role= DB::table('role')->where('ofrole', $user->role)->first();
$taking_mission = DB::table('taking_mission')->where('id_user', $user->id)->where('status_day',0)->get();
for($i = 0; $i < count($taking_mission);$i++){
$mission = DB::table('missions')->where('id', $taking_mission[$i]->id_mission)->first();
 if($mission->ofrole != $user->role){
unset($taking_mission[$i]);

}
}
if(count($taking_mission) >= $role->max_mission ){
return back()->with('error','Hãy trung thực nếu không chúng tôi sẽ xoá tài khoản của bạn');
}
        $mission = DB::table('missions')->where('id', $id_mission)->first();

if($user->role != $mission->ofrole){
return back()->with('error','Hãy trung thực nếu không chúng tôi sẽ xoá tài khoản của bạn');

}
        DB::table('taking_mission')->insert(['id_mission'=>$request->id_mission, 'id_user'=>$id_user, 'today'=>$date, 'status' => 0, 'status_day' => 0 ]);
        $taking_mission = DB::table('taking_mission')->where('id_user', $id_user)->where('id_mission', $id_mission)->first();

        $wallet = DB::table('wallet')->where('ofuser', $user->phone)->first();
        $statistical = DB::table('statistical')->where('ofuser', $user->phone)->first();

        DB::table('wallet')->where('ofuser', $user->phone)->update(['balance'=>$wallet->balance+$mission->price, 'coin'=>$wallet->coin + $mission->price/1000]);
        DB::table('taking_mission')->where('id', $taking_mission->id)->update(['status' => 3]);
        DB::table('statistical')->where('ofuser', $user->phone)->update(['total'=>$statistical->total+$mission->price]);


        $createhistory = new AccountController();
        $createhistory->createHistory($user->phone, 'Bạn đã  hoàn thành nhiệm vụ xem video và  nhận được '.number_format($mission->price,0,',','.').'vnđ');
        $createhistory->createHistory($user->phone, 'Bạn đã  hoàn thành nhiệm vụ và  nhận được '.number_format(($mission->price/1000),0,',','.').'coin');

        return back()->with('success', 'Bạn đã hoàn thành nhiệm vụ');

    }

    public function doneMission(Request $request){
        $user = Auth::guard('users')->user();
        $checkMission = DB::table('taking_mission')->where('id_mission', $request->idmission)->orderBy('id', 'desc')->first();
        $mission = DB::table('missions')->where('id', $request->idmission)->first();
        if($checkMission->result != null && $checkMission->status ==0 ){
            DB::table('taking_mission')->where('id', $checkMission->id)->update(['status' => 2]);
            $createhistory = new AccountController();
            $createhistory->createHistory($user->phone, 'Bạn đã đã xác nhận hoàn thành nhiệm vụ "'.$mission->name.'"');
            return back()->with('success', 'Bạn đã xác nhận hoàn thành nhiệm vụ');
        }else{
            return back()->with('error', 'Bạn chưa đủ điều kiện xác nhận hoàn thành nhiệm vụ');
        }
    }
    // public function getBuySpin(){
    //     if (Auth::guard('users')->check()) {
    //         $user = Auth::guard('users')->user();
    //         $wallet = DB::table('wallet')->where('ofuser', $user->phone)->first();
    //         $spin_ofuser = DB::table('spin_ofuser')->where('ofuser', $user->phone)->first();

    //         $spin_setting = DB::table('spin_setting')->where('id', 1)->first();
    //         return view('buy_spin',['user'=>$user, 'wallet'=>$wallet, 'spin_setting'=>$spin_setting, 'spin_ofuser'=>$spin_ofuser]);
    //     }else{
    //         return redirect('/login');
    //     }
    // }
    // public function postBuySpin(Request $request){
    //     if (Auth::guard('users')->check()) {
    //         $user = Auth::guard('users')->user();
    //         $wallet = DB::table('wallet')->where('ofuser', $user->phone)->first();
    //         $spin_ofuser = DB::table('spin_ofuser')->where('ofuser', $user->phone)->first();
    //         $spin_setting = DB::table('spin_setting')->where('id', 1)->first();
    //         $qty = $request->quantity;
    //         $total = $qty * $spin_setting->price_per_round;
    //         if($wallet->balance >= $total){
    //             DB::table('wallet')->where('ofuser', $user->phone)->update(['balance'=>$wallet->balance-$total]);
    //             DB::table('spin_ofuser')->where('ofuser', $user->phone)->update(['count'=>$spin_ofuser->count+$qty]);

    //             return back()->with('success', 'Đã mua lượt quay thành công, quay ngay thôi nào'); 
    //         }else{
    //             return back()->with('error', 'Số dư của bạn không đủ, vui lòng nạp thêm tiền');
    //         }
    //     }else{
    //         return redirect('/login');
    //     }
    // }
    // public function getSpin(){
    //     if (Auth::guard('users')->check()) {
    //         $user = Auth::guard('users')->user();
    //         $spin_ofuser = DB::table('spin_ofuser')->where('ofuser', $user->phone)->first();

    //         return view('spinnew.spin',['spin_ofuser'=> $spin_ofuser]);
    //     }else{
    //         return redirect('/login');
    //     }
    // }

    // public function postSpin(Request $request){
    //     $user = Auth::guard('users')->user();
    //     $spin_ofuser = DB::table('spin_ofuser')->where('ofuser', $user->phone)->first();
    //     $type = $_GET['type'];
    //     $value = $_GET['value'];
    //     if($spin_ofuser->count > 0 ){
    //         DB::table('spin_ofuser')->where('ofuser', $user->phone)->update(['count'=>$spin_ofuser->count-1]);
    //     }
    //     if($type != 0){
    //         DB::table('spin_history')->insert(['ofuser'=>$user->phone, 'type'=>$type, 'value'=>$value, 'status'=>0]);
    //     }
    //     return null;
    // }

    // public function getSpinHistory(){
    //     if (Auth::guard('users')->check()) {
    //         $user = Auth::guard('users')->user();
    //         $statistical = DB::table('statistical')->where('ofuser', $user->phone)->first();

    //         $spin_history = DB::table('spin_history')->where('ofuser', $user->phone)->orderBy('id', 'desc')->get();

    //         return view('spinhistory',['spin_history'=> $spin_history, 'statistical' => $statistical]);
    //     }else{
    //         return redirect('/login');
    //     }
    // }
    
    // public function receiSpin(Request $request){
    //     if (Auth::guard('users')->check()) {
    //         $user = Auth::guard('users')->user();
    //         $id_spin = $request->id;
    //         $statistical = DB::table('statistical')->where('ofuser', $user->phone)->first();
    //         $wallet = DB::table('wallet')->where('ofuser', $user->phone)->first();
    //         $spin_history = DB::table('spin_history')->where('ofuser', $user->phone)->get();
    //         $spin = DB::table('spin_history')->where('id',$id_spin)->first();
    //         if($spin->type == 2){
    //             if($spin->status == 0){
    //                 DB::table('spin_history')->where('id',$id_spin)->update(['status'=>1]);
    //                 DB::table('wallet')->where('ofuser',$user->phone)->update(['balance'=>$wallet->balance+$spin->value]);
    //                 DB::table('statistical')->where('ofuser',$user->phone)->update(['total_spin_money'=> $statistical->total_spin_money+$spin->value, 'month_total'=> $statistical->month_total+$spin->value, 'today_total'=> $statistical->today_total+$spin->value,'total'=> $statistical->total+$spin->value]);

    //                 return back()->with('success', 'Nhận thưởng thành công');

    //             }else{
    //                 return back()->with('error', 'Bạn đã nhận thưởng');
    //             }
    //         }else{
    //             return back()->with('error', 'Chúng tôi sẽ liên lạc để trao thưởng');
    //         }
    //     }else{
    //         return redirect('/login');
    //     }
    // }

    // public function settingJsonSpin(){
    //     $user = Auth::guard('users')->user();
    //     $spin_ofuer = DB::table('spin_ofuser')->where('ofuser', $user->phone)->first();
    //     header('Content-type: application/json');
    //     $data = array(
    //     "colorArray" => array("#364C62", "#95A5A6", "#16A085", "#27AE60", "#2980B9", "#8E44AD", "#2C3E50", "#F39C12", "#D35400", "#C0392B","#1ABC9C", "#2ECC71", "#E87AC2", "#3498DB", "#9B59B6", "#7F8C8D"),


    //         "segmentValuesArray" => array( 
    //             //0:giay 1: vang 2:ss 3:ip 4 tivi
    //         array(
    //             "probability" => 0,
    //             "type" => "string",
    //             "value" => "50.000.000 VNĐ",
    //             "win" => true,
    //             "resultText" => "<button id='btn-spin' data-type='2' data-value='50000000' class='btn btn-warning'>Quay</button>",
    //             "userData" => array("type" => 2, "value"=>50000000)
    //         ),  
    
    //         array(
    //             "probability" => '0',
    //             "type" => "image",
    //             "value" => url('resources/image/img_spin/tivi.png'),
    //             "win" => false,
    //             "resultText" => "<button id='btn-spin' data-type='1' data-value='2' class='btn btn-warning'>Quay</button>",
    //             "userData" => array("type" => 1, "value"=>2)

    //         ),
    //         array(
    //             "probability" => 60,
    //             "type" => "string",
    //             "value" => "Chúc may mắn",
    //             "win" => true,
    //             "resultText" => "<button id='btn-spin' data-type='0' data-value='0' class='btn btn-warning'>Quay</button>",
    //             "userData" => array("type" => 0, "value"=>0)

    //         ),
    
    //         array(
    //             "probability" => 0,
    //             "type" => "image",
    //             "value" => url('resources/image/img_spin/ip.png'),
    //             "win" => false,
    //             "resultText" => "<button id='btn-spin' data-type='1' data-value='1' class='btn btn-warning'>Quay</button>",
    //             "userData" => array("type" => 1, "value"=>1)

    //         ),   
    
    
    //         array(
    //             "probability" => 60,
    //             "type" => "string",
    //             "value" => "Chúc may mắn",
    //             "win" => true,
    //             "resultText" => "<button id='btn-spin' data-type='0' data-value='0' class='btn btn-warning'>Quay</button>",
    //             "userData" => array("type" => 0, "value"=>0)

    //         ), 
    //         array(
    //             "probability" => 30,
    //             "type" => "string",
    //             "value" => "20.000 VNĐ",
    //             "win" => true,
    //             "resultText" => "<button id='btn-spin' data-type='2' data-value='20000' class='btn btn-warning'>Quay</button>",
    //             "userData" => array("type" => 2, "value"=>20000)

    //         ), 
    
    //             array(
    //             "probability" => 0,
    //             "type" => "image",
    //             "value" => url('resources/image/img_spin/ss.png'),
    //             "win" => true,
    //             "resultText" => "<button id='btn-spin' data-type='1' data-value='3' class='btn btn-warning'>Quay</button>",
    //             "userData" => array("type" => 1, "value"=>3)

    //         ),  
    
    //         array(
    //             "probability" => 60,
    //             "type" => "string",
    //             "value" => "Chúc may mắn",
    //             "win" => true,
    //             "resultText" => "<button id='btn-spin' data-type='0' data-value='0' class='btn btn-warning'>Quay</button>",
    //             "userData" => array("type" => 0, "value"=>0)

    //         ), 
    //         array(
    //             "probability" => 30,
    //             "type" => "string",
    //             "value" => "20.000 VNĐ",
    //             "win" => true,
    //             "resultText" => "<button id='btn-spin' data-type='2' data-value='20000' class='btn btn-warning'>Quay</button>",
    //             "userData" => array("type" => 2, "value"=>20000)

    //         ),  
    
    //         array(
    //             "probability" => 0,
    //             "type" => "image",
    //             "value" => url('resources/image/img_spin/gold.png'),
    //             "win" => true,
    //             "resultText" => "<button id='btn-spin' data-type='1' data-value='5' class='btn btn-warning'>Quay</button>",
    //             "userData" => array("type" => 1, "value"=>5)

    //         ),  
    
    //         array(
    //             "probability" => 60,
    //             "type" => "string",
    //             "value" => "Chúc may mắn",
    //             "win" => true,
    //             "resultText" => "<button id='btn-spin' data-type='0' data-value='0' class='btn btn-warning'>Quay</button>",
    //             "userData" => array("type" => 0, "value"=>0)

    //         ),  
    
    //         array(
    //             "probability" => 0,
    //             "type" => "string",
    //             "value" => "1.000.000 VNĐ",
    //             "win" => false,
    //             "resultText" => "<button id='btn-spin' data-type='2' data-value='1000000' class='btn btn-warning'>Quay</button>",
    //             "userData" => array("type" => 2, "value"=>1000000)

    //         ), 
    //         array(
    //             "probability" => 60,
    //             "type" => "string",
    //             "value" => "Chúc may mắn",
    //             "win" => true,
    //             "resultText" => "<button id='btn-spin' data-type='0' data-value='0' class='btn btn-warning'>Quay</button>",
    //             "userData" => array("type" => 0, "value"=>0)

    //         ),  
    //         array(
    //             "probability" => 5,
    //             "type" => "string",
    //             "value" => "100.000 VNĐ",
    //             "win" => false,
    //             "resultText" => "<button id='btn-spin' data-type='2' data-value='100000' class='btn btn-warning'>Quay</button>",
    //             "userData" => array("type" => 2, "value"=>100000)

    //         ),
    //         array(
    //             "probability" => 0,
    //             "type" => "image",
    //             "value" => url('resources/image/img_spin/gc.png'),
    //             "win" => true,
    //             "resultText" => "<button id='btn-spin' data-type='1' data-value='4' class='btn btn-warning'>Quay</button>",
    //             "userData" => array("type" => 1, "value"=>5)

    //         )
    //         ),
    //     "svgWidth" => 1024,
    //     "svgHeight" => 768,
    //     "wheelStrokeColor" => "#D0BD0C",
    //     "wheelStrokeWidth" => 18,
    //     "wheelSize" => 900,
    //     "wheelTextOffsetY" => 80,
    //     "wheelTextColor" => "#EDEDED",
    //     "wheelTextSize" => "16px",
    //     "wheelImageOffsetY" => 40,
    //     "wheelImageSize" => 120,
    //     "centerCircleSize" => 150,
    //     "centerCircleStrokeColor" => "#F1DC15",
    //     "centerCircleStrokeWidth" => 12,
    //     "centerCircleFillColor" => "#EDEDED",
    //     "centerCircleImageUrl" => url('/resources/image/star.gif'),
    //     "centerCircleImageWidth" => 150,
    //     "centerCircleImageHeight" => 150,  
    //     "segmentStrokeColor" => "#E2E2E2",
    //     "segmentStrokeWidth" => 4,
    //     "centerX" => 512,
    //     "centerY" => 384,  
    //     "hasShadows" => false,
    //     "numSpins" => $spin_ofuer->count,
    //     "spinDestinationArray" => array(),
    //     "minSpinDuration" => 6,
    //     "gameOverText" => "Bạn đã hết lượt quay, vui lòng mua thêm lượt và quay lại",
    //     "invalidSpinText" =>"INVALID SPIN. PLEASE SPIN AGAIN.",
    //     "introText" => "Chào mừng bạn đến với vòng quay triệu phú! <br/>Click vào vòng quay để chơi!",
    //     "hasSound" => true,
    //     "gameId" => "9a0232ec06bc431114e2a7f3aea03bbe2164f1aa",
    //     "clickToSpin" => true,
    //     "spinDirection" => "ccw"

    //     );

    //     return json_encode( $data);
    // }
    // public function settingJson(){
    //     $user = Auth::guard('users')->user();
    //     $spin_ofuer = DB::table('spin_ofuser')->where('ofuser', $user->phone)->first();
    //     header('Content-type: application/json');
    //     $data = array(
    //     "colorArray" => array("#364C62", "#F1C40F", "#E74C3C", "#ECF0F1", "#95A5A6", "#16A085", "#27AE60", "#2980B9", "#8E44AD", "#2C3E50", "#F39C12", "#D35400", "#C0392B", "#BDC3C7","#1ABC9C", "#2ECC71", "#E87AC2", "#3498DB", "#9B59B6", "#7F8C8D"),

    //     "segmentValuesArray" => array( 
    //         //0:giay 1: vang 2:ss 3:ip 4 tivi
    //     array(
    //         "probability" => 0,
    //         "type" => "string",
    //         "value" => "50.000.000 VNĐ",
    //         "win" => true,
    //         "resultText" => "<button id='btn-spin' data-type='2' data-value='50000000' class='btn btn-warning'>Quay</button>"
    //     ),  

    //     array(
    //         "probability" => '0',
    //         "type" => "image",
    //         "value" => url('resources/image/img_spin/tivi.png'),
    //         "win" => false,
    //         "resultText" => "<button id='btn-spin' data-type='1' data-value='2' class='btn btn-warning'>Quay</button>"
    //     ),
    //     array(
    //         "probability" => 50,
    //         "type" => "string",
    //         "value" => "Chúc may mắn",
    //         "win" => true,
    //         "resultText" => "<button id='btn-spin' data-type='0' data-value='0' class='btn btn-warning'>Quay</button>"
    //     ),

    //     array(
    //         "probability" => 0,
    //         "type" => "image",
    //         "value" => url('resources/image/img_spin/ip.png'),
    //         "win" => false,
    //         "resultText" => "<button id='btn-spin' data-type='1' data-value='1' class='btn btn-warning'>Quay</button>"
    //     ),   


    //     array(
    //         "probability" => 50,
    //         "type" => "string",
    //         "value" => "Chúc may mắn",
    //         "win" => true,
    //         "resultText" => "<button id='btn-spin' data-type='0' data-value='0' class='btn btn-warning'>Quay</button>"
    //     ), 
    //     array(
    //         "probability" => 50,
    //         "type" => "string",
    //         "value" => "20.000 VNĐ",
    //         "win" => true,
    //         "resultText" => "<button id='btn-spin' data-type='2' data-value='20000' class='btn btn-warning'>Quay</button>"
    //     ), 

    //         array(
    //         "probability" => 0,
    //         "type" => "image",
    //         "value" => url('resources/image/img_spin/ss.png'),
    //         "win" => true,
    //         "resultText" => "<button id='btn-spin' data-type='1' data-value='3' class='btn btn-warning'>Quay</button>"
    //     ),  

    //     array(
    //         "probability" => 50,
    //         "type" => "string",
    //         "value" => "Chúc may mắn",
    //         "win" => true,
    //         "resultText" => "<button id='btn-spin' data-type='0' data-value='0' class='btn btn-warning'>Quay</button>"
    //     ), 
    //     array(
    //         "probability" => 50,
    //         "type" => "string",
    //         "value" => "20.000 VNĐ",
    //         "win" => true,
    //         "resultText" => "<button id='btn-spin' data-type='2' data-value='20000' class='btn btn-warning'>Quay</button>"
    //     ),  

    //     array(
    //         "probability" => 0,
    //         "type" => "image",
    //         "value" => url('resources/image/img_spin/gold.png'),
    //         "win" => true,
    //         "resultText" => "<button id='btn-spin' data-type='1' data-value='5' class='btn btn-warning'>Quay</button>"
    //     ),  

    //     array(
    //         "probability" => 50,
    //         "type" => "string",
    //         "value" => "Chúc may mắn",
    //         "win" => true,
    //         "resultText" => "<button id='btn-spin' data-type='0' data-value='0' class='btn btn-warning'>Quay</button>"
    //     ),  

    //     array(
    //         "probability" => 0,
    //         "type" => "string",
    //         "value" => "1.000.000 VNĐ",
    //         "win" => false,
    //         "resultText" => "<button id='btn-spin' data-type='2' data-value='1000000' class='btn btn-warning'>Quay</button>"
    //     ), 
    //     array(
    //         "probability" => 50,
    //         "type" => "string",
    //         "value" => "Chúc may mắn",
    //         "win" => true,
    //         "resultText" => "<button id='btn-spin' data-type='0' data-value='0' class='btn btn-warning'>Quay</button>"
    //     ),  
    //     array(
    //         "probability" => 0,
    //         "type" => "string",
    //         "value" => "100.000 VNĐ",
    //         "win" => false,
    //         "resultText" => "<button id='btn-spin' data-type='2' data-value='100000' class='btn btn-warning'>Quay</button>"
    //     ),
    //     array(
    //         "probability" => 100,
    //         "type" => "image",
    //         "value" => url('resources/image/img_spin/gc.png'),
    //         "win" => true,
    //         "resultText" => "<button id='btn-spin' data-type='1' data-value='4' class='btn btn-warning'>Quay</button>"
    //     )
    //     ),
    //     "svgWidth" => 1024,
    //     "svgHeight" => 768,
    //     "wheelStrokeColor" => "#D0BD0C",
    //     "wheelStrokeWidth" => 18,
    //     "wheelSize" => 950,
    //     "wheelTextOffsetY" => 90,
    //     "wheelTextColor" => "#EDEDED",
    //     "wheelTextSize" => "1.5em",
    //     "wheelImageOffsetY" => 10,
    //     "wheelImageSize" => 150,
    //     "centerCircleSize" => 50,
    //     "centerCircleStrokeColor" => "#F1DC15",
    //     "centerCircleStrokeWidth" => 12,
    //     "centerCircleFillColor" => "#EDEDED",
    //     "segmentStrokeColor" => "#E2E2E2",
    //     "segmentStrokeWidth" => 4,
    //     "centerX" => 512,
    //     "centerY" => 384,  
    //     "hasShadows" => false,
    //     "numSpins" => $spin_ofuer->count ,
    //     "spinDestinationArray" => array(),
    //     "minSpinDuration" => 5,
    //     "gameOverText" => "Bạn đã hết lượt quay, vui lòng mua thêm lượt quay ở phía dưới!",
    //     "invalidSpinText" =>"INVALID SPIN. PLEASE SPIN AGAIN.",
    //     "introText" => "Bạn có ".$spin_ofuer->count." lượt quay",
    //     "hasSound" => true,
    //     "gameId" => "9a0232ec06bc431114e2a7f3aea03bbe2164f1aa",
    //     "clickToSpin" => true

    //     );

    //     return json_encode( $data);
    // }
}
