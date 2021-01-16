<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function (){
//     return view('baotri');
// });
Route::get('/checkzalo', function(){
    return view('checkzalo');
});
Route::get('/manager-ref', [HomeController::class, 'getManagerRef']);

Route::get('/', [HomeController::class, 'getHome']);

Route::get('/getdetail', [HomeController::class, 'getDetail']);

Route::get('/robot', [HomeController::class , 'robot']);

Route::get('/my-account', [AccountController::class, 'getMyAccount']);

Route::get('/login', [AccountController::class, 'getLogin']);

Route::post('/login', [AccountController::class, 'postLogin']);

Route::get('/change-password', [AccountController::class, 'getChangePassword']);

Route::post('/change-password', [AccountController::class, 'postChangePassword']);


Route::get('/register', [AccountController::class, 'getRegister']);

Route::get('/register/{codeinvite}', [AccountController::class, 'getRegister']);

Route::post('/register', [AccountController::class, 'postRegister']);

Route::post('/register/{codeinvite}', [AccountController::class, 'postRegister']);

Route::get('/logout', [AccountController::class, 'logout']);

Route::get('/my-referal', [AccountController::class, 'getReferal']);

Route::get('/upgrate', [AccountController::class, 'getUpgrate']);

Route::get('/history', [AccountController::class, 'getHistory']);

Route::get('/earn-money', [HomeController::class, 'getEarnMoney']);

Route::get('/helpcenter', [HomeController::class, 'getHelpCenter']);

Route::get('/introduce', [HomeController::class, 'getIntroduce']);

Route::get('/my-info', [AccountController::class, 'getInfo']);

Route::post('/post-editinfo', [AccountController::class, 'postEditInfo']);

Route::get('/upgrate-role/{idrole}', [AccountController::class, 'postUpgrateRole']);

Route::get('/mission-detail/{idmission}', [HomeController::class, 'getMissionDetail']);

Route::get('/take-mission/{idmission}',[HomeController::class, 'takeMission']);

Route::post('/uploadimgmission', [HomeController::class, 'uploadImgMission']);

Route::post('/done-video', [HomeController::class, 'doneVideo']);

Route::post('/up-avatar', [AccountController::class,'postAvatar']);

Route::post('/up-status', [AccountController::class,'postStatus']);

Route::post('/up-nickname', [AccountController::class,'postNickname']);

Route::get('/buycoin', [HomeController::class,'getBuyCoin']);

Route::get('/rank', [HomeController::class,'getRank']);

// Route::get('/getJson', [HomeController::class, 'settingJsonSpin']);

// Route::get('/spin', [HomeController::class,'getSpin']);

// Route::get('/buy-spin', [HomeController::class,'getBuySpin']);

// Route::post('/buy-spin', [HomeController::class,'postBuySpin']);

// Route::get('/postspin', [HomeController::class, 'postSpin']);

// Route::get('/spin-history', [HomeController::class, 'getSpinHistory']);

// Route::get('/recei-spin/{id}', [HomeController::class, 'receiSpin']);

Route::get('/get-gift', [HomeController::class, 'getnhanqua']);

Route::get('/nhanqua', [HomeController::class, 'nhanqua']);

Route::get('/nhanthuong', [HomeController::class, 'postNhanqua']);


Route::get('/contact', [HomeController::class, 'getContact']);

// Route::get('/manager-info', [AccountController::class, 'getMangerInfo']);

Route::get('/bank-info', [AccountController::class, 'getBankInfo']);

Route::post('/bank-info', [AccountController::class, 'postBankInfo']);

// Route::get('/deposit', [AccountController::class, 'getDeposit']);

// Route::post('/deposit', [AccountController::class, 'postDeposit']);

Route::get('/deposit/{id}', [AccountController::class, 'getDepositUpgrate']);

Route::post('/deposit/{id}', [AccountController::class, 'postDepositUpgrate']);

Route::get('/withdrawn', [AccountController::class, 'getWithdrawn']);

Route::post('/withdrawn', [AccountController::class, 'postWithdrawn']);

Route::get('/withdrawn-history', [AccountController::class, 'lichsurut']);

Route::get('/depwith-history', [AccountController::class, 'depwith_history']);

Route::get('/transfer', [AccountController::class, 'getTransfer']);

Route::post('/transfer', [AccountController::class, 'postTransfer']);

Route::get('/shopping', [HomeController::class, 'getshopping']);




//admin
Route::get('/admin',[AdminController::class, 'getHomeAdmin']);

Route::get('/admin/editbanner',[AdminController::class, 'getEditBanner']);

Route::post('/admin/editbanner',[AdminController::class, 'postEditBanner']);

Route::get('/admin/history-spin',[AdminController::class, 'getHistorySpin']);

Route::post('/admin/history-spinofuser',[AdminController::class, 'postHistorySpin']);

Route::get('/admin/duyetlenhnap', [AdminController::class, 'getDuyetNap']);

Route::get('/admin/duyetlenhnap/{id}', [AdminController::class, 'duyetlenhnap']);

Route::get('/admin/create-mission', [AdminController::class, 'getCreateMission']);

Route::post('/admin/create-mission', [AdminController::class, 'postCreateMission']);

Route::get('/admin/duyetvip', [AdminController::class, 'getDuyetVip']);

Route::get('/admin/duyetvip/{id}', [AdminController::class, 'postDuyetVip']);

Route::get('/admin/huynap/{id}', [AdminController::class, 'huynap']);

Route::get('/admin/lichsunap', [AdminController::class, 'lichsunap']);

Route::get('/admin/lichsurut', [AdminController::class, 'lichsurut']);

Route::get('/admin/duyetlenhrut', [AdminController::class, 'getduyetrut']);

Route::get('/admin/duyetlenhrut/{id}', [AdminController::class, 'duyetlenhrut']);

Route::get('/admin/huylenhrut/{id}', [AdminController::class, 'huylenhrut']);

Route::get('/admin/quanlythanhvien', [AdminController::class, 'quanlythanhvien']);

Route::post('/admin/viewchitiet', [AdminController::class, 'viewchitiet']);

Route::get('/admin/quanlythanhvien/{id}', [AdminController::class, 'chitietthanhvien']);

Route::post('/admin/quanlythanhvien/changepass', [AdminController::class, 'changepass']);

Route::post('/admin/quanlythanhvien/{id}', [AdminController::class, 'editthanhvien']);

Route::get('/admin/editbalance', [AdminController::class, 'getEditBalance']);

Route::post('/admin/editbalance', [AdminController::class, 'posteditbalance']);

Route::post('/admin/editbalanceuser', [AdminController::class, 'posteditbalanceuser']);

Route::get('/admin/editcoin', [AdminController::class, 'getEditCoin']);

Route::post('/admin/editcoin', [AdminController::class, 'postEditcoin']);

Route::get('/admin/editcoinuser', [AdminController::class, 'geteditcoinuser']);

Route::post('/admin/editcoinuser', [AdminController::class, 'posteditcoinuser']);

Route::get('/admin/editflashsale', [AdminController::class, 'editflashsale']);

Route::post('/admin/editflashsale', [AdminController::class, 'posteditflashsale']);

Route::get('/admin/viewhistory', [AdminController::class, 'viewhistory']);

Route::post('/admin/viewhistory', [AdminController::class, 'viewhistorydetail']);

















