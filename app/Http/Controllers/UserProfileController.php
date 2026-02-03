<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function getPage(){
        return view('page_user_profile',["activeSidebarMain" => "user_profile", "bodyClass" => "sidebar_main_open sidebar_main_swipe"]);
    }

    public function getUserEditPage(){
        return view('page_user_edit',["activeSidebarMain" => "page_user_edit", "bodyClass" => "sidebar_main_open sidebar_main_swipe"]);
    }
}
