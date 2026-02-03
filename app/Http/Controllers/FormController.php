<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function getFormRegularPage(){
        return view('form_regular',["activeSidebarMain" => "forms_regular", "bodyClass" => "sidebar_main_open sidebar_main_swipe"]);
    }

    public function getFormAdvancePage(){
        return view('form_advanced',["activeSidebarMain" => "forms_advance", "bodyClass" => "sidebar_main_open sidebar_main_swipe"]);
    }

    public function getFormDynamicPage(){
        return view('form_dynamic',["activeSidebarMain" => "forms_dynamic", "bodyClass" => "sidebar_main_open sidebar_main_swipe"]);
    }

    public function getFormFileinputPage(){
        return view('form_file_input',["activeSidebarMain" => "forms_file_input", "bodyClass" => "sidebar_main_open sidebar_main_swipe"]);
    }

    public function getFormFileUploadPage(){
        return view('form_file_upload',["activeSidebarMain" => "forms_file_upload", "bodyClass" => "sidebar_main_open sidebar_main_swipe"]);
    }    
    public function getFormValidationPage(){
        return view('form_validation',["activeSidebarMain" => "forms_validation", "bodyClass" => "sidebar_main_open sidebar_main_swipe"]);
    }

    public function getFormWizardPage(){
        return view('form_wizard',["activeSidebarMain" => "forms_wizard", "bodyClass" => "sidebar_main_open sidebar_main_swipe"]);
    }    
    
    public function getWysiwygCkeditorPage(){
        return view('form_wysiwyg_ckeditor',["activeSidebarMain" => "forms_wysiwyg_ckeditor", "bodyClass" => "sidebar_main_open sidebar_main_swipe"]);
    }    
    
    public function getWysiwygInlinePage(){
        return view('form_wysiwyg_inline',["activeSidebarMain" => "forms_wysiwyg_inline", "bodyClass" => "sidebar_main_open sidebar_main_swipe"]);
    }    
    
    public function getWysiwygTinymcePage(){
        return view('form_wysiwyg_tinymce',["activeSidebarMain" => "forms_wysiwyg_tinymce", "bodyClass" => "sidebar_main_open sidebar_main_swipe"]);
    }
}
