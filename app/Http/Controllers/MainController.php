<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Monhoc;

class MainController extends Controller
{
    function index() {//Trang giới thiệu

    	//Nếu đã đăng nhập thì chuyển ngay sang giao diện ứng dụng chính
    	if (session('status') === 'true') {
    		return redirect()->action('MainController@home');
    	}
    	return view('main.index');
    }

    function home(Request $request) {//Trang ứng dụng chính
    	$monhoc = Monhoc::all();
    	$sign = false;
    	if ($request->session()->has('user')) {
		    $sign = true;
		}

    	return view('main.home', compact('monhoc'))->with('status', "Okmen");
    }
}
