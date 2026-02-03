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

@section('header')
    @include('layout.header')
@endsection

@section('sidebar_main')
    @include('layout.sidebar_main')
@endsection

@section('content')
<div id="page_content">
        <div id="page_content_inner">
            <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
                <div class="uk-width-large-7-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_menu" data-uk-dropdown="{pos:'left-top'}">
                                <i class="md-icon material-icons md-icon-light">&#xE5D4;</i>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav">
                                        <li><a href="#">Action 1</a></li>
                                        <li><a href="#">Action 2</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="user_heading_avatar">
                                <div class="thumbnail">
                                    <img src="altair/assets/img/avatars/avatar_11.png" alt="user avatar"/>
                                </div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate">Nina Von</span><span class="sub-heading">Land acquisition specialist</span></h2>
                                <ul class="user_stats">
                                    <li>
                                        <h4 class="heading_a">2391 <span class="sub-heading">Posts</span></h4>
                                    </li>
                                    <li>
                                        <h4 class="heading_a">120 <span class="sub-heading">Photos</span></h4>
                                    </li>
                                    <li>
                                        <h4 class="heading_a">284 <span class="sub-heading">Following</span></h4>
                                    </li>
                                </ul>
                            </div>
                            <a class="md-fab md-fab-small md-fab-accent" href="page_user_edit">
                                <i class="material-icons">&#xE150;</i>
                            </a>
                        </div>
                        <div class="user_content">
                            <ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" data-uk-sticky="{ top: 48, media: 960 }">
                                <li class="uk-active"><a href="#">About</a></li>
                                <li><a href="#">Photos</a></li>
                                <li><a href="#">Posts</a></li>
                            </ul>
                            <ul id="user_profile_tabs_content" class="uk-switcher uk-margin">
                                <li>
                                    Dolores eos ut blanditiis sit et qui voluptates eaque enim veniam sapiente nihil ipsam quas id suscipit voluptas sint amet necessitatibus delectus necessitatibus ad corporis consequuntur corporis libero temporibus magni est et sit aut quia maxime voluptatem vel pariatur eius totam officiis quaerat voluptas qui est iste sed eum quo sit corrupti voluptatum quam praesentium voluptatem rerum sit enim possimus iste omnis rem magnam aspernatur non molestias ut soluta voluptate eveniet rerum assumenda totam ut qui delectus quidem sit ipsam consequatur qui consequatur ut beatae est porro consequuntur consequatur ducimus quia et nostrum ex et sit illo quibusdam.                                    <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
                                        <div class="uk-width-large-1-2">
                                            <h4 class="heading_c uk-margin-small-bottom">Contact Info</h4>
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons">&#xE158;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">blanda.floy@hotmail.com</span>
                                                        <span class="uk-text-small uk-text-muted">Email</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">404-428-0644</span>
                                                        <span class="uk-text-small uk-text-muted">Phone</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon uk-icon-facebook-official"></i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">facebook.com/envato</span>
                                                        <span class="uk-text-small uk-text-muted">Facebook</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon uk-icon-twitter"></i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">twitter.com/envato</span>
                                                        <span class="uk-text-small uk-text-muted">Twitter</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="uk-width-large-1-2">
                                            <h4 class="heading_c uk-margin-small-bottom">My groups</h4>
                                            <ul class="md-list">
                                                <li>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="#">Cloud Computing</a></span>
                                                        <span class="uk-text-small uk-text-muted">151 Members</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="#">Account Manager Group</a></span>
                                                        <span class="uk-text-small uk-text-muted">251 Members</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="#">Digital Marketing</a></span>
                                                        <span class="uk-text-small uk-text-muted">211 Members</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="#">HR Professionals Association - Human Resources</a></span>
                                                        <span class="uk-text-small uk-text-muted">233 Members</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h4 class="heading_c uk-margin-bottom">Timeline</h4>
                                    <div class="timeline">
                                        <div class="timeline_item">
                                            <div class="timeline_icon timeline_icon_success"><i class="material-icons">&#xE85D;</i></div>
                                            <div class="timeline_date">
                                                09 <span>Jun</span>
                                            </div>
                                            <div class="timeline_content">Created ticket <a href="#"><strong>#3289</strong></a></div>
                                        </div>
                                        <div class="timeline_item">
                                            <div class="timeline_icon timeline_icon_danger"><i class="material-icons">&#xE5CD;</i></div>
                                            <div class="timeline_date">
                                                15 <span>Jun</span>
                                            </div>
                                            <div class="timeline_content">Deleted post <a href="#"><strong>Natus est quis enim.</strong></a></div>
                                        </div>
                                        <div class="timeline_item">
                                            <div class="timeline_icon"><i class="material-icons">&#xE410;</i></div>
                                            <div class="timeline_date">
                                                19 <span>Jun</span>
                                            </div>
                                            <div class="timeline_content">
                                                Added photo
                                                <div class="timeline_content_addon">
                                                    <img src="altair/assets/img/gallery/Image16.jpg" alt=""/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline_item">
                                            <div class="timeline_icon timeline_icon_primary"><i class="material-icons">&#xE0B9;</i></div>
                                            <div class="timeline_date">
                                                21 <span>Jun</span>
                                            </div>
                                            <div class="timeline_content">
                                                New comment on post <a href="#"><strong>Ut voluptas sed magni maiores.</strong></a>
                                                <div class="timeline_content_addon">
                                                    <blockquote>
                                                        Quis consequatur cum quis aliquid accusamus unde blanditiis dolores qui eius excepturi labore sit et.&hellip;
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline_item">
                                            <div class="timeline_icon timeline_icon_warning"><i class="material-icons">&#xE7FE;</i></div>
                                            <div class="timeline_date">
                                                29 <span>Jun</span>
                                            </div>
                                            <div class="timeline_content">
                                                Added to Friends
                                                <div class="timeline_content_addon">
                                                    <ul class="md-list md-list-addon">
                                                        <li>
                                                            <div class="md-list-addon-element">
                                                                <img class="md-user-image md-list-addon-avatar" src="altair/assets/img/avatars/avatar_02_tn.png" alt=""/>
                                                            </div>
                                                            <div class="md-list-content">
                                                                <span class="md-list-heading">Amanda Tremblay</span>
                                                                <span class="uk-text-small uk-text-muted">Sit deleniti asperiores quo consequatur iste.</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div id="user_profile_gallery" data-uk-check-display class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4" data-uk-grid="{gutter: 4}">
                                        <div>
                                            <a href="altair/assets/img/gallery/Image01.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image01.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image02.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image02.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image03.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image03.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image04.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image04.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image05.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image05.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image06.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image06.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image07.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image07.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image08.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image08.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image09.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image09.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image10.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image10.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image11.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image11.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image12.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image12.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image13.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image13.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image14.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image14.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image15.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image15.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image16.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image16.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image17.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image17.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image18.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image18.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image19.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image19.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image20.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image20.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image21.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image21.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image22.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image22.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image23.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image23.jpg" alt=""/>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="altair/assets/img/gallery/Image24.jpg" data-uk-lightbox="{group:'user-photos'}">
                                                <img src="altair/assets/img/gallery/Image24.jpg" alt=""/>
                                            </a>
                                        </div>
                                    </div>
                                    <ul class="uk-pagination uk-margin-large-top">
                                        <li class="uk-disabled"><span><i class="uk-icon-angle-double-left"></i></span></li>
                                        <li class="uk-active"><span>1</span></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><span>&hellip;</span></li>
                                        <li><a href="#">20</a></li>
                                        <li><a href="#"><i class="uk-icon-angle-double-right"></i></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Eveniet libero sint nam fugiat.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">10 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">23</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">301</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Voluptatem repellendus rerum sapiente facere velit minus eius.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">03 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">6</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">948</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Eum facere quasi dolorum libero.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">18 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">15</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">163</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Sed omnis est assumenda dolor qui est.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">14 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">10</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">958</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Reprehenderit ratione ea commodi et iure est rem.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">27 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">15</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">340</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Nesciunt delectus accusamus voluptas libero consequatur et.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">07 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">11</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">660</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Dolor nulla sit commodi vel labore ut.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">22 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">19</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">711</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Velit enim libero maxime explicabo quas et.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">12 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">12</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">554</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Laudantium voluptatem dolore architecto quae perferendis qui incidunt.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">14 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">18</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">555</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Reiciendis explicabo itaque nihil impedit suscipit aliquid eum aut.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">28 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">13</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">279</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Est unde ab aut qui voluptatibus fugit et.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">21 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">22</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">991</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Ipsam dolorem rerum cupiditate quod odit soluta.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">28 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">24</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">258</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Et voluptatem placeat laboriosam repudiandae.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">26 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">12</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">716</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Tempore ut recusandae iusto explicabo.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">28 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">25</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">131</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Magni sint illo soluta accusantium et aliquam dolores.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">27 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">22</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">598</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Molestias doloremque ullam possimus quia enim quis.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">06 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">28</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">926</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Quia dolores autem rerum voluptas reiciendis laborum blanditiis.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">24 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">21</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">635</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Ea sit qui delectus qui est voluptate accusantium ratione.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">15 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">3</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">991</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Saepe sit mollitia et ad nobis aperiam doloremque.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">29 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">16</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">646</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="md-list-heading"><a href="#">Et saepe eum earum asperiores.</a></span>
                                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">15 Jun 2016</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">14</span>
                                                </span>
                                                <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE417;</i> <span class="uk-text-muted uk-text-small">146</span>
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="uk-width-large-3-10">
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-margin-medium-bottom">
                                <h3 class="heading_c uk-margin-bottom">Alerts</h3>
                                <ul class="md-list md-list-addon">
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons uk-text-warning">&#xE8B2;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">Qui veniam.</span>
                                            <span class="uk-text-small uk-text-muted uk-text-truncate">Expedita et enim veniam quisquam eius dicta ab.</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons uk-text-success">&#xE88F;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">Veniam voluptatibus.</span>
                                            <span class="uk-text-small uk-text-muted uk-text-truncate">Numquam aut omnis laboriosam dolore nulla possimus qui excepturi.</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons uk-text-danger">&#xE001;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">Soluta quod mollitia.</span>
                                            <span class="uk-text-small uk-text-muted uk-text-truncate">Aut sint velit voluptatem enim quis.</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="heading_c uk-margin-bottom">Friends</h3>
                            <ul class="md-list md-list-addon uk-margin-bottom">
                                <li>
                                    <div class="md-list-addon-element">
                                        <img class="md-user-image md-list-addon-avatar" src="altair/assets/img/avatars/avatar_02_tn.png" alt=""/>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">Elenora Walker MD</span>
                                        <span class="uk-text-small uk-text-muted">Voluptatem illo autem laudantium.</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <img class="md-user-image md-list-addon-avatar" src="altair/assets/img/avatars/avatar_07_tn.png" alt=""/>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">Bulah Beatty</span>
                                        <span class="uk-text-small uk-text-muted">Est ipsum esse eaque nihil voluptatum.</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <img class="md-user-image md-list-addon-avatar" src="altair/assets/img/avatars/avatar_06_tn.png" alt=""/>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">Ms. Stephanie Effertz</span>
                                        <span class="uk-text-small uk-text-muted">Iste occaecati sunt voluptatem ex.</span>
                                    </div>
                                </li>
                            </ul>
                            <a class="md-btn md-btn-flat md-btn-flat-primary" href="#">Show all</a>
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
        (function() {
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
        $(function() {
            if(isHighDensity) {
                // enable hires images
                altair_helpers.retina_images();
            }
            if(Modernizr.touch) {
                // fastClick (touch devices)
                FastClick.attach(document.body);
            }
        });
        $window.load(function() {
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
                            'altair/bower_components/kendo-ui/styles/kendo.materialblack.min.css'
                            )
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
