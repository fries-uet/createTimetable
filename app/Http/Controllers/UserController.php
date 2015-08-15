<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;

use App\Nguoidung;
use App\Input;
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

        $monhoc = DB::table('monhoc')->get();//Danh sách môn học
        foreach ($monhoc as $mh) {
            $id_md = $mh->id;

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
    	$emailSession = session('email');
    	$email        = $request->input('email');
    	$name         = $request->input('name');
    	$passCurrent  = $request->input('pass-current');
    	$passNew      = $request->input('pass-new');
    	$repassNew    = $request->input('repass-new');

    	$user = DB::table('nguoidung')
		->where('email', $email)
		->first();
    }



    function input(Request $request) {
        if (!$this->checkSignin($request)) {
            return $this->redirectHome();
        }

        $input = Input::all();
        foreach ($input as $i) {

            //Buổi
            $nhom = $this->cvtNhom($i->ghiChu);
            $viTri = $this->cvtViTri($i->thu, $i->tiet)[0];
            $soTiet = $this->cvtViTri($i->thu, $i->tiet)[1];
            $giangDuong = $i->giangDuong;
            $giangVien = $i->giangVien;

            $id_buoi = DB::table('buoihoc')
                ->insertGetId([
                    'nhom' => $nhom,
                    'viTri' => $viTri,
                    'soTiet' => $soTiet,
                    'giangDuong' => $giangDuong,
                    'giaoVien' => $giangVien
                ]);

            //Lớp MH
            $maLMH = $i->maLMH;

            if (!$this->isAvailableLMH($maLMH)) {//Chua co lop MH
                $id_lmh = DB::table('lopmh')
                    ->insertGetId([
                        'buoihocs' => "[$id_buoi]",
                        'maLMH' => $maLMH
                    ]);

                //Môn học
                $maMH = $i->maMH;
                $tenMH = $i->monhoc;
                $soTin = $i->soTin;

                if (!$this->isAvailableMH($maMH)) {
                    $id_mh = DB::table('monhoc')
                        ->insertGetId([
                            'lopMHs' => "[$id_lmh]",
                            'tenMH' => $tenMH,
                            'maMH' => $maMH,
                            'soTin' => $soTin
                        ]);
                } else {
                    $lopMHs = DB::table('monhoc')
                        ->where('maMH', $maMH)
                        ->value('lopMHs');

                    $lopMHs = json_decode($lopMHs);
                    array_push($lopMHs, $id_lmh);

                    DB::table('monhoc')
                        ->where('maMH', $maMH)
                        ->update([
                            'lopMHs' => json_encode($lopMHs)
                        ]);
                }


            } else {
                $buoihocs = DB::table('lopmh')
                    ->where('maLMH', $maLMH)
                    ->value('buoihocs');
                $buoihocs = json_decode($buoihocs);

                array_push($buoihocs, $id_buoi);

                DB::table('lopmh')
                    ->where('maLMH', $maLMH)
                    ->update(['buoihocs' => json_encode($buoihocs)]);
            }
        }
        return view('usercp.input');
    }

    function isAvailableLMH($maLMH) {
        $lopMH = DB::table('lopmh')
            ->where('maLMH', $maLMH)
            ->count();

        if ($lopMH > 0) {
            return true;
        }

        return false;
    }

    function isAvailableMH($maMH) {
        $monhoc = DB::table('monhoc')
            ->where('maMH', $maMH)
            ->count();

        if ($monhoc > 0) {
            return true;
        }

        return false;
    }

    function cvtNhom($ghichu) {
        switch ($ghichu) {
            case 'N1': return 1;
            case 'N2': return 2;
            case 'N3': return 3;
            default: return 0;
        }
    }

    function cvtViTri($thu, $tiet) {
        $arr = explode('-', $tiet);
        $tietStart = intval($arr[0]);
        $tietEnd = intval($arr[1]);

        $thu = intval($thu);

        $viTri = ($thu - 2) * 10 + $tietStart;
        $soTiet = $tietEnd - $tietStart + 1;
        return [$viTri, $soTiet];
    }
}
