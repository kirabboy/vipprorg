<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getHomeAdmin(){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                date_default_timezone_set('Asia/Ho_Chi_Minh');

        $date =date("Y-m-d");

                $users = DB::table('users')->get();
                $count = DB::table('users')->where('dayres', $date)->count();
                

                return view('admin.home', ['users'=>$users, 'count'=>$count]);

            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }
public function viewhistory(Request $request){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                
                return view('admin.viewhistory');
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }

    public function viewhistorydetail(Request $request){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                $phone = $request->phone;
                $user_view = DB::table('users')->where('phone', $phone)->first();
                $histories = DB::table('history')->where('ofuser', $phone)->orderBy('id','desc')->get();
                $taking_missions = DB::table('taking_mission')->where('id_user', $user_view->id)->get();

            $arr_mission_done=$arr_mission_pending=$arr_mission_new=$arr_mission_cancel = array();
            foreach($taking_missions as $val){
                $mission = DB::table('missions')->where('id', $val->id_mission)->first();
                if($val->status == 3){
                    array_push( $arr_mission_done, $mission);
                }elseif($val->status == 2){
                    array_push($arr_mission_pending, $mission);
                }elseif($val->status == 1){
                    array_push($arr_mission_cancel, $mission);
                }elseif($val->status == 0){
                    array_push($arr_mission_new, $mission);
                }
            }
           
                return view('admin.historyofuser', ['user_view'=>$user_view,'histories'=>$histories, 'mission_done'=>$arr_mission_done,'mission_cancel'=>$arr_mission_cancel,'mission_new'=>$arr_mission_new,'mission_pending'=>$arr_mission_pending ]);
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }
    
    public function getEditCoin(){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                
                return view('admin.editcoin');
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }
    public function  postEditCoin(Request $request){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                $wallet = DB::table('wallet')->where('ofuser', $request->phone)->first();

                return view('admin.editcoinuser', ['wallet'=>$wallet]);
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }
    

    public function  posteditcoinuser(Request $request){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                $coinadd = $request->coinadd;
                $phone = $request->phone;
                $wallet = DB::table('wallet')->where('ofuser', $phone)->first();
                DB::table('wallet')->where('ofuser', $phone)->update(['coin'=>($wallet->coin + $coinadd)]);
                $wallet = DB::table('wallet')->where('ofuser', $phone)->first();
                return redirect('/admin/editcoin')->with('success', 'Cập nhật thành công');
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }
    
    public function getEditBalance(){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                
                return view('admin.editbalance');
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }

    public function  posteditbalance(Request $request){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                $wallet = DB::table('wallet')->where('ofuser', $request->phone)->first();

                return view('admin.editbalanceuser', ['wallet'=>$wallet]);
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }

    public function  posteditbalanceuser(Request $request){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                $newbalance = $request->newbalance;
                $phone = $request->phone;
                DB::table('wallet')->where('ofuser', $phone)->update(['balance'=>$newbalance]);
                $wallet = DB::table('wallet')->where('ofuser', $phone)->first();
                return view('admin.editbalanceuser', ['wallet'=>$wallet])->with('success', 'Cập nhật thành công');
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }
   

    public function getEditBanner(){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                $banners = DB::table('banner')->get();
                return view('admin.editbanner',['banners'=>$banners]);
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }

    public function postEditBanner(Request $request){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                if($request->hasFile('photos'))
                {
                    $destinationPath = 'resources/image/img_app';
                    DB::table('banner')->truncate();
                    $files = $request->file('photos');
                    foreach ($files as $file) {
                        $file_name = $file->getClientOriginalName(); 
                        $file->move($destinationPath , $file_name); 
                        DB::table('banner')->insert(['name'=>$file_name]);
                    }
                }
                return back()->with('success','Cập nhật ảnh banner thành công');
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }

    public function getHistorySpin(){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                return view('admin.historyspin');
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }

    public function postHistorySpin(Request $request){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                $phone = $request->phone;
                $historyspins = DB::table('spin_history')->where('ofuser', $phone)->orderBy('id', 'desc')->get();
                return view('admin.historyspinofuser', ['historyspins'=> $historyspins]);
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }

    // public function autoduyetnv(){
    //     $nvchuaduyet = DB::table('taking_mission')->where('status', 2)->get();
    //     date_default_timezone_set('Asia/Ho_Chi_Minh');

    //     $min = date("i");
    //     $createhistory = new AccountController();

    //     foreach($nvchuaduyet as $value){
    //         $val_min = date("i",strtotime($value->updated_at));
    //         if(($min - $val_min)>4){
    //             DB::table('taking_mission')->where('id', $value->id)->update(['status'=>3]);
    //             $user_m = DB::table('users')->where('id', $value->id_user)->first();
    //             $mission = DB::table('missions')->where('id', $value->id_mission)->first();
    //             $createhistory->createHistory($user_m->phone, 'Bạn đã được duyệt hoàn thành nhiệm vụ '.$mission->name.' và được cộng '.$mission->price.' vnđ vào tài khoản');
    //             $statistical = DB::table('statistical')->where('ofuser', $user_m->phone)->first();
    //             $wallet = DB::table('wallet')->where('ofuser', $user_m->phone)->first();
    //             DB::table('missions')->where('id',$mission->id)->update(['count'=> $mission->count-1]);
    //             DB::table('wallet')->where('ofuser', $user_m->phone)->update(['balance'=>$wallet->balance+$mission->price]);
    //             DB::table('statistical')->where('ofuser', $user_m->phone)->update([ 'total'=>$statistical->total+$mission->price]);
    //         }
    //     }
    //     return null;
    // }



   
    public function getDuyetVip(){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                $lenhnap = DB::table('deposit')->where('status', 0)->where('type',1)->orderBy('id', 'desc')->get();
                return view('admin.duyetvip',['lenhnap'=>$lenhnap]);
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }

     public function postDuyetVip(Request $request){
        $upvip = DB::table('deposit')->where('id', $request->id)->first();
        $user = DB::table('users')->where('phone', $upvip->ofuser)->first();
        $role = DB::table('role')->where('ofrole', $upvip->role)->first();
        $wallet = DB::table('wallet')->where('ofuser', $upvip->ofuser)->first();
        DB::table('wallet')->where('ofuser', $upvip->ofuser)->update(['coin'=>($wallet->coin+($upvip->amount/1000)),'role'=>$upvip->role]);
        DB::table('deposit')->where('id',$request->id)->update(['status'=>1]);
            $createhistory = new AccountController();

        if($user->role < $upvip->role){
            DB::table('users')->where('phone', $user->phone)->update(['role'=>$upvip->role]);
            $createhistory->createHistory($user->phone, 'Tài khoản được nâng cấp lên '.$role->name);
        }
       
        $createhistory->createHistory($upvip->ofuser, 'Tài khoản được cộng '.number_format(intval($upvip->amount/1000),0,',','.').'coin');

        if($user->referal_ofuser != null){
            $f1 = DB::table('users')->where('phone', $user->referal_ofuser)->first();
            if($f1 != null){
                $statisticalf1 = DB::table('statistical')->where('ofuser', $f1->phone)->first();

                $walletf1 = DB::table('wallet')->where('ofuser', $f1->phone)->first();
                
                DB::table('wallet')->where('ofuser', $f1->phone)->update(['balance'=> $walletf1->balance+intval($upvip->amount*10/100),'coin'=> $walletf1->coin+intval($upvip->amount*10/100000)]);
                DB::table('statistical')->where('ofuser',$f1->phone)->update(['total'=> $statisticalf1->total+intval($upvip->amount*10/100),'total_referal'=> $statisticalf1->total_referal + intval($upvip->amount*10/100)]);
                $createhistory->createHistory($f1->phone, 'Bạn đã nhận được tiền hoa hồng 10% từ '.$user->phone.' : '.number_format(intval($upvip->amount*10/100),0,',','.').'vnđ');
                $createhistory->createHistory($f1->phone, 'Bạn đã nhận được coin hoa hồng 10% từ '.$user->phone.' : '.number_format(intval($upvip->amount*10/100000),0,',','.').'coin');

            }
            if($f1->referal_ofuser != null){
                $f0 = DB::table('users')->where('phone', $f1->referal_ofuser)->first();
                if($f0 != null){
                    $statisticalf0 = DB::table('statistical')->where('ofuser', $f0->phone)->first();
                    $walletf0 = DB::table('wallet')->where('ofuser', $f0->phone)->first();
                    DB::table('wallet')->where('ofuser', $f0->phone)->update(['balance'=> $walletf0->balance+intval($upvip->amount*5/100),'coin'=> $walletf0->coin+intval($upvip->amount*5/100000)]);
                    DB::table('statistical')->where('ofuser',$f0->phone)->update([ 'total'=> $statisticalf0->total+intval($upvip->amount*5/100),'total_referal'=> $statisticalf0->total_referal + intval($upvip->amount*5/100)]);
                    $createhistory->createHistory($f0->phone, 'Bạn đã nhận được tiền hoa hồng 5% từ '.$user->phone.' : '.number_format(intval($upvip->amount*5/100),0,',','.').'vnđ');
                    $createhistory->createHistory($f0->phone, 'Bạn đã nhận được coin hoa hồng 5% từ '.$user->phone.' : '.number_format(intval($upvip->amount*5/100000),0,',','.').'coin');

                }
            }
        }
            return back()->with('success','Duyệt thành công');
        
       
    }

    public function lichsunap(){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                $lenhnap = DB::table('deposit')->orderBy('id', 'desc')->get();
                return view('admin.lichsunap',['lenhnap'=>$lenhnap]);

            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }

    public function lichsurut(){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                $lenhrut = DB::table('withdrawn')->orderBy('id', 'desc')->get();
                return view('admin.lichsurut',['lenhrut'=>$lenhrut]);

            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }

    public function huynap(Request $request){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            $createhistory = new AccountController();

            if($user->role == 99){
                $deposit = DB::table('deposit')->where('id', $request->id)->first();
                if($deposit->type == 0){
                    DB::table('deposit')->where('id', $deposit->id)->update(['status'=> 2]);
                    $createhistory->createHistory($deposit->ofuser, 'Lệnh  nạp '.number_format($deposit->amount,0,',','.').' vnđ bị huỷ');

                }else{
                    $role = DB::table('role')->where('ofrole', $deposit->role)->first();
                    DB::table('deposit')->where('id', $deposit->id)->update(['status'=> 2]);
                    $createhistory->createHistory($deposit->ofuser, 'Lệnh  nâng cấp lên '.$role->name.' bị huỷ');
                }
                return back()->with('success', 'Hủy lệnh nạp thành công');

            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }

    public function getduyetrut(){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                $lenhrut = DB::table('withdrawn')->where('status',0)->orderBy('id', 'asc')->get();
                return view('admin.duyetlenhrut', ['lenhrut'=>$lenhrut]);

            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
        
    }

    public function duyetlenhrut(Request $request){
        $id_rut = $request->id;
        $withdrawn = DB::table('withdrawn')->where('id', $id_rut)->first();
        DB::table('withdrawn')->where('id', $id_rut)->update(['status'=>1]);
        $createhistory = new AccountController();
        $createhistory->createHistory($withdrawn->ofuser, 'Lệnh rút được duyệt');
        return back()->with('success', 'Duyệt thành công');

    }

    public function huylenhrut(Request $request){
        $id_rut = $request->id;
        $withdrawn = DB::table('withdrawn')->where('id', $id_rut)->first();
        $wallet = DB::table('wallet')->where('ofuser', $withdrawn->ofuser)->first();
        DB::table('wallet')->where('ofuser', $withdrawn->ofuser)->update(['balance'=>$wallet->balance + $withdrawn->amount]);
        DB::table('withdrawn')->where('id', $id_rut)->update(['status'=>2]);
        
        $createhistory = new AccountController();
        $createhistory->createHistory($withdrawn->ofuser, 'Lệnh rút đã huỷ, '.$withdrawn->amount.' vnđ đã được hoàn');
        return back()->with('success', 'Huỷ thành công');

    }


   

    public function editflashsale(){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                
                return view('admin.editflashsale');
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }

    }

    public function posteditflashsale(Request $request){
        $flashsale = $request->flashsale;
        DB::table('notice')->where('id',1)->update(['content'=>$flashsale]);
        return back()->with('success', 'Cập nhật thành công');
    }

    public function quanlythanhvien(){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                $users = DB::table('users')->orderBy('id', 'desc')->paginate(10);
                
                return view('admin.quanlythanhvien', ['users'=>$users]);
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }

    public function viewchitiet(Request $request){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                $phone = $request->phone;
                $iduser = DB::table('users')->where('phone', $phone)->value('id');
                return redirect('admin/quanlythanhvien/'.$iduser);
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }

    public function chitietthanhvien(Request $request){
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            if($user->role == 99){
                $id = $request->id;
                $member = DB::table('users')->where('id', $id)->first();
                $role = DB::table('role')->where('ofrole', $member->role)->first();
                $wallet = DB::table('wallet')->where('ofuser', $member->phone)->first();
                $info = DB::table('info_users')->where('ofuser', $member->phone)->first();
                $bank = DB::table('bank')->where('ofuser', $member->phone)->first();
                $count_f = 0;
                $f1 = $f2 = array();
                $f1 = DB::table('users')->where('referal_ofuser', $member->phone)->get();
                foreach($f1 as $val){
                    $f2 = DB::table('users')->where('referal_ofuser', $val->phone)->get();
                    $count_f += count($f2);
                }
                $count_f += count($f1);

              

                return view('admin.chitietthanhvien', ['member'=>$member, 'count_f'=>$count_f, 'wallet'=>$wallet,  'bank'=>$bank, 'info'=>$info, 'role'=>$role]);
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }

    public function editthanhvien(Request $request){
        $phone = $request->phone;
        $balance = $request->balance;
        $coin = $request->coin;
        DB::table('wallet')->where('ofuser', $phone)->update(['balance'=>$balance, 'coin'=>$coin]);
       
        return back()->with('success', 'Cập nhật thành công');
    }

    public function changepass(Request $request){
        $phone = $request->phone;
        $password = $request->input('password');
        $hashed = Hash::make($password);
        DB::table('users')->where('phone', $phone)->update(['password'=>$hashed]);
        return back()->with('success', 'Cập nhật mật khẩu thành công');
    }
}
