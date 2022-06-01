<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ExtraController extends Controller
{
    public function ChangeLanguage($lang){
        Session::get('lang');
        Session()->forget('lang');
        if ($lang == 'en'){
            Session()->put('lang', 'hun');
        }else{
            Session()->put('lang', 'en');
        }

        return Redirect()->back();
    }
}
