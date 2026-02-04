<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function getFormInputPage(){
        return view('form_input',["activeSidebarMain" => "form_input", "bodyClass" => "sidebar_main_open sidebar_main_swipe"]);
    }

    public function getFormCapaianPage(){
        return view('form_capaian',["activeSidebarMain" => "form_capaian", "bodyClass" => "sidebar_main_open sidebar_main_swipe"]);
    }

    public function getFormNkoPage(){
        return view('form_nko',["activeSidebarMain" => "form_nko", "bodyClass" => "sidebar_main_open sidebar_main_swipe"]);
    }
}
