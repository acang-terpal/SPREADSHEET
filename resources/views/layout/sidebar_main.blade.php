@section("sidebar_main")
<!-- main sidebar -->
<aside id="sidebar_main">

    @if($activeSidebarMain !='layout_top_menu' && $activeSidebarMain !='layout_header_full')
        <div class="sidebar_main_header">
            <div class="sidebar_logo">
                <a href="index" class="sSidebar_hide sidebar_logo_large">
                    <img class="logo_regular" src="altair/assets/img/logo_main.png" alt="" height="15" width="71"/>
                    <img class="logo_light" src="altair/assets/img/logo_main_white.png" alt="" height="15" width="71"/>
                </a>
                <a href="index" class="sSidebar_show sidebar_logo_small">
                    <img class="logo_regular" src="altair/assets/img/logo_main_small.png" alt="" height="32" width="32"/>
                    <img class="logo_light" src="altair/assets/img/logo_main_small_light.png" alt="" height="32" width="32"/>
                </a>
            </div>
            <div class="sidebar_actions">
                <select id="lang_switcher" name="lang_switcher">
                    <option value="gb" selected>English</option>
                </select>
            </div>
        </div>
    @endif

    <div class="menu_section">
        <ul>
            <li title="Dashboard" class="{{ $activeSidebarMain == "dashboard" ? "current_section" : ""}}" >
                <a href="index">
                    <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                    <span class="menu_title">Dashboard</span>
                </a>
            </li>
            <li title="SpreedSheet" class="{{ $activeSidebarMain == "spreedsheet" ? "current_section" : ""}}" >
                <a href="spreedsheet">
                    <span class="menu_icon"><i class="material-icons">&#xE158;</i></span>
                    <span class="menu_title">SpreedSheet</span>
                </a>
            </li>
            <li title="Laporan Capaian">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE8D2;</i></span>
                    <span class="menu_title">Laporan Capaian</span>
                </a>
                <ul>
                    <li class="{{ $activeSidebarMain == "form_input" ? "act_item" : ""}}"><a href="form_input">Input</a></li>
                    <li class="{{ $activeSidebarMain == "form_capaian" ? "act_item" : ""}}"><a href="form_capaian">Capaian</a></li>
                    <li class="{{ $activeSidebarMain == "form_nko" ? "act_item" : ""}}"><a href="form_nko">NKO</a></li>
                    {{-- <li class="{{ $activeSidebarMain == "forms_file_input" ? "act_item" : ""}}"><a href="forms_file_input">File Input</a></li>
                    <li class="{{ $activeSidebarMain == "forms_file_upload" ? "act_item" : ""}}"><a href="forms_file_upload">File Upload</a></li>
                    <li class="{{ $activeSidebarMain == "forms_validation" ? "act_item" : ""}}"><a href="forms_validation">Validation</a></li>
                    <li class="{{ $activeSidebarMain == "forms_wizard" ? "act_item" : ""}}"><a href="forms_wizard">Wizard</a></li> --}}
                    <li class="menu_subtitle">Manager Menu</li>
                    <li class="{{ $activeSidebarMain == "forms_wysiwyg_ckeditor" ? "act_item" : ""}}"><a href="forms_wysiwyg_ckeditor">Input</a></li>
                    <li class="{{ $activeSidebarMain == "forms_wysiwyg_inline" ? "act_item" : ""}}"><a href="forms_wysiwyg_inline">Capaian</a></li>
                    <li class="{{ $activeSidebarMain == "forms_wysiwyg_tinymce" ? "act_item" : ""}}"><a href="forms_wysiwyg_tinymce">NKO</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside><!-- main sidebar end -->
@endsection
