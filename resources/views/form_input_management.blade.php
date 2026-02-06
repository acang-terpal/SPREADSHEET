@extends('layout.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no" />

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

    <!-- additional styles for plugins -->
    <!-- kendo UI -->
    <link rel="stylesheet" href="altair/bower_components/kendo-ui/styles/kendo.common-material.min.css" />
    <link rel="stylesheet" href="altair/bower_components/kendo-ui/styles/kendo.material.min.css" id="kendoCSS" />

    <link rel="stylesheet" href="altair/assets/custom_js/jspreadsheet/jspreadsheet.css" type="text/css" />
    <link rel="stylesheet" href="altair/assets/custom_js/jspreadsheet/jsuites.css" type="text/css" />

    {{--
    <link rel="stylesheet" href="https://jspreadsheet.com/v12/jspreadsheet.css" type="text/css" />
    <link rel="stylesheet" href="https://jsuites.net/v6/jsuites.css" type="text/css" /> --}}

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
            {{-- <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2">
                    <h3 class="heading_b uk-margin-bottom">Input Form</h3>
                </div>
                <div class="uk-width-medium-1-2">
                    <div class="uk-grid uk-flex-right" data-uk-grid-margin>
                        <div class="md-card">
                            <div class="md-card-content">
                                <form class="uk-form-stacked">
                                    <label for="tahun" class="uk-form-label">Pilih Tahun</label>
                                    <input id="tahun" value="10-06-2015" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="uk-flex uk-flex-middle uk-flex-space-between" style="margin-bottom: 24px">
                <div class="uk-card uk-card-body uk-card-default">
                    <h3 class="heading_b uk-margin-bottom">Input Form Management</h3>
                </div>
                <div class="uk-card uk-card-body uk-card-primary">
                    <div class="md-card">
                        <div class="md-card-content">
                            <form class="uk-form-stacked">
                                <label for="tahun" class="uk-form-label">Pilih Tahun</label>
                                <input id="tahun" value="10-06-2015" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-grid uk-grid-width-medium-1-1" data-uk-grid="{gutter:24}">
                <div>
                    <div class="md-card" id="wrapper_content">
                        <div class="md-card-toolbar" style="height: 58px">
                            <div class="md-card-toolbar-actions">
                                {{-- <a class="md-btn md-btn-primary md-btn-wave-light" onclick="ctrlFormInput.getData()">Submit
                                    Data</a>
                                <a class="md-btn md-btn-success md-btn-wave-light" onclick="ctrlFormInput.addColumn()">Add
                                    Column</a>
                                <a class="md-btn md-btn-warning md-btn-wave-light" onclick="ctrlFormInput.addRow()">Add
                                    Row</a> --}}
                                <i class="md-icon material-icons md-card-fullscreen-activate">&#xE5D0;</i>
                                <i class="md-icon material-icons md-card-toggle">&#xE316;</i>
                                {{-- <i class="md-icon material-icons md-card-close">&#xE14C;</i> --}}
                            </div>
                            <h3 class="md-card-toolbar-heading-text">
                                Input
                            </h3>
                        </div>
                        <div class="md-card-content" style="padding-bottom: 100px">
                            <div style="uk-container">
                                <div style="uk-width-1-1" id="spreadSheetInput"></div>
                            </div>
                            <div class="md-fab-wrapper md-fab-in-card">
                                <div class="md-fab md-fab-accent md-fab-sheet">
                                    <i class="material-icons">&#xe5d2;</i>
                                    <div class="md-fab-sheet-actions">
                                        <a href="javascript:void(0)" class="md-color-white" onclick="ctrlFormInput.getData()"><i class="material-icons md-color-white">&#xe161;</i> Save</a>
                                        <a href="javascript:void(0)" class="md-color-white" onclick="ctrlFormInput.addColumn()"><i class="material-icons md-color-white">&#xe8ec;</i> Add Column</a>
                                        <a href="javascript:void(0)" class="md-color-white" onclick="ctrlFormInput.addRow()"><i class="material-icons md-color-white">&#xe896;</i> Add Row</a>
                                        {{-- <a href="javascript:void(0)" class="md-color-white"><i
                                                class="material-icons md-color-white">&#xE872;</i> Delete</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="modal_overflow" class="uk-modal">
        <div class="uk-modal-dialog">
            <button type="button" class="uk-modal-close uk-close"></button>
            <h2 class="heading_a">Add Column</h2>
            <div class="uk-overflow-container">
                <h2 class="heading_b">Overflow container</h2>
                <img src="altair/assets/img/gallery/Image06.jpg" alt="" />
                <p>Qui at quasi adipisci ullam incidunt nihil nisi quia et qui enim enim est dolore tempora quia cum animi
                    asperiores alias ducimus sit sunt modi accusantium quidem quis hic et velit perspiciatis et distinctio
                    dolores quibusdam cum ullam repudiandae recusandae corporis consequatur et et aut dolore qui molestiae
                    ratione iusto numquam dolore aliquam blanditiis et iste ut quae suscipit sed in aut eligendi saepe
                    dignissimos rerum ab cumque quod doloremque nesciunt assumenda quia voluptatum ducimus amet unde ex
                    fugit dolorem distinctio dolores deserunt rem suscipit itaque officiis culpa illum sit animi alias velit
                    dicta aut error et veritatis officiis et quia rerum voluptatem debitis quasi officiis exercitationem
                    reiciendis et dolor ea eveniet consequatur voluptate omnis veniam earum consequuntur architecto et
                    excepturi sit quos iste et dolores ducimus ex et quibusdam autem sed ipsa qui quo at nihil consequatur
                    quidem illo sed modi ad vel asperiores unde ipsam id aliquid iste quo impedit quia minima architecto vel
                    mollitia quia eius saepe omnis dolore nihil assumenda voluptatibus voluptas unde harum deleniti
                    accusantium similique at aut quam at eius sed iusto necessitatibus debitis maxime est officiis vitae
                    error voluptatem cupiditate ducimus odit quia omnis eum facere nesciunt sed et placeat dolorum et
                    dolorem sunt ducimus corrupti odit veritatis occaecati vitae cum non illo similique eum facilis corporis
                    ducimus sapiente vel sequi cumque illo praesentium aspernatur eveniet sapiente debitis nihil dolorum aut
                    consequatur aspernatur eos perferendis placeat libero consectetur aut doloribus consequatur quam et
                    minima nesciunt libero saepe eos maiores architecto inventore dolore et tempora quia id minima quia
                    excepturi hic impedit atque impedit nemo aspernatur rerum eligendi sint qui atque laboriosam quam autem
                    esse quibusdam accusamus quos eum doloremque quia veniam quas labore velit minima minima esse rem maxime
                    rerum quo magni ut fugiat cumque voluptatem omnis delectus earum illum molestiae nihil perspiciatis
                    dolorum impedit consequatur ut odio corporis possimus iusto exercitationem eos sequi ut est omnis quis
                    consequatur est ipsum sit odio qui odio voluptate quia culpa in itaque natus aut hic nostrum voluptatem
                    occaecati veritatis sunt at odio eveniet ad et ut ex doloremque vitae accusantium eligendi nemo et
                    corrupti est molestias soluta doloremque rem animi placeat tempore qui cum aut consequatur aut rerum
                    maiores doloremque.</p>
                <p>Expedita doloremque accusamus cum quisquam ducimus eum voluptate adipisci a qui corporis est expedita
                    neque est iusto consequatur nobis animi fugit est optio consequatur harum est deserunt quos mollitia
                    vitae quibusdam porro voluptatum qui voluptatem sunt laborum et omnis assumenda voluptas mollitia
                    consequatur non aut alias est sunt officia quidem dolores et molestias quo optio quia cupiditate quia
                    sit quia voluptas rerum temporibus blanditiis iusto iure amet consequatur itaque debitis libero iusto
                    soluta impedit explicabo ipsum perspiciatis quia adipisci temporibus aut debitis quo ex nihil ullam
                    dolorem ducimus pariatur aliquam veritatis occaecati quia facere rerum aut sequi eum eos laboriosam
                    facere odit corrupti enim nostrum ex temporibus debitis qui veritatis culpa voluptas consequuntur
                    aperiam sint soluta aut deleniti sint sit atque eos a reprehenderit odio tempore sed commodi velit velit
                    repudiandae deleniti iste et ut qui rem consequatur nihil debitis enim nemo excepturi quia in et aperiam
                    unde commodi et pariatur est blanditiis aliquid blanditiis doloribus rem excepturi nihil vel aut aliquid
                    veritatis fugit impedit ut voluptatibus quia hic id qui natus possimus velit doloribus voluptate nam et
                    in animi harum porro aut id sint iste voluptatem sit fugit sit illo corrupti consectetur nam dolor
                    officiis placeat velit voluptas a id aut voluptatem reiciendis mollitia modi aut placeat eos sint ipsa
                    maxime provident laudantium dolores eos ut rerum quis nulla incidunt sed et praesentium ipsa sapiente
                    sit nihil et veniam nostrum ipsam rerum et ex commodi assumenda fuga deleniti eius consequuntur iure
                    atque dicta aut culpa accusamus dignissimos sint labore minus rem et enim itaque qui ut assumenda sequi
                    ducimus ut harum id consectetur sint rem autem natus quis officiis quod magnam ad optio voluptate
                    voluptates itaque excepturi quaerat ut iure ut beatae veritatis sit aut distinctio voluptates est quasi
                    labore et recusandae temporibus ut provident in recusandae explicabo ut odit sit optio fuga asperiores
                    vero repellendus quisquam eligendi optio aspernatur perspiciatis vitae dolorum eius ea architecto aut
                    itaque reiciendis debitis iure velit animi quia reprehenderit illum magnam repellat veritatis quaerat
                    distinctio dicta est eos nam reprehenderit qui nihil necessitatibus vel debitis deleniti aut soluta
                    rerum cumque quo tempore quia tenetur nulla molestiae suscipit non recusandae qui cumque quisquam labore
                    deleniti et quia voluptatem voluptatem voluptatem dolore voluptate omnis illum consectetur ducimus eos
                    blanditiis quia ratione vel deleniti suscipit nam rerum quod laboriosam qui voluptates maxime suscipit
                    enim dolor quasi at occaecati porro eveniet sit deserunt ullam minus veniam repellendus non quo
                    inventore nihil pariatur corrupti ut recusandae corrupti enim ut aliquam quia amet odio pariatur et sint
                    excepturi quas fugit quia repellendus est quisquam voluptas odit reprehenderit vel sit cumque omnis quia
                    molestias sequi dolor aut cum quaerat aliquam temporibus eveniet aliquid sint dignissimos odit est
                    consequatur dolorum rem excepturi sint commodi et quo asperiores fugiat voluptatem voluptas in qui et
                    atque nihil debitis temporibus sit incidunt deserunt omnis dolorem quaerat iure consequatur et commodi
                    impedit quod quas et quibusdam temporibus molestiae tempora et id quo tempora officiis provident sed
                    minus unde eligendi omnis tenetur quasi ut beatae eius voluptatum aliquid assumenda quidem occaecati
                    unde eveniet quia explicabo id ullam consequatur totam earum incidunt atque alias enim laboriosam
                    distinctio debitis unde nam facere id earum officiis ut reiciendis sint facilis nobis accusamus alias ea
                    sit iure.</p>
                <p>Nam itaque corporis earum asperiores quia et velit deserunt qui non sed qui nisi qui vitae recusandae
                    sunt dolorem dolores consectetur facere exercitationem facere dolor at eum rerum quisquam cum voluptas
                    et libero mollitia omnis accusamus dolore quis aut porro sapiente totam placeat adipisci corrupti quasi
                    ab sunt est ea ea occaecati illo qui et saepe nulla delectus libero accusantium ut eveniet tempora
                    voluptatum sequi nostrum fugit minima assumenda eum saepe est voluptatem perspiciatis dolor cupiditate
                    cupiditate perspiciatis modi accusantium dolores facere quia non voluptas consequatur dicta beatae quos
                    tempora quia est in rerum et totam rerum et ut laudantium assumenda vel beatae voluptatem asperiores
                    libero quasi labore sed nostrum nihil voluptas sed laudantium ratione omnis sed sit consequuntur eos sed
                    ab porro sed eligendi non in quia ducimus hic eligendi quo saepe est tempora quia sint sit voluptas
                    nesciunt qui quis et qui sunt fuga quia aut praesentium adipisci sit laudantium placeat molestias
                    commodi sed tenetur cupiditate sed tenetur ut odit iste ea neque rem aut voluptates quae quasi explicabo
                    autem vitae eaque ipsum dolorem quidem provident hic quos voluptatem laboriosam blanditiis ducimus ut
                    quasi aut quia molestias dolor laudantium perspiciatis perspiciatis modi esse et quo veritatis quae eius
                    exercitationem est incidunt neque mollitia eius hic deleniti at et est minima repellat quo nihil officia
                    sit et ab iure omnis recusandae voluptatem dolorum suscipit in consectetur ipsa eum et veritatis sed
                    soluta provident dolorum dignissimos ullam nemo sunt voluptas excepturi laudantium odit id veniam quae
                    unde et sed corrupti est laboriosam doloremque aspernatur consectetur consequuntur ut molestias et in
                    fugit ea ad ipsa voluptatem voluptatem vel esse dolore eos reiciendis ut similique maiores eos molestias
                    minima eveniet ut omnis ut sapiente quod architecto suscipit porro sint consequatur at libero omnis
                    autem sit ut voluptates animi similique quo sequi voluptatem ut occaecati est dicta est quia minima
                    aliquid repellendus aut nostrum necessitatibus magnam officia sed at sit molestiae incidunt error velit
                    nostrum dignissimos sed id ipsa voluptate sed officia illo dolores praesentium consequatur impedit
                    placeat aut reiciendis aut beatae eum eum corrupti in fugiat ut sequi quia molestiae vitae laudantium
                    recusandae neque dolorum dolorem officiis impedit enim adipisci sint sed dolores sit rerum esse nostrum
                    eius libero deserunt iste quasi quia consequatur ad consequatur id perferendis suscipit deserunt qui
                    dolores possimus debitis quos et aut vitae fugiat rerum nihil accusamus adipisci sed consequatur velit
                    aut ut dolores qui eius voluptas accusantium labore quis commodi in corporis modi excepturi velit quae
                    et asperiores repudiandae animi dolorum aliquid id unde explicabo quam quaerat labore vitae aut libero
                    corporis voluptatibus quo molestiae fugiat velit ipsum quod voluptatem sed totam omnis laudantium quia
                    iusto aut.</p>
                <p>Recusandae laboriosam ut ea ut itaque omnis aut sit labore harum doloribus alias hic ex quo ad sed
                    explicabo asperiores qui est et et sit sequi deleniti cum quis doloribus perferendis et quam id voluptas
                    iste fuga accusantium nulla at labore at sit ut atque corrupti libero illum voluptas consequatur aut et
                    voluptatum nulla ut omnis nulla suscipit est cupiditate quibusdam veritatis reiciendis fugit praesentium
                    quo aspernatur doloremque nihil quo repudiandae ab rem quaerat consequatur repudiandae quis et eum
                    commodi voluptates at officiis rerum aliquid sint vero consequatur aut corporis laboriosam a et tempore
                    et esse saepe a odio consequatur numquam voluptates laborum modi ad aut molestiae incidunt veniam
                    consequuntur debitis aspernatur amet laborum maxime perspiciatis ut pariatur mollitia voluptatem qui
                    tempora inventore et eos est eum voluptatibus quo id iste dignissimos eum labore placeat amet eligendi
                    harum vitae harum minus omnis accusantium esse est asperiores quis aut molestiae rerum error qui sequi
                    odit saepe ipsa omnis atque modi minus ex qui voluptatem tenetur dignissimos quaerat neque maxime facere
                    laboriosam quasi nam doloribus ipsam ipsa enim consequatur dolorem eaque aspernatur qui est minima
                    tempora excepturi blanditiis nulla veniam unde omnis sequi est iusto iusto velit debitis eligendi sed
                    sed corporis in consectetur amet cum consequatur voluptatem non sed qui saepe officia non eaque et
                    occaecati quidem voluptate veniam odio et placeat necessitatibus et est recusandae nisi architecto vitae
                    distinctio eos consequatur iusto vel id consequatur tempore natus et atque vel quia molestiae ut quaerat
                    assumenda officia temporibus accusamus officia ut quia totam ratione voluptas voluptate provident
                    voluptas omnis qui similique nisi molestiae ut aut porro placeat cupiditate est sint ratione
                    exercitationem autem vel iure corporis voluptate laborum ut reiciendis dicta velit et est incidunt ad
                    saepe quae nihil quo est iste deleniti vitae in aliquid ipsum totam molestias et enim id vel vero fuga
                    beatae necessitatibus dolorem vero aperiam rerum quasi cumque ad voluptatem eos velit autem et
                    asperiores consequuntur et quia ut non temporibus iusto deleniti doloremque saepe explicabo magni hic
                    sit est hic aut officia quia possimus quis facilis magni sed explicabo ab excepturi est sit natus
                    veritatis cum aperiam eos nesciunt non tenetur quo dolore nam magni illo recusandae omnis dolores
                    debitis ut molestias temporibus sequi dicta nihil dolore incidunt sit et corporis sed sint repellendus
                    eligendi rerum quaerat eos facilis voluptatibus dolor qui quia eveniet et inventore praesentium eligendi
                    voluptas ad qui repudiandae rem est suscipit consectetur esse rem vel quas itaque consequatur vero cum
                    possimus consequatur dicta maxime consequuntur et in quia iste accusamus quos a officia maiores quos
                    error nihil cum cupiditate culpa a aspernatur voluptate beatae quis animi delectus tempora quia quae
                    voluptates velit asperiores qui veritatis accusamus maiores aliquam voluptatum tenetur.</p>
            </div>
            <p>
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2" id="wrapperInput">
                    <select id="jenis_input" name='jenis_input' class="md-input" data-uk-tooltip="{pos:'top'}"
                        title="Pilih Jenis Inputan">
                        <option value="" disabled selected hidden>Jenis Input...</option>
                        <option value="a">Input</option>
                        <option value="b">Dropown PIC</option>
                        <option value="c">Dropown Level PIC</option>
                        <option value="d">Dropown Satuan</option>
                    </select>
                    <span class="uk-form-help-block">Pilih Jenis Inputan</span>
                </div>
                <div class="uk-width-large-1-2" id="dropdown_child">
                    <div id="wrapper_pic">
                        <select id="drop_pic" name="drop_pic" multiple>
                            <option value="1" selected>DMEP</option>
                            <option value="2" selected>DMOT</option>
                        </select>
                    </div>
                    <div id="wrapper_level">
                        <select id="drop_level" name="drop_level" multiple>
                            <option value="1" selected>IKSP</option>
                            <option value="2" selected>IKSP-2</option>
                        </select>
                    </div>
                    <div id="wrapper_satuan">
                        <select id="drop_satuan" name="drop_satuan" multiple>
                            <option value="21" selected>%</option>
                            <option value="1" selected>BOPD</option>
                        </select>
                    </div>
                </div>
            </div>
            </p>
            <h2 class="heading_a">Some text below the overflow container</h2>
            <p>Omnis officiis sint perspiciatis consequatur molestiae repellendus similique fugit sit dolor eveniet nostrum
                reiciendis consequatur est atque dolor pariatur vero voluptas labore aut repellendus sit sit veritatis
                facere repudiandae suscipit quasi asperiores nemo blanditiis molestiae sunt sit et rerum reiciendis dolorum
                repudiandae id velit corporis rem provident et vel quia voluptate quaerat officia inventore voluptas unde
                unde reiciendis ducimus consectetur non ut aliquid omnis harum distinctio laudantium exercitationem quia
                quos.</p>
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
    <script src="altair/assets/js/common.js"></script>
    <!-- uikit functions -->
    <script src="altair/assets/js/uikit_custom.js"></script>
    <!-- altair common functions/helpers -->
    <script src="altair/assets/js/altair_admin_common.js"></script>

    <!-- kendo UI -->
    <script src="altair/assets/js/kendoui_custom.js"></script>
    <!--  kendoui functions -->
    <script src="altair/assets/js/pages/kendoui.min.js"></script>

    <script src="altair/assets/custom_js/jspreadsheet/jspreadsheet.js"></script>
    <script src="altair/assets/custom_js/jspreadsheet/jsuites.js"></script>
    {{--
    <script src="https://jspreadsheet.com/v12/jspreadsheet.js"></script>
    <script src="https://jsuites.net/v6/jsuites.js"></script> --}}


    <script src="altair/assets/custom_js/form_input_management.js"></script>

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
        $(function () {
            var $switcher = $('#style_switcher'),
                $switcher_toggle = $('#style_switcher_toggle'),
                $theme_switcher = $('#theme_switcher'),
                $mini_sidebar_toggle = $('#style_sidebar_mini'),
                $slim_sidebar_toggle = $('#style_sidebar_slim'),
                $boxed_layout_toggle = $('#style_layout_boxed'),
                $accordion_mode_toggle = $('#accordion_mode_main_menu'),
                $html = $('html'),
                $body = $('body');


            $switcher_toggle.click(function (e) {
                e.preventDefault();
                $switcher.toggleClass('switcher_active');
            });

            $theme_switcher.children('li').click(function (e) {
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
            $document.on('click keyup', function (e) {
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
                .on('ifChecked', function (event) {
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_sidebar_mini", '1');
                    localStorage.removeItem('altair_sidebar_slim');
                    location.reload(true);
                })
                .on('ifUnchecked', function (event) {
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
                .on('ifChecked', function (event) {
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_sidebar_slim", '1');
                    localStorage.removeItem('altair_sidebar_mini');
                    location.reload(true);
                })
                .on('ifUnchecked', function (event) {
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
                .on('ifChecked', function (event) {
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_layout", 'boxed');
                    location.reload(true);
                })
                .on('ifUnchecked', function (event) {
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_layout');
                    location.reload(true);
                });

            // main menu accordion mode
            if ($sidebar_main.hasClass('accordion_mode')) {
                $accordion_mode_toggle.iCheck('check');
            }

            $accordion_mode_toggle
                .on('ifChecked', function () {
                    $sidebar_main.addClass('accordion_mode');
                })
                .on('ifUnchecked', function () {
                    $sidebar_main.removeClass('accordion_mode');
                });


        });
    </script>
@endsection
