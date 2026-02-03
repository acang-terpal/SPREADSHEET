@extends('layout.master')

@section('head')
 <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no"/>

        <link rel="icon" type="image/png" href="altair/assets/img/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="altair/assets/img/favicon-32x32.png" sizes="32x32">

        <title>Altair Admin v2.7.0</title>


        <!-- uikit -->
        <link rel="stylesheet" href="altair/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

        <!-- flag icons -->
        <link rel="stylesheet" href="altair/assets/icons/flags/flags.min.css" media="all">

        <!-- style switcher -->
        <link rel="stylesheet" href="altair/assets/css/style_switcher.min.css" media="all">

        <!-- altair admin -->
        <link rel="stylesheet" href="altair/assets/css/main.min.css" media="all">

        <!-- themes -->
        <link rel="stylesheet" href="altair/assets/css/themes/themes_combined.min.css" media="all">

        <!-- matchMedia polyfill for testing media queries in JS -->
        <!--[if lte IE 9]>
            <script type="text/javascript" src="altair/bower_components/matchMedia/matchMedia.js"></script>
            <script type="text/javascript" src="altair/bower_components/matchMedia/matchMedia.addListener.js"></script>
            <link rel="stylesheet" href="altair/assets/css/ie.css" media="all">
        <![endif]-->
@endsection

@section("header")
    @include("layout.header")
@endsection

@section('sidebar_main')
    @include('layout.sidebar_main')
@endsection

@section('content')
   <div id="page_content">
            <div id="page_content_inner">

                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_a">Input fields</h3>
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-form-row">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Label</label>
                                            <input type="text" class="md-input" />
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>Label fixed</label>
                                            <input type="text" class="md-input label-fixed" />
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <label>Passsword</label>
                                    <input type="password" class="md-input"  />
                                </div>
                                <div class="uk-form-row">
                                    <label>Disabled</label>
                                    <input type="text" class="md-input" disabled />
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-form-row">
                                    <label>Prefilled</label>
                                    <input type="text" class="md-input" value="Lorem ipsum dolor sit" />
                                </div>
                                <div class="uk-form-row">
                                    <label>Error</label>
                                    <input type="text" class="md-input md-input-danger" value="Something wrong" />
                                </div>
                                <div class="uk-form-row">
                                    <label>Success</label>
                                    <input type="text" class="md-input md-input-success" value="All ok" />
                                </div>
                            </div>
                        </div>
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-large-1-4 uk-width-medium-1-2">
                                <div class="uk-input-group">
                                    <span class="uk-input-group-addon"><input type="checkbox" data-md-icheck/></span>
                                    <label>Checkbox addon</label>
                                    <input type="text" class="md-input" />
                                </div>
                            </div>
                            <div class="uk-width-large-1-4 uk-width-medium-1-2">
                                <div class="uk-input-group">
                                    <label>Button addon</label>
                                    <input type="text" class="md-input" />
                                    <span class="uk-input-group-addon"><a class="md-btn" href="#">Save</a></span>
                                </div>
                            </div>
                            <div class="uk-width-large-1-4 uk-width-medium-1-2">
                                <div class="uk-input-group">
                                    <label>Icon addon</label>
                                    <input type="text" class="md-input" />
                                    <span class="uk-input-group-addon">
                                        <a href="#"><i class="material-icons">&#xE163;</i></a>
                                    </span>
                                </div>
                            </div>
                            <div class="uk-width-large-1-4 uk-width-medium-1-2">
                                <div class="uk-input-group">
                                    <span class="uk-input-group-addon">$</span>
                                    <label>Text addon</label>
                                    <input type="text" class="md-input" />
                                </div>
                            </div>
                        </div>
                        <h3 class="heading_c uk-margin-large-top">Fixed width</h3>
                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <label>uk-form-width-large</label>
                                <input type="text" class="md-input uk-form-width-large" />
                            </div>
                            <div class="uk-width-medium-1-1">
                                <label>uk-form-width-medium</label>
                                <input type="text" class="md-input uk-form-width-medium" />
                            </div>
                            <div class="uk-width-medium-1-1">
                                <label>uk-form-width-small</label>
                                <input type="text" class="md-input uk-form-width-small" />
                            </div>
                            <div class="uk-width-medium-1-1">
                                <label>uk-form-width-mini</label>
                                <input type="text" class="md-input uk-form-width-mini" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <h3 class="heading_a uk-margin-medium-bottom">Textareas (auto resize)</h3>
                                <div class="uk-form-row">
                                    <label>Textarea</label>
                                    <textarea cols="30" rows="4" class="md-input">Ad voluptatum enim saepe sequi laboriosam delectus quos quas doloremque omnis labore est et blanditiis tenetur fugiat harum soluta nesciunt ipsum reprehenderit optio.</textarea>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <h3 class="heading_a uk-margin-medium-bottom">Textareas (no auto resize)</h3>
                                <div class="uk-form-row">
                                    <label>Textarea</label>
                                    <textarea cols="30" rows="4" class="md-input no_autosize">Quidem aut non pariatur sint nam aut soluta veniam aut voluptas et dolor est voluptatem quidem deleniti sunt ut facilis qui accusamus nihil necessitatibus officia officia repellendus corporis dolorem et sint non et et et sed.</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_a">Select</h3>
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-3">
                                <select id="select_demo_1" class="md-input">
                                    <option value="" disabled selected hidden>Select...</option>
                                    <optgroup label="Group 1">
                                        <option value="a">Item A</option>
                                        <option value="b">Item B</option>
                                        <option value="c">Item C</option>
                                    </optgroup>
                                    <optgroup label="Group 2">
                                        <option value="a">Item A</option>
                                        <option value="b">Item B</option>
                                        <option value="c">Item C</option>
                                        <option value="d">Item D</option>
                                    </optgroup>
                                </select>
                                <span class="uk-form-help-block">Default</span>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <select id="select_demo_2" class="md-input" data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                    <option value="" disabled selected hidden>Select...</option>
                                    <option value="a">Item A</option>
                                    <option value="b">Item B</option>
                                    <option value="c">Item C</option>
                                </select>
                                <span class="uk-form-help-block">With tooltips</span>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <select id="select_demo_3" class="md-input" disabled>
                                    <option value="" disabled selected hidden>Select...</option>
                                    <option value="a">Item A</option>
                                    <option value="b">Item B</option>
                                    <option value="c">Item C</option>
                                </select>
                                <span class="uk-form-help-block">Disabled</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_a">Select (selectize.js)</h3>
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-3">
                                <select id="select_demo_4" data-md-selectize>
                                    <option value="">Select...</option>
                                    <optgroup label="Group 1">
                                        <option value="a">Item A</option>
                                        <option value="b">Item B</option>
                                        <option value="c">Item C</option>
                                    </optgroup>
                                    <optgroup label="Group 2">
                                        <option value="a">Item A</option>
                                        <option value="b">Item B</option>
                                        <option value="c">Item C</option>
                                        <option value="d">Item D</option>
                                    </optgroup>
                                </select>
                                <span class="uk-form-help-block">Default</span>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <select id="select_demo_5" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                    <option value="">Select...</option>
                                    <option value="a">Item A</option>
                                    <option value="b">Item B</option>
                                    <option value="c">Item C</option>
                                </select>
                                <span class="uk-form-help-block">With tooltips</span>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <select id="select_demo_6" data-md-selectize disabled>
                                    <option value="">Select...</option>
                                    <option value="a">Item A</option>
                                    <option value="b">Item B</option>
                                    <option value="c">Item C</option>
                                </select>
                                <span class="uk-form-help-block">Disabled</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_a">Switches</h3>
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-3">
                                <input type="checkbox" data-switchery checked id="switch_demo_1" />
                                <label for="switch_demo_1" class="inline-label">Service offline</label>
                                <span class="uk-form-help-block">Checked</span>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <input type="checkbox" data-switchery id="switch_demo_2" />
                                <label for="switch_demo_2" class="inline-label">Show Email</label>
                                <span class="uk-form-help-block">Unchecked</span>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <input type="checkbox" data-switchery disabled />
                                <span class="uk-form-help-block">Disabled</span>
                            </div>
                        </div>
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-3">
                                <input type="checkbox" data-switchery data-switchery-size="large" checked id="switch_demo_large" />
                                <label for="switch_demo_large" class="inline-label">Label</label>
                                <span class="uk-form-help-block">Large</span>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <input type="checkbox" data-switchery data-switchery-size="small" id="switch_demo_small" />
                                <label for="switch_demo_small" class="inline-label">Label</label>
                                <span class="uk-form-help-block">Small</span>
                            </div>
                        </div>
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-4">
                                <input type="checkbox" data-switchery data-switchery-color="#1e88e5" checked id="switch_demo_primary" />
                                <label for="switch_demo_primary" class="inline-label">Label</label>
                            </div>
                            <div class="uk-width-medium-1-4">
                                <input type="checkbox" data-switchery data-switchery-color="#d32f2f" checked id="switch_demo_danger" />
                                <label for="switch_demo_danger" class="inline-label">Label</label>
                            </div>
                            <div class="uk-width-medium-1-4">
                                <input type="checkbox" data-switchery data-switchery-color="#ffb300" checked id="switch_demo_warning" />
                                <label for="switch_demo_warning" class="inline-label">Label</label>
                            </div>
                            <div class="uk-width-medium-1-4">
                                <input type="checkbox" data-switchery data-switchery-color="#7cb342" checked id="switch_demo_success" />
                                <label for="switch_demo_success" class="inline-label">Label</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-2">
                        <div class="md-card">
                            <div class="md-card-content">
                                <h3 class="heading_a">Radio Buttons</h3>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-2-5">
                                        <p>
                                            <input type="radio" name="radio_demo" id="radio_demo_1" data-md-icheck />
                                            <label for="radio_demo_1" class="inline-label">Mercury</label>
                                        </p>
                                        <p>
                                            <input type="radio" name="radio_demo" id="radio_demo_2" data-md-icheck />
                                            <label for="radio_demo_2" class="inline-label">Venus</label>
                                        </p>
                                        <p>
                                            <input type="radio" name="radio_demo" id="radio_demo_3" data-md-icheck disabled />
                                            <label for="radio_demo_3" class="inline-label">Earth</label>
                                        </p>
                                        <p>
                                            <input type="radio" name="radio_demo" id="radio_demo_4" data-md-icheck checked />
                                            <label for="radio_demo_4" class="inline-label">Mars</label>
                                        </p>
                                    </div>
                                    <div class="uk-width-medium-3-5">
                                        <span class="icheck-inline">
                                            <input type="radio" name="radio_demo_inline" id="radio_demo_inline_1" data-md-icheck />
                                            <label for="radio_demo_inline_1" class="inline-label">Mercury</label>
                                        </span>
                                        <span class="icheck-inline">
                                            <input type="radio" name="radio_demo_inline" id="radio_demo_inline_2" data-md-icheck />
                                            <label for="radio_demo_inline_2" class="inline-label">Venus</label>
                                        </span>
                                        <span class="icheck-inline">
                                            <input type="radio" name="radio_demo_inline" id="radio_demo_inline_3" data-md-icheck />
                                            <label for="radio_demo_inline_3" class="inline-label">Earth</label>
                                        </span>
                                        <span class="uk-form-help-block">Inline</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div class="md-card">
                            <div class="md-card-content">
                                <h3 class="heading_a">Checkboxes</h3>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-2-5">
                                        <p>
                                            <input type="checkbox" name="checkbox_demo_mercury" id="checkbox_demo_1" data-md-icheck />
                                            <label for="checkbox_demo_1" class="inline-label">Mercury</label>
                                        </p>
                                        <p>
                                            <input type="checkbox" name="checkbox_demo_venus" id="checkbox_demo_2" data-md-icheck />
                                            <label for="checkbox_demo_2" class="inline-label">Venus</label>
                                        </p>
                                        <p>
                                            <input type="checkbox" name="checkbox_demo_earth" id="checkbox_demo_3" data-md-icheck disabled />
                                            <label for="checkbox_demo_3" class="inline-label">Earth</label>
                                        </p>
                                        <p>
                                            <input type="checkbox" name="checkbox_demo_mars" id="checkbox_demo_4" data-md-icheck checked />
                                            <label for="checkbox_demo_4" class="inline-label">Mars</label>
                                        </p>
                                    </div>
                                    <div class="uk-width-medium-3-5">
                                        <span class="icheck-inline">
                                            <input type="checkbox" name="checkbox_demo_inline_mercury" id="checkbox_demo_inline_1" data-md-icheck />
                                            <label for="checkbox_demo_inline_1" class="inline-label">Mercury</label>
                                        </span>
                                        <span class="icheck-inline">
                                            <input type="checkbox" name="checkbox_demo_inline_venus" id="checkbox_demo_inline_2" data-md-icheck />
                                            <label for="checkbox_demo_inline_2" class="inline-label">Venus</label>
                                        </span>
                                        <span class="icheck-inline">
                                            <input type="checkbox" name="checkbox_demo_inline_earth" id="checkbox_demo_inline_3" data-md-icheck />
                                            <label for="checkbox_demo_inline_3" class="inline-label">Earth</label>
                                        </span>
                                        <span class="uk-form-help-block">Inline</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

@endsection

@section('sidebar_secondary')
    @include('layout.sidebar_secondary')
@endsection

@section('script_bottom')
    <!-- google web fonts -->
        <script>
            WebFontConfig = {
                google: {
                    families: [
                        'Source+Code+Pro:400,700:latin',
                        'Roboto:400,300,500,700,400italic:latin'
                    ]
                }
            };
            (function () {
                var wf = document.createElement('script');
                wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                        '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
                wf.type = 'text/javascript';
                wf.async = 'true';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(wf, s);
            })();
        </script>

        <!-- common functions -->
        <script src="altair/assets/js/common.min.js"></script>
        <!-- uikit functions -->
        <script src="altair/assets/js/uikit_custom.min.js"></script>
        <!-- altair common functions/helpers -->
        <script src="altair/assets/js/altair_admin_common.min.js"></script>


        <script>
            $(function () {
                if (isHighDensity) {
                    // enable hires images
                    altair_helpers.retina_images();
                }
                if (Modernizr.touch) {
                    // fastClick (touch devices)
                    FastClick.attach(document.body);
                }
            });
            $window.load(function () {
                // ie fixes
                altair_helpers.ie_fix();
            });
        </script>
@endsection

@section('style_switcher')
    <div id="style_switcher">
        <div id="style_switcher_toggle"><i class="material-icons">&#xE8B8;</i></div>
        <div class="uk-margin-medium-bottom">
            <h4 class="heading_c uk-margin-bottom">Colors</h4>
            <ul class="switcher_app_themes" id="theme_switcher">
                <li class="app_style_default active_theme" data-app-theme="">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_a" data-app-theme="app_theme_a">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_b" data-app-theme="app_theme_b">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_c" data-app-theme="app_theme_c">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_d" data-app-theme="app_theme_d">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_e" data-app-theme="app_theme_e">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_f" data-app-theme="app_theme_f">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_g" data-app-theme="app_theme_g">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_h" data-app-theme="app_theme_h">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_i" data-app-theme="app_theme_i">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_dark" data-app-theme="app_theme_dark">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
            </ul>
        </div>
        <div class="uk-visible-large uk-margin-medium-bottom">
            <h4 class="heading_c">Sidebar</h4>
            <p>
                <input type="checkbox" name="style_sidebar_mini" id="style_sidebar_mini" data-md-icheck />
                <label for="style_sidebar_mini" class="inline-label">Mini Sidebar</label>
            </p>
            <p>
                <input type="checkbox" name="style_sidebar_slim" id="style_sidebar_slim" data-md-icheck />
                <label for="style_sidebar_slim" class="inline-label">Slim Sidebar</label>
            </p>
        </div>
        <div class="uk-visible-large uk-margin-medium-bottom">
            <h4 class="heading_c">Layout</h4>
            <p>
                <input type="checkbox" name="style_layout_boxed" id="style_layout_boxed" data-md-icheck />
                <label for="style_layout_boxed" class="inline-label">Boxed layout</label>
            </p>
        </div>
        <div class="uk-visible-large">
            <h4 class="heading_c">Main menu accordion</h4>
            <p>
                <input type="checkbox" name="accordion_mode_main_menu" id="accordion_mode_main_menu" data-md-icheck />
                <label for="accordion_mode_main_menu" class="inline-label">Accordion mode</label>
            </p>
        </div>
    </div>

    <script>
        $(function() {
            var $switcher = $('#style_switcher'),
                $switcher_toggle = $('#style_switcher_toggle'),
                $theme_switcher = $('#theme_switcher'),
                $mini_sidebar_toggle = $('#style_sidebar_mini'),
                $slim_sidebar_toggle = $('#style_sidebar_slim'),
                $boxed_layout_toggle = $('#style_layout_boxed'),
                $accordion_mode_toggle = $('#accordion_mode_main_menu'),
                $html = $('html'),
                $body = $('body');


            $switcher_toggle.click(function(e) {
                e.preventDefault();
                $switcher.toggleClass('switcher_active');
            });

            $theme_switcher.children('li').click(function(e) {
                e.preventDefault();
                var $this = $(this),
                    this_theme = $this.attr('data-app-theme');

                $theme_switcher.children('li').removeClass('active_theme');
                $(this).addClass('active_theme');
                $html
                    .removeClass(
                        'app_theme_a app_theme_b app_theme_c app_theme_d app_theme_e app_theme_f app_theme_g app_theme_h app_theme_i app_theme_dark'
                        )
                    .addClass(this_theme);

                if (this_theme == '') {
                    localStorage.removeItem('altair_theme');
                } else {
                    localStorage.setItem("altair_theme", this_theme);
                    if (this_theme == 'app_theme_dark') {
                        $('#kendoCSS').attr('href',
                            'altair/bower_components/kendo-ui/styles/kendo.materialblack.min.css')
                    }
                }

            });

            // hide style switcher
            $document.on('click keyup', function(e) {
                if ($switcher.hasClass('switcher_active')) {
                    if (
                        (!$(e.target).closest($switcher).length) ||
                        (e.keyCode == 27)
                    ) {
                        $switcher.removeClass('switcher_active');
                    }
                }
            });

            // get theme from local storage
            if (localStorage.getItem("altair_theme") !== null) {
                $theme_switcher.children('li[data-app-theme=' + localStorage.getItem("altair_theme") + ']').click();
            }


            // toggle mini sidebar

            // change input's state to checked if mini sidebar is active
            if ((localStorage.getItem("altair_sidebar_mini") !== null && localStorage.getItem(
                    "altair_sidebar_mini") == '1') || $body.hasClass('sidebar_mini')) {
                $mini_sidebar_toggle.iCheck('check');
            }

            $mini_sidebar_toggle
                .on('ifChecked', function(event) {
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_sidebar_mini", '1');
                    localStorage.removeItem('altair_sidebar_slim');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event) {
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_sidebar_mini');
                    location.reload(true);
                });

            // toggle slim sidebar

            // change input's state to checked if mini sidebar is active
            if ((localStorage.getItem("altair_sidebar_slim") !== null && localStorage.getItem(
                    "altair_sidebar_slim") == '1') || $body.hasClass('sidebar_slim')) {
                $slim_sidebar_toggle.iCheck('check');
            }

            $slim_sidebar_toggle
                .on('ifChecked', function(event) {
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_sidebar_slim", '1');
                    localStorage.removeItem('altair_sidebar_mini');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event) {
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_sidebar_slim');
                    location.reload(true);
                });

            // toggle boxed layout

            if ((localStorage.getItem("altair_layout") !== null && localStorage.getItem("altair_layout") ==
                'boxed') || $body.hasClass('boxed_layout')) {
                $boxed_layout_toggle.iCheck('check');
                $body.addClass('boxed_layout');
                $(window).resize();
            }

            $boxed_layout_toggle
                .on('ifChecked', function(event) {
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_layout", 'boxed');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event) {
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_layout');
                    location.reload(true);
                });

            // main menu accordion mode
            if ($sidebar_main.hasClass('accordion_mode')) {
                $accordion_mode_toggle.iCheck('check');
            }

            $accordion_mode_toggle
                .on('ifChecked', function() {
                    $sidebar_main.addClass('accordion_mode');
                })
                .on('ifUnchecked', function() {
                    $sidebar_main.removeClass('accordion_mode');
                });


        });
    </script>
@endsection
