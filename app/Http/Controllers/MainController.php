<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Monhoc;

class MainController extends Controller
{
    function index() {//Trang giới thiệu
    	return view('main.index');
    }

    function home() {//Trang ứng dụng chính
    	$monhoc = Monhoc::all();

    	return view('main.home', compact('monhoc'));
    }
}
