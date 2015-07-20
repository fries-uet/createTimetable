<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;

use App\Nguoidung;
use DB;

class UserController extends Controller
{
	function redirectHome() {
    	return redirect()->action('MainController@index');
    }

    function checkSignin(Request $request) {
    	if ($request->session()->get('status') === 'true')
    		return true;

    	return false;
    }


    //Đăng ký tài khoản
    function signup(Request $request) {
    	try {
    		$email = $request->input('email');
	    	$pass = $request->input('pass');
	    	$repass = $request->input('repass');

	    	$status = 200;
	    	$mess = [];
	    	
	    	if ($pass == $repass) {
	    		//Kiểm tra xem đã tồn tại người dùng này chưa? (email)
		    	$countEmail = DB::table('nguoidung')
		    		->where('email', $email)
		    		->count();

		    	if ($countEmail > 0) {
		    		$mess = ["result" => false, "notify" => "Tài khoản này đã có người dùng!"];
		    	} else {
		    		//Thêm tài khoản mới
		    		Nguoidung::create([
			    		'email' => $email,
			    		'pass' => md5($pass)
			    	]);
			    	$mess = ["result" => true, "notify" => "Đăng ký thành công!"];
			    }
	    	} else {
	    		//Mật khẩu không trùng hợp
	    		$mess = ["result" => false, "notify" => "Mật khẩu không trùng khớp"];
	    	}
    	} catch (Exception $e) {
    		$status = 400;
    	} finally {
    		return Response::json($mess, $status);
    	}
    }

    //Đăng nhập
    function signin(Request $request) {
    	try {
    		$email = $request->input('email');
	    	$pass = $request->input('pass');

	    	$status = 200;
	    	$mess = [];

    		//Kiểm tra xem đã tồn tại người dùng này chưa? (email)
	    	$countEmail = DB::table('nguoidung')
	    		->where('email', $email)
	    		->count();

	    	if ($countEmail == 0) {
	    		$mess = ["result" => false, "notify" => "Không tồn tại người dùng này!"];
	    	} else {//Có tồn tại tài khoản này
	    		$user = DB::table('nguoidung')
	    		->where('email', $email)
	    		->first();
	    		
	    		$passTrue = $user->pass;

	    		if (md5($pass) != $passTrue) {
	    			$mess = ["result" => false, "notify" => "Mật khẩu không đúng!"];
	    		} else {
	    			$mess = ["result" => true, "notify" => "Đăng nhập thành công!"];

	    			//Tạo session
	    			session(['status' => 'true']);

	    			$name = $user->name;
	    			if (isset($name) && $name != "") {
	    				$username = $name;
	    			} else {
	    				$username = "UETer";
	    			}
	    			session(['username' => $username]);
	    			session(['email' => $email]);
	    		}
		    }
    	} catch (Exception $e) {
    		$status = 400;
    	} finally {
    		return Response::json($mess, $status);
    	}
    }

    //Đăng xuất
    function signout(Request $request) {
    	session(['status' => 'false']);
    	return $this->redirectHome();
    }

    //Bảng điều khiển người dùng
    function dashboard(Request $request) {
    	if (!$this->checkSignin($request)) {
    		return $this->redirectHome();
    	}

    	return view('usercp.dashboard');
    }

    //Danh sách thời khóa biểu
    function timetable(Request $request) {
    	if (!$this->checkSignin($request)) {
    		return $this->redirectHome();
    	}

    	return view('usercp.timetable');
    }

    //Cập nhật người dùng
    function setting(Request $request) {
    	if (!$this->checkSignin($request)) {
    		return $this->redirectHome();
    	}

    	$email = session('email');

    	$user = DB::table('nguoidung')
		->where('email', $email)
		->first();

		$notify = ['result' => null, 'mess' => null];
    	return view('usercp.setting')->with('setting', [$user, $notify]);
    }

    function updateSetting(Request $request) {
    	$email = session('email');
    	$name = $request->input('name');

    	$passCurrent = $request->input('pass-current');
    	$passNew = $request->input('pass-new');
    	$repassNew = $request->input('repass-new');

    	dd($repassNew);
    }
}
