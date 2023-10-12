<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
   
    public function index(){
        // return Menu::all();
        return view('welcome', [
            'menus' => Menu::where('status', "1")->orderBy('urutan', 'ASC')->get(),
            'setting' => Setting::find(1)
        ]);
    }

    public function test(){
        return view('testing');
    }
}
