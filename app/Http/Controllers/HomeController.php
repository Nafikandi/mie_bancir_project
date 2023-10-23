<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;

class HomeController extends Controller
{

    public function index(){

        $mb = menu::with('categories')->where('category_menu', 1)->orderBy('created_at', 'DESC')->limit('6')->get();
        $m = menu::with('categories')->where('category_menu', 2)->orderBy('created_at', 'DESC')->limit('6')->get();
        $mr = menu::with('categories')->where('category_menu', 3)->orderBy('created_at', 'DESC')->limit('6')->get();

        return view('home',compact('mb','m','mr'));
    }


    public function detailmenu($id){

        $menu = menu::findorfail($id);
        return view('menudetail',compact('menu'));
    }
}
