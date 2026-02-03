<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function getComponentAccordion(){
        return view('components_accordion',["activeSidebarMain" => "components_accordion", "bodyClass" => "sidebar_main_open sidebar_main_swipe"]);
    }
}
