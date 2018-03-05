<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <title>نقاشی کوبیسم</title>
    <meta name="description" content="سایت"/>
    <meta name="keywords" content="تابلو نقاشی،کوبیسم،سایت فروش آثار هنری و نقاشی، اثر هنری کوبیسم، سبک کوبیسم"/>
    <meta name="author" content="گروه مهندسی آرتان"/>
    {{--type='text/css'>--}}
    <link rel="stylesheet" href="{{URL::asset('public/main/css/bootstrap.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{URL::asset('public/main/css/bootstrap-datetimepicker.min.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{URL::asset('public/main/css/font-awesome.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{URL::asset('public/main/css/component.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{URL::asset('public/main/css/animate.min.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{URL::asset('public/css/persianDatepicker-default.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/sweetalert-site.css')}}">
    <!--Menu-->
    <link rel="stylesheet" href="{{URL::asset('public/main/css/menu.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{URL::asset('public/main/css/style.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{URL::asset('public/main/css/cycleslider.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/main/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/main/css/colors/color1.css')}}" id="color" type="text/css"/>
    <!-- settings-panel Demo Purpose css -->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('public/main/settings/settings.css')}}"/>
    <link rel="shortcut icon" href="{{URL::asset('')}}"/>
    {{--pnotify--}}
    <link href="{{URL::asset('public/css/pnotify.custom.css')}}" media="all" rel="stylesheet" type="text/css"/>
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.css" media="all" rel="stylesheet" type="text/css"/>--}}
    <script src="{{URL::asset('public/main/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{URL::asset('public/main/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('public/main/js/modernizr.custom.js')}}"></script>
</head>
<body>
<!--PRELOADER-->
<section id="jSplash">
    <div id="circle"></div>
</section>
<div id="menutop"></div>
<div id="detail-prod" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="productGrid" dir="rtl">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close " data-dismiss="modal" aria-label="بستن"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="productGrid">{{--//load by ajax--}}</h4>
            </div>
            <div class="modal-body">
                {{--//load by ajax--}}
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="button">بستن</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--Wrapper 
=============================-->
<div id="wrapper">
    <div id="mask">

        <!--Header
    =============================-->
        <div id="header" class="header">
            <div class="menu-inner">
                <div class="container">
                    <div class="row">
                        <div class="header-table col-md-12 header-menu">
                            <!--  Logo section -->
                            <div class="brand">
                                <a href="#home" class="nav-link yekan">
                                    @if(!empty($logo))
                                        {{$logo->title}}
                                        <img src="{{URL::asset('public/dashboard/Logo/'.$logo->image_src)}}" width="100"
                                             height="45"/>
                                    @else
                                        لوگو و عنوان سایت
                                    @endif
                                </a>
                            </div>
                            <!--  // Logo section -->

                            <!-- Sub Page Menu section -->
                            <nav class="main-nav">
                                <a href="#" class="nav-toggle"></a>
                                <ul id="sub-nav" class="nav">
                                    <li><a href="#home" class="nav-link">صفحه اصلی</a></li>
                                    <li><a href="#about" class="nav-link">درباره ما</a></li>
                                    <li><a href="#category" class="nav-link">محصولات<span class="sub-toggle"></span></a>
                                    </li>
                                    <li dir="rtl"><a href="#shopCart" class="shopCart nav-link">سبد خرید <span
                                                    class="sub-toggle"></span><b>[</b><b id="basketCount"> </b><b>]</b></a>
                                    </li>
                                    <li><a href="#gallery" class="nav-link">گالری</a></li>
                                    <li><a href="#loginRegister" class="nav-link">ورود / ثبت نام</a></li>
                                    {{--<li><a href="#contactform" class="nav-link">تماس با ما<span--}}
                                    {{--class="sub-toggle"></span></a></li>--}}
                                </ul>
                            </nav>
                            <!--  // Sub Page Menu section -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Header
        =============================-->

        <!--Home Page
        =============================-->
        <div id="home" class="item">
            <img src="{{URL::asset('public/main/img/2.jpg')}}" alt="گالری هنری" class="fullBg">
            <div class="clearfix">
                <div class="header_details">
                    <div class="container">
                        @if(count($services)>0)
                            <div class="header_icons accura-header-block accura-hidden-2xs">
                                <ul class="accura-social-icons accura-stacked accura-jump accura-full-height accura-bordered accura-small accura-colored-bg clearFix">
                                    @foreach($services as $service)
                                        <li id="1" title="{{$service->title}}"><a href="#"
                                                                                  class="accura-social-icon-facebook circle"><i
                                                        class="glyphicon {{$service->icon}} fa-3x"></i></a></li>
                                        {{--<li id="2"><a href="#" class="accura-social-icon-twitter circle"><i--}}
                                        {{--class="fa fa-twitter"></i></a></li>--}}
                                        {{--<li id="3"><a href="#" class="accura-social-icon-gplus circle"><i--}}
                                        {{--class="fa fa-google-plus"></i></a></li>--}}
                                        {{--<li id="4"><a href="#" class="accura-social-icon-pinterest circle"><i--}}
                                        {{--class="fa fa-pinterest"></i></a></li>--}}
                                        {{--<li id="5"><a href="#" class="accura-social-icon-linkedin circle"><i--}}
                                        {{--class="fa fa-linkedin"></i></a></li>--}}
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="call yekan">
                            <div class="home_address yekan" dir="rtl">
                                <i class="fa fa-map-marker"></i> آدرس گالری شما
                                <br> <i class="fa fa-phone"></i> 02122446688
                            </div>
                            <div class="home_address yekan">
                                برای ثبت سفارش عضو شوید و از طریق پنل مدیریتی اقدام نمائید
                            </div>
                        </div>
                    </div>
                    <!-- Mainheader Menu Section -->
                    <div class="mainheaderslide" id="slide">
                        <div id="mainheader" class="header">
                            <div class="menu-inner">
                                <div class="container">
                                    <div class="row">
                                        <div class="header-table col-md-12 header-menu">

                                            <!--  Logo section -->
                                            <div class="brand"><a href="#home" class="nav-link yekan">
                                                    @if(!empty($logo))
                                                        {{$logo->title}}
                                                        <img src="{{URL::asset('public/dashboard/Logo/'.$logo->image_src)}}"
                                                             width="100" height="45"/>
                                                    @else
                                                        لوگو و عنوان سایت
                                                    @endif
                                                </a>
                                            </div>
                                            <!--  // Logo section -->

                                            <!-- Home Page Menu section -->
                                            <nav class="main-nav">
                                                <a href="#" class="nav-toggle"></a>
                                                <ul id="sub-nav" class="nav">
                                                    <li><a href="#home" class="nav-link">صفحه اصلی</a></li>
                                                    <li><a href="#about" class="nav-link">درباره ما</a></li>
                                                    <li><a href="#category" class="nav-link">محصولات<span
                                                                    class="sub-toggle"></span></a></li>
                                                    <li><a href="#shopCart" class="nav-link shopCart">سبد خرید<span
                                                                    class="sub-toggle"></span></a></li>
                                                    <li><a href="#gallery" class="nav-link">گالری</a></li>
                                                    <li><a href="#loginRegister" class="nav-link">ورود / ثبت نام</a>
                                                    </li>
                                                    {{--<li><a href="#contactform" class="nav-link">تماس با ما<span--}}
                                                    {{--class="sub-toggle"></span></a>--}}
                                                    {{--</li>--}}
                                                </ul>
                                            </nav>
                                            <!--  // Home Page Menu section -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // Mainheader Menu Section -->
                </div>
                <div id="boxgallery" class="boxgallery" data-effect="effect-2">
                    @if(count($sliders))
                        @foreach($sliders as $slide)
                            <div class="panel"><img
                                        src="{{URL::asset('public/dashboard/sliderImages/'.$slide->image_src)}}"
                                        alt="{{$slide->title}}"/></div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <!-- // Home Page
        =============================-->

        <!--About us
        =============================-->
        <div id="about" class="item" style="background-color:#999999;">
            <img src="{{URL::asset('public/main/img/12.jpg')}}" alt="گالری هنری نقاشی" class="fullBg">
            <div class="content">
                <div class="content_overlay"></div>
                <div class="content_inner">
                    <div class="row contentscroll">
                        <div class="container">
                            <div class="col-md-6 empty">&nbsp;</div>
                            <div class="col-md-6 content_text">
                                <h1 class="yekan a-right">درباره ما</h1>
                                <div class="clearfix pad_top13">
                                    <div class="col-md-12" dir="rtl">
                                        <div class="right_content">
                                            <p class="row yekan t-justify">
                                                @if(!empty($aboutUs))
                                                    {!! $aboutUs !!}
                                                @endif

                                            </p>
                                            <p class="row yekan t-justify"></p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // About us
        =============================-->

        <!--Menu with image small
        =============================-->
        <div id="category" class="item">
            <img src="{{URL::asset('public/main/img/10.jpg')}}" alt="گالری هنری نقاشی " class="fullBg">
            <div class="content">
                <div class="content_overlay"></div>
                <div class="content_inner">
                    <div class="row contentscroll">
                        <div class="container">
                            <div class="col-md-6 empty">&nbsp;</div>
                            <div class="col-md-6 content_text">
                                <div class="pad_top30 home3">
                                    <div class="col-md-12">
                                        @if(count($menu))
                                            @foreach($menu as $mnu)
                                                @if($mnu->countCat>0)
                                                    <div class="row ">
                                                        <div class="menu_content clearfix">
                                                            <div class="col-md-10 text-left">
                                                                <div class="title-splider yekan">
                                                                    <h4 class="clearfix">
                                                                        <span class="right border_bottom">{{$mnu->title}}</span>
                                                                    </h4></div>

                                                            </div>
                                                            <div class="col-md-2 menu_small">
                                                                <div class="row"><img
                                                                            src="{{url('public/dashboard/image/'.$mnu->image_src)}}"
                                                                            class="img-responsive img_border"
                                                                            alt=""/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">

                                                                @if(count($menu))
                                                                    @foreach($mnu->submenu as $submenu)
                                                                        @if($submenu->count>0)
                                                                            <div class="row ">
                                                                                <div class="menu_content clearfix">
                                                                                    <div class="col-md-10 text-left">
                                                                                        <div class="title-splider yekan">
                                                                                            <h4 class="clearfix">
                                                                                                <a class="right border_bottom nav-link loadProduct"
                                                                                                   href="#products"
                                                                                                   id="{{$submenu->id}}">{{$submenu->title}}</a>
                                                                                            </h4></div>
                                                                                    </div>
                                                                                    <div class="col-md-2 menu_small">
                                                                                        <div class="row">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                @endif

                                                            </div>

                                                        </div>

                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Menu with image small
        =============================-->
        <!-- products with image small
        =============================-->
        <div id="products" class="item">
            <img src="{{URL::asset('public/main/img/10.jpg')}}" alt="سایت هنری" class="fullBg">
            <div class="content">

                <div class="content_overlay"></div>
                <div class="content_inner">
                    <div class="row contentscroll">
                        <div class="container">
                            <div class="col-md-6 empty">&nbsp;</div>
                            <div class="col-md-6 content_text">
                                <div class="pad_top30 home3">
                                    <div class="col-md-12" id="myProducts">
                                        <h4 class="yekan a-right">
                                            ابتدا دسته ی مورد نظر را انتخاب نمایید <br/><br><a
                                                    class="button nav-link yekan" href="#category "> انتخاب دسته <i
                                                        class="fa fa-arrow-left"></i>
                                            </a>
                                        </h4>
                                    </div>

                                    <div class="col-md-12">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // products with image small
        =============================-->
        <!-- orders
        =============================-->
        <div id="orders" class="item">
            <img src="{{URL::asset('public/main/img/map.jpg')}}" alt="the Paxton Gipsy Hill" class="fullBg">
            <div class="content">

                <div class="content_overlay"></div>
                <div class="content_inner">
                    <div class="row contentscroll">
                        <div class="container">
                            <div class="col-md-6 empty">&nbsp;</div>
                            <div class="col-md-6 content_text">
                                <div class="clearfix">
                                    <h1 class="yekan a-right">ثبت نهایی سفارش</h1>
                                    <div class="clearfix content_space">
                                        <div class="clearfix location_content content_space">

                                            <form id="orderDetailForm">
                                                {{csrf_field()}}
                                                <div class="page-content checkout-page">

                                                    <div class="clearfix reserve_form">
                                                        <input type="text" maxlength="11" name="userCellphone"
                                                               id="userCellphone"
                                                               class="validate['required'] textbox1 yekan a-right"
                                                               placeholder="* تلفن همراه : "
                                                               onfocus="this.placeholder = ''"
                                                               onBlur="this.placeholder = '* تلفن همراه :'"/>
                                                        <textarea name="userCoordination" id="userCoordination"
                                                                  class="validate['required'] messagebox1 yekan a-right"
                                                                  placeholder="  آدرس : " onFocus="this.placeholder = ''"
                                                                  onBlur="this.placeholder = ' آدرس :'"></textarea>
                                                    </div>
                                                    <div class="clearfix reserve_form margin-b-8">
                                                        <textarea name="comments" id="comments"
                                                                  class="validate['required'] messagebox1 yekan a-right"
                                                                  placeholder="  توضیحات مشتری : " onFocus="this.placeholder = ''"
                                                                  onBlur="this.placeholder = ' توضیحات مشتری :'"></textarea>
                                                    </div>
                                                    <div  class="col-md-12"></div>
                                                    <div class="box-border" style="border-color: #0a0a0a;">
                                                        <table id="orderTable"
                                                               class="table table-bordered table-responsive cart_summary rtl">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-center cart_product">عنوان محصول</th>
                                                                <th class="text-center"> توضیحات</th>
                                                                <th class="text-center">قیمت واحد</th>
                                                                <th class="text-center" align="center">تعداد/مقدار</th>
                                                                <th class="text-center">جمع کل (تومان)</th>
                                                                <th class="text-center">تخفیف محصول (درصد)</th>
                                                                <th class="text-center">هزینه ی پست (تومان)</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody id="orderContent">
                                                            </tbody>
                                                            <tr>
                                                                <td colspan="5"> جمع کل قیمت ها (تومان)</td>
                                                                <td colspan="5" id="totalPrice"></td>
                                                                <input type="hidden" name="totalPrice" value="">
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5">مجموع تخفیف ها (تومان)</td>
                                                                <td colspan="5" id="discountPrice"></td>
                                                                <input type="hidden" name="discountPrice" value="">
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5">مجموع هزینه های پست (تومان)</td>
                                                                <td colspan="5" id="postPrice"></td>
                                                                <input type="hidden" name="postPrice" value="">
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5">قیمت نهایی (تومان)</td>
                                                                <td colspan="5" id="factorPrice"></td>
                                                                <input type="hidden"  name="factorPrice" value="">
                                                                <input type="hidden"  name="basketId" value="">
                                                            </tr>

                                                        </table>
                                                        <button type="button" class="col-md-6 button pull-right"
                                                                style="margin-right: 25%;" id="orderRegistration">ثبت
                                                            سفارش
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // orders
        =============================-->
        <!-- shopCart
        =============================-->
        <div id="shopCart" class="item">
            <img src="{{URL::asset('public/main/img/map.jpg')}}" alt="the Paxton Gipsy Hill" class="fullBg">
            <div class="content">

                <div class="content_overlay"></div>
                <div class="content_inner">
                    <div class="row contentscroll">
                        <div class="container">
                            <div class="col-md-6 empty">&nbsp;</div>
                            <div class="col-md-6 content_text">
                                <div class="clearfix">
                                    <h1 class="yekan a-right" dir="rtl"> سبد خرید شما:
                                        <a class="button nav-link yekan pull-left" id="showOrders" href="#orders"> ثبت
                                            سفارشات سبد خرید <i
                                                    class="fa fa-arrow-left"></i>
                                        </a></h1>
                                    <h2><span>مجموع: </span><span id="orderTotal">0</span><span> تومان </span></h2>

                                    <div class="clearfix content_space">
                                        <div class="clearfix location_content content_space">
                                            <div id="cartContent" class="col-md-12"></div>
                                            {{-- filled by ajax --}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // shopCart
        =============================-->


        <!--Gallery
        =============================-->

        <div id="gallery" class="item">
            <div id="slides" class="clearfix">
                <div class="cycle-slideshow"
                     data-cycle-fx=fade
                     data-cycle-speed=1000
                     data-cycle-timeout=3000
                     data-cycle-caption-plugin=caption2
                     data-cycle-overlay-fx-out="fadeOut"
                     data-cycle-overlay-fx-in="fadeIn"
                     data-cycle-prev=".prev"
                     data-cycle-next=".next"
                >
                    <div class="cycle-overlay"></div>

                    <img src="{{URL::asset('public/main/img/7.jpg')}}" data-cycle-desc="خلق آثار خاص و منحصر به فرد"
                         class="fullBg"
                         alt="">
                    <img src="{{URL::asset('public/main/img/6.jpg')}}" data-cycle-desc="عالی ترین کیفیت" class="fullBg"
                         alt="">
                    <img src="{{URL::asset('public/main/img/1.jpg')}}" data-cycle-desc="خلاقیت و زیبایی" class="fullBg"
                         alt="">
                </div>
                <div id="galheading" class="clearfix"><h1 class="yekan">گالری</h1></div>
                <div id="button" class="clearfix">
                    <div class="prev"><i class="fa fa-angle-left"></i></div>
                    <div class="next"><i class="fa fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- // Gallery Ends
        =============================-->

        <!--Reservation
        =============================-->
        <div id="loginRegister" class="item">
            <img src="{{URL::asset('public/main/img/9.jpg')}}" alt="the Paxton Gipsy Hill" class="fullBg2">
            {{--<div style="background-size: 800px 100px; background:no-repeat url({{URL::asset('public/main/img/8.jpg')}});"  alt="the Paxton Gipsy Hill" class="fullBg"></div>--}}
            <div class="content">

                <div class="content_overlay"></div>
                <div class="content_inner">
                    <div class="row contentscroll">
                        <div class="container">
                            <div class="col-md-6 empty">&nbsp;</div>
                            <div class="col-md-6 content_text">
                                <div id="reservations">
                                    <h1 class="yekan a-right">1- ورود به پنل</h1>
                                    <form id="login_form" class="reserve_form loginUserForm pad_top13" action="#"
                                          method="post">
                                        {{csrf_field()}}
                                        <div class="clearfix reserve_form">
                                            <input type="text" name="cellphone"
                                                   class="validate['required'] textbox1 yekan a-right"
                                                   placeholder="* تلفن همراه : "
                                                   onfocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* تلفن همراه :'"/>
                                            <input name="password" type="password"
                                                   class="validate['required','phone']  textbox1 yekan a-right"
                                                   placeholder="* رمز عبور : " onFocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* رمز عبور :'"/>
                                            <div class="margin-top-2">
                                                <i class="fa fa-refresh fa-lg fa-2x captcha-reload col-md-1" height="50"
                                                   width="50"></i>
                                                <img class="captcha col-md-4" alt="captcha.png" id="captcha-image"/>
                                                <input name="phone" id="captcha1"
                                                       class="validate['required']  textbox1 yekan a-right"
                                                       placeholder="* کد امنیتی : " onFocus="this.placeholder = ''"
                                                       onBlur="this.placeholder = '* کد امنیتی :'"/>
                                                <input id="loginUser" value="ورود" name="Confirm" type="button"
                                                       class="submitBtn yekan a-right"></div>
                                        </div>
                                    </form>
                                </div>
                                <br>
                                <br>
                                <div id="reservations">
                                    <h1 class="yekan a-right">2- ثبت نام</h1>
                                    <form id="reservation_form" class="reserve_form registerForm pad_top13" action="#"
                                          method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" value="user" name="frmtype">
                                        <div class="clearfix reserve_form">
                                            <input type="text" name="name" id="name"
                                                   class="validate['required'] textbox1 yekan a-right"
                                                   placeholder=" نام : "
                                                   onfocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = ' نام :'"/>
                                            <input type="text" name="family" id="family"
                                                   class="validate['required'] textbox1 yekan a-right"
                                                   placeholder=" نام خانوادگی : "
                                                   onfocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = ' نام خانوادگی :'"/>
                                            <input type="text" id="password" name="password"
                                                   class="validate['required'] textbox1 yekan a-right"
                                                   placeholder="* پسورد : "
                                                   onfocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* پسورد :'"/>
                                            <input type="text" name="password_confirmation" id="password-confirm"
                                                   class="validate['required'] textbox1 yekan a-right"
                                                   placeholder="* تکرار پسورد : "
                                                   onfocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* تکرار پسورد :'"/>
                                            <input type="text" name="email" id="email"
                                                   class="validate['required','email']  textbox1 yekan a-right"
                                                   placeholder=" ایمیل : " onFocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = ' ایمیل :'"/>
                                            <input type="text" name="phone"
                                                   class="validate['required','phone']  textbox1 yekan a-right"
                                                   placeholder="* شماره موبایل : " onFocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* تلفن موبایل :'"/>
                                            <input type="text" name="cellphone" id="cellphone"
                                                   class="validate['required','phone']  textbox1 yekan a-right"
                                                   placeholder="* شماره تلفن : " onFocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* شماره تلفن :'"/>
                                            <input type="text" name="birth_date" id="birth_date"
                                                   class="validate['required']  textbox1 yekan a-right"
                                                   placeholder="* تاریخ تولد : " onFocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* تاریخ تولد :'"/>
                                            <select name="capital" id="capital"
                                                    class="validate['required']  textbox1 yekan a-right"
                                                    placeholder="* استان : " onFocus="this.placeholder = ''"
                                                    onBlur="this.placeholder = '* استان :'">
                                                <option class="align-right" value="-1">لطفا استان مورد نظر خود را انتخاب
                                                    نمایید.
                                                </option>
                                                @foreach($capital as $cap)
                                                    <option class="align-right"
                                                            value="{{$cap->id}}">{{$cap->title}}</option>
                                                @endforeach                                            </select>
                                            <select name="town" id="town"
                                                    class="validate['required']  textbox1 yekan a-right"
                                                    placeholder=" شهرستان : " onFocus="this.placeholder = ''"
                                                    onBlur="this.placeholder = ' شهرستان :'">
                                            </select>
                                            <input type="text" name="zipCode" id="zipCode"
                                                   class="validate['required','phone']  textbox1 yekan a-right"
                                                   placeholder=" کد پستی : " onFocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = ' کد پستی :'"/>
                                            <textarea name="address" id="address"
                                                      class="validate['required'] messagebox1 yekan a-right"
                                                      placeholder=" آدرس : " onFocus="this.placeholder = ''"
                                                      onBlur="this.placeholder = ' آدرس :'"></textarea>
                                            <i class="fa fa-refresh fa-lg fa-2x captcha-reload col-md-1" height="50"
                                               width="50"></i>
                                            <img class="captcha col-md-4" alt="captcha.png" id="captcha-image"/>
                                            <input name="captcha"
                                                   class="validate['required']  textbox1 yekan a-right " id="captcha"
                                                   placeholder="* کد امنیتی : " onFocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* کد امنیتی :'"/>
                                            <input id="registerUser" value="ثبت نام" name="Confirm" type="button"
                                                   class="submitBtn yekan a-right">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Reservation

        =============================-->

        <!-- Contact Form
        =============================-->

    {{--<div id="contactform" class="item">--}}
    {{--<img src="{{URL::asset('public/main/img/map.jpg')}}" alt="the Paxton Gipsy Hill" class="fullBg">--}}
    {{--<div class="content">--}}

    {{--<div class="content_overlay"></div>--}}
    {{--<div class="content_inner">--}}
    {{--<div class="row contentscroll">--}}
    {{--<div class="container">--}}
    {{--<div class="col-md-6 empty">--}}
    {{--@if(!empty($googleMap))--}}
    {{--<iframe height="500" class="col-md-12" src="{{$googleMap->iframe_tag}}"--}}
    {{--frameborder="0" style="border:0" allowfullscreen></iframe>--}}
    {{--@endif--}}
    {{--</div>--}}

    {{--<div class="col-md-6 content_text">--}}
    {{--<div id="contactforms">--}}
    {{--<h1 class="yekan a-right">تماس با ما</h1>--}}
    {{--<form id="contact_form" class="cont_form pad_top13" action="#" method="post">--}}

    {{--<div class="clearfix cont_form pad_top20">--}}
    {{--<input type="text" name="name"--}}
    {{--class="validate['required'] textbox1 yekan a-right"--}}
    {{--placeholder="* نام : "--}}
    {{--onfocus="this.placeholder = ''"--}}
    {{--onBlur="this.placeholder = '* Name :'"/>--}}
    {{--<input type="text" name="email"--}}
    {{--class="validate['required','email']  textbox1 yekan a-right"--}}
    {{--placeholder="* ایمیل : " onFocus="this.placeholder = ''"--}}
    {{--onBlur="this.placeholder = '* ایمیل :'"/>--}}
    {{--<input type="text" name="phone"--}}
    {{--class="validate['required','phone']  textbox1 yekan a-right"--}}
    {{--placeholder="* شماره تماس : " onFocus="this.placeholder = ''"--}}
    {{--onBlur="this.placeholder = '* شماره تماس :'"/>--}}
    {{--<textarea name="message"--}}
    {{--class="validate['required'] messagebox1 yekan a-right"--}}
    {{--placeholder="* متن پیغام : " onFocus="this.placeholder = ''"--}}
    {{--onBlur="this.placeholder = '* متن پیغام  :'"></textarea>--}}
    {{--<input id="submitBtn" value="ارسال پیغام" name="Confirm" type="submit"--}}
    {{--class="submitBtn yekan a-right">--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    <!-- // Contact Form
        =============================-->


    </div>
</div>
<!-- // Wrapper =============================-->

<!--java script-->
<!-- Preloader Starts -->
<script type="text/javascript" src="{{URL::asset('public/main/js/jpreloader.min.js')}}"></script>

<script type="text/javascript" src="{{URL::asset('public/main/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/jquery.scrollTo.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/jquery.fitvids.js')}}"></script>

<!-- Tiled Sldier -->
<script type="text/javascript" src="{{URL::asset('public/main/js/classie.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/boxesFx.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/wait.js')}}"></script>


<!-- Cycle Slider Sldier -->
<script type="text/javascript" src="{{URL::asset('public/main/js/jquery.cycle.all.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/jquery.cycle2.caption2.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/jquery.slicknav.min.js')}}"></script>

<script src="{{URL::asset('public/main/js/jquery.nicescroll.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/jquery.mousewheel.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/jquery.easing.1.3.js')}}"></script>
<!-- include retina js -->
<script type="text/javascript" src="{{URL::asset('public/main/js/retina-1.1.0.min.js')}}"></script>

<!-- History.js -->
<!--[if (gte IE 10) | (!IE)]><!-->
<script type="text/javascript" src="{{URL::asset('public/main/js/jquery.history.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/ajaxify-html5.js')}}"></script>
<!--<![endif]-->

<script type="text/javascript" src="{{URL::asset('public/main/js/custom_general_box.js')}}"></script>

<script type="text/javascript" src="{{URL::asset('public/main/settings/settings/settings.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/settings/settings/jscolor.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/js/pnotify_3.2.1.min.js')}}"></script>
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.js"></script>--}}
{{--show categorie and subCategories in product menu--}}
<script>
    $(document).ready(function () {
        $(".mainMenu").each(function () {
            $(this).hover(function () {
                var id = $(this).attr('name');
                var token = $(this).data("token");
                $.ajax({
                    dataType: "json",
                    url: "{{url('getSubmenu')}}" + '/' + id,
                    cash: false,
                    type: "get",
                    data: {
                        "_method": 'get',
                        "_token": token
                    },
                    success: function (response) {
                        if(response!=0) {
                            var item = $(".submenu");
                            item.empty();
                            var x = 1;
                            $.each(response.submenu, function (key, value) {
                                if (value.hasProduct == 1) {
                                    if (value.catImg != null && x == 1) {
                                        item.append('<li class="block-container col-md-3 col-xs-12 float-xs-none" style="float: right">' +
                                            '<ul class="block">' +
                                            '<li class="img_container">' +
                                            '<img src="{{url('public/dashboard/image')}}/' + value.catImg + '" alt="' + value.title + '" title="' + value.title + '" >' +
                                            '</li>' +
                                            '</ul></li>')
                                    }
                                    x = 0;
                                    var len = value.brands.length;
                                    if (len != 0 || value.title == 'سایر') {
                                        if (value.title == 'سایر') {
                                            var temp = '<li class="block-container col-md-3 col-xs-12 float-xs-none" style="float: right">' +
                                                '<ul class="block">' +
                                                '<li class="link_container group_header">' +
                                                '<a href="#">سایر محصولات</a>' +
                                                '</li>';
                                            temp += '<li class="link_container" id="' + value.id + '">' +
                                                '<a href="{{url('showProducts')}}' + "/" + value.id + '">مشاهده ی سایر محصولات</a>' +
                                                '</li>';
                                            temp += '</ul>' + '</li>';
                                            item.append(temp)
                                        }
                                        else {
                                            var temp = '<li class="block-container col-md-3 col-xs-12 float-xs-none" style="float: right">' +
                                                '<ul class="block">' +
                                                '<li class="link_container group_header">' +
                                                '<a href="#">' + value.title + '</a>' +
                                                '</li>';
                                            $.each(value.brands, function (key, value) {
                                                temp += '<li class="link_container" id="' + value.id + '">' +
                                                    '<a href="{{url('showProducts')}}' + "/" + value.id + ' ">' + value.title + '</a>' +
                                                    '</li>';
                                            });
                                            temp += '</ul>' + '</li>'
                                            item.append(temp)
                                        }

                                    }
                                }

                            });
                        }
                    }
                })
            });
            $(this).mouseleave(function () {
                var item = $(".mainMenu>ul");
                item.empty();
                //$(".submenu").hide(1);
            })
        })
    })
</script>
{{--logins and register and captcha scripts--}}
<script>
    $(document).ready(function () {
        //load cities of capital in selectbox
        var capital = $("#capital");
        $("#capital").on("change", function () {
            var cid = $(this).val();
            var token = $(this).data("token");
            $.ajax({
                url: '{{url('town')}}' + '/' + cid,
                type: 'get',
                dataType: "JSON",
                data: {
                    "id": cid,
                    "_method": 'get',
                    "_token": token
                },
                success: function (data) {
                    var item = $('#town');
                    item.empty();
                    $.each(data, function (index, value) {
                        item.append('<option value="' + value.title + '">' + value.title + '</option>');
                    });

                },
                error: function (response) {
                   // console.log(response.valueOf(2));
                }
            });
        });
        captcha();
        function captcha() {
            var token = $(this).data("token");
            $.ajax({
                url: '{{url('captcha')}}',
                type: 'get',
                dataType: "JSON",
                data: {
                    "_method": 'get',
                    "_token": token
                },
                success: function (data) {
                    $(".captcha").attr("src", data)
                },
                error: function (response) {
                   // console .log(response.valueOf(2));
                }
            });
        }

        $(".captcha").click(function () {
            captcha();
        });
        $(".captcha-reload").click(function () {
            captcha();
        });
        $("#registerUser").on('click', function () {
            $(".registerForm").submit(function (e) {
                e.preventDefault();
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            var formData = new FormData($(".registerForm")[0])
            $.ajax({
                url: '{{url('/register')}}',
                type: 'post',
                cache: false,
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (response) {
                    var y = '';
                    if (response.data == '1') {
                        y = 'شما با مؤفقیت ثبت نام نمودید، از بخش ورود برای استفاده از پنل خود اقدام نمائید.';
                    }
                    else if (response.data == '0') {
                        y = 'متأسفانه شما ثبت نام نشدید،با بخش پشتیبانی تماس حاصل فرمائید.';
                    }
                    else {
                        $.each(response, function (key, val) {
                            y += val[0] + '\n'
                        });
                    }
                    swal({
                        title: '',
                        text: y,
                        type: "info",
                        confirmButtonText: "بستن"
                    })

                },
                error: function (response) {
                    if (response.status == 422) {
                        var x = response.responseJSON;
                        var y = '';
                        $.each(x, function (key, val) {
                            y += val[0] + '\n';//showing only the first error.
                        });
                        swal({
                            title: '',
                            text: y,
                            type: "warning",
                        })
                    }
                    else if (response.status === 421) {
                        swal({
                            title: "",
                            text: "اطلاعات شما با مؤفقیت ثبت شد، پس از تأیید شدن توسط مدیر سایت برای شما ایمیل فعال سازی ارسال خواهد شد.منتظر پیامک اطلاعیه از طرف سایت باشید.",
                            type: "warning",
                            confirmButtonText: "بستن"
                        });
                    }
                    else {
                        swal({
                            title: "",
//                                text: 'خطایی رخ داده است، لطفا با پشتیبانی تماس حاصل فرمائید',
                            text: "اطلاعات شما با مؤفقیت ثبت شد، پس از تأیید شدن توسط مدیر سایت برای شما ایمیل فعال سازی ارسال خواهد شد.منتظر پیامک اطلاعیه از طرف سایت باشید.",
                            type: "warning",
                            confirmButtonText: "بستن"
                        });
                    }
                }//error

            })//ajax
        });//onclick

        //send login form
        $("#loginUser").on('click', function () {
            $(".loginUserForm").submit(function (e) {
                e.preventDefault();
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            var formData = new FormData($(".loginUserForm")[0])
            $.ajax({
                url: '{{url('/login')}}',
                type: 'post',
                cache: false,
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (data) {
                    var x = '';
                    $.each(data, function (key, val) {
                        x += val[0] + '\n'
                    });
                    swal({
                        title: '',
                        text: x,
                        type: "info",
                        confirmButtonText: "بستن"
                    })
                },
                error: function (response) {
                    if (response.status == 422) {
                        var x = response.responseJSON;
                        var y = '';
                        $.each(x, function (key, val) {
                            y += val[0] + '\n';//showing only the first error.
                        });
                        if (x.cellphone == "اطلاعات ورودی با اطلاعات ذخیره شده مطابقت ندارد") {
                            swal({
                                title: '',
                                text: x.cellphone,
                                type: "warning",
                            });
                        }
                        else {
                            swal({
                                title: '',
                                text: y,
                                type: "warning",
                            });
                        }
                    }
                    else if (response.status === 421) {
                        swal({
                            title: "",
                            text: "اطلاعات شما با مؤفقیت ثبت شد، پس از تأیید شدن توسط مدیر سایت برای شما ایمیل فعال سازی ارسال خواهد شد.منتظر پیامک اطلاعیه از طرف سایت باشید.",
                            type: "warning",
                            confirmButtonText: "بستن"
                        });
                    }
                    else if (response.status != 500) {
                        location.href = '{{url('/panel')}}';
                    }
                }//error

            })//ajax
        });//onclick

    })//document.ready

</script>
<!--formatNumber -->
<script>
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
    }
</script>
{{--show product detail in modal--}}
<script>
    function showProductDetail(id) {
        var modalBody = $('.modal-body');
        $.ajax({
            url: "{{url('productDetail')}}" + "/" + id,
            type: 'get',
            cache: false,
            dataType: 'json',
            success: function (response) {
                var x = '';
                x = '<div class="row">' +
                    '<div class="col-md-5 col-md-offset-1">' +
                    '<div id="myCarousel" class="carousel slide" data-ride="carousel"> ' +
                    <!-- Indicators -->
//                    '<ol class="carousel-indicators">';
//                     $.each(response.product.product_images, function (key, value) {
//                         if(key==0)
//                            x+='<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
//                         else
//                             x+='<li data-target="#myCarousel" data-slide-to="'+key+'"></li>';
//                });
//                    x+='</ol>'+
                    '<div class="carousel-inner">';
                $.each(response.product.product_images, function (key, value) {
                    if (key == 0)
                        x += '<div class="item active slider-size">' +
                            '<img src="public/dashboard/productFiles/picture/' + value.image_src + '" alt="" class="img-responsive">' +
                            '</div>';
                    else
                        x += '<div class="item slider-size">' +
                            '<img src="public/dashboard/productFiles/picture/' + value.image_src + '" alt="" class="img-responsive">' +
                            '</div>';

                });
                x += '</div>' +

                    '<a class="left carousel-control" href="#myCarousel" data-slide="prev">' +
                    '<span class="glyphicon glyphicon-chevron-left"></span>' +
                    '<span class="sr-only">قبلی</span>' +
                    '</a>' +
                    '<a class="right carousel-control" href="#myCarousel" data-slide="next">' +
                    '<span class="glyphicon glyphicon-chevron-right"></span>' +
                    '<span class="sr-only">بعدی</span>' +
                    '</a>' +
                    '</div>' +
                    '</div><br>' +
                    '<div class="col-md-5"> شرح اثر : ' + response.product.description + "<br>قیمت اثر : " + formatNumber(response.product.price) +
                    '<span>تومان</span><br>اندازه و حالت بوم : ' + response.product.modelName + ' - ' + response.product.sizeName +
                    '<div class="add-to-cart">' +
                    '<button class="button  nav-link yekan pull-left" content="' + response.product.price + '" id="addToBasket" name="' + response.product.id + '">' +
                    '<span></span>افزودن به سبد خرید' +
                    '</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                modalBody.html(x)
                $('.modal-title').html(response.product.title)
            }
        });
    }
    $(document).ready(function () {

        var myProductsDiv = $("#myProducts");
        $(".loadProduct").click(function () {
            var id = $(this).attr('id');
            $.ajax({
                url: '{{url('showProducts')}}' + '/' + id,
                type: 'get',
                cache: false,
                dataType: 'json',
                success: function (response) {
                    myProductsDiv.html('');
                    $.each(response.products, function (key, value) {
                        var x = '<div class="row ">' +
                            '<div class="menu_content clearfix">' +
                            '<button type="button"  class="default-background-color btn btn-danger col-md-1 btn-product-detail" onclick="showProductDetail(' + value.id + ')" id="' + value.id + '" data-toggle="modal" data-target="#detail-prod">جزئیات</button>' +
                            '<div class="col-md-8 text-left">' +
                            '<div class="title-splider yekan">' +
                            '<h4 class="clearfix">' +
                            '<span class="right border_bottom">' + value.title + '</span>';
                        $.each(value.product_flags, function (key, flag) {
                            if (flag.active > 0) {
                                x += '<span class="left d-rtl">' +
                                    formatNumber(flag.price) +
                                    'تومان</span>';
                            }
                        });
                        x += '</h4></div>' +
                            '</div>' +
                            '<div class="col-md-2 menu_small">' +
                            '<div class="row">';
                        $.each(value.product_images, function (key, img) {
                            if (key == 0)
                                x += '<img src="public/dashboard/productFiles/picture/' + img.image_src + '" class="img-responsive img_border"alt=""/>';
                        });
                        x += '</div></div>' +
                            '</div></div>';
                        myProductsDiv.append(x);

                    });//end each
                    myProductsDiv.append('<div class="row"><a class="button nav-link yekan" href="#category"> انتخاب دسته <i class="fa fa-arrow-left"></i></a></div>');
                },
                error: function (error) {
                    $("#myProducts").html(error);
                }
            });

        });


        $(".btn-product-detail").on("click", function () {

        });
    })
</script>
<!-- below script is related to add to basket and basket count -->
<script>
    basketCountNotify();
    basketTotalPrice();
    //below function is related to get total price
    function basketTotalPrice() {
        var token = $('#token').val();
        $.ajax
        ({
            url: "{{url('user/getBasketTotalPrice')}}",
            type: "get",
            dataType: "json",
            data: {'_token': token},
            success: function (response) {
                $('.total').text(formatNumber(response));
                if(response>0)
                $('#orderTotal').text(formatNumber(response));
                else
                $('#orderTotal').text(0);
            },
            error: function (error) {
               // console.log(error);
            }

        });
    }
    //below function is related to get basket count
    function basketCountNotify() {
        var token = $('#token').val();
        $.ajax
        ({
            url: "{{url('user/getBasketCountNotify')}}",
            type: "get",
            dataType: "json",
            data: {'_token': token},
            success: function (response) {
                $('#basketCount').text(response);
                if(response == 0 || response == '')
                {
                    $('#showOrders').css('display','none');
                }
            },
            error: function (error) {
            //console.log(error);
                $('#showOrders').css('display','none');
            }

        });
    }
    $(document).on('click', '#addToBasket', function () {

        var productFlag = $(this).attr('content');
        var productId = $(this).attr('name');
        var token = $('#token').val();
        var orderTotal = $('#orderTotal');
        var orderTotalPrice = orderTotal.text();
        orderTotalPrice = orderTotalPrice.replace(',', '');
        orderTotalPrice = orderTotalPrice.replace(',', '');
        orderTotalPrice = orderTotalPrice.replace(',', '');
        orderTotalPrice = orderTotalPrice.replace(',', '');
        orderTotal.text(formatNumber(parseInt(productFlag) + parseInt(orderTotalPrice)));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax
        ({
            url: "{{url('user/addToBasket')}}",
            type: "post",
            data: {'productId': productId, '_token': token, 'productFlag': productFlag},
            dataType: "json",
            success: function (response) {
                if (response.code == 1) {
                    var myStack = {"dir1": "down", "dir2": "right", "push": "top"};
                    new PNotify({
                        title: response.message,
                        text: "",
                        addclass: "stack-custom",
                        type: "success",
                        stack: myStack
                    });
                    basketCountNotify();
                    loadShopCart('#orderContent');//when site loaded
                } else {
                    var myStack = {"dir1": "down", "dir2": "right", "push": "top"};
                    new PNotify({
                        title: response.message,
                        text: '',
                        addclass: "stack-custom",
                        type: "success",
                        stack: myStack
                    })
                }

            }, error: function (error) {
                //console.log(error);
                swal({
                    title: "",
                    text: 'خطایی رخ داده است',
                    type: "danger",
                    confirmButtonText: "بستن"
                });
            }
        })
    })
</script>
<!--load items of ShopCart in a shop cart div -->
<script>
    function loadShopCart(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            dataType: "json",
            url: "{{url('order/basketDetail')}}",
            cash: false,
            type: "get",
            success: function (response) {
                if(response!=0) {
                    var cartContent = $(id);
                    cartContent.html('');
                    $.each(response.baskets.products, function (key, value) {
                        if (id == '#cartContent') {
                            var x = '<div class="row margin-b-8 basketItem-' + value.id + '">' +
                                '<div class="row col-md-5 location-btns">' +
                                '<div class="location map-link"><a class="button removeItem" onclick="removeBasketItem(' + value.id + ',' + value.basket_id + ',' + value.price * value.count + ')"><i class="fa fa-times "></i></a></div>' +
                                '<div class="location"><a class="button addToCount" onclick="addToProductCount(' + value.id + ',' + value.basket_id + ',' + value.price + ')"><i class="fa fa-arrow-up"></i></a></div>' +
                                '<div class="location subFromCo unt" id="subFromCount"><a class="button " onclick="subFromProductCount(' + value.id + ',' + value.basket_id + ',' + value.price + ')"><i class="fa fa-arrow-down"></i></a></div>' +
                                '</div>' + '<div class="row col-md-7">' +
                                '<div class="location-address-wrap">' +
                                '<h3 class="border_bottom yekan a-right"><b class="">نام محصول :</b>' + value.title + '</h3>' +
                                '<div class="clearfix location-street a-right yekan"><b class="">توضیحات  :</b>' + value.description + '</div>' +
                                '<div class="clearfix location-phone a-right yekan"><b class="">قیمت اصلی :</b>' + formatNumber(value.price) + ' تومان<br/>' +
                                '<b class="">تعداد :</b><b class="totalProductCount-' + value.id + '">' + value.count + '</b></div>' +
                                '<div class="clearfix location-cateringlink a-right yekan"><b >جمع کل  :</b><b class="totalProductPrice-' + value.id + '">' + formatNumber(value.sum) +
                                '</b> تومان </div>' +
                                '</div>' +
                                '</div><br>' +
                                '</div>';
                        }
                        else {
                            var x = '<tr class="text-center">'+
                                '<td class="cart_product">'+value.title+'</td>'+
                                '<td class="cart_description">'+value.description+
//                                '<textarea class="form-control" disabled="">'+value.description+'</textarea>'+
                                '</td>' +
                                '<td id="unitPrice" content="'+value.price+'">'+formatNumber(value.price)+'</td>'+
                                '<td class="qty">'+value.count+
//                                '<input disabled="disabled" class="form-control input-sm" id="count" name="count" type="text" value="'+value.count+'">'+
//                                '<input disabled="disabled" class="form-control input-sm" id="count" name="count" type="text" value="'+value.count+'">'+
                                '</td>'+
                                '<td id="oldSum" content="'+value.sum+'">'+formatNumber(value.sum)+'</td>'+
                                '<td class="col-md-2">';
                                if(value.discount_volume != null)
                                    x+=value.discount_volume;
                                if(value.discount_volume == null)
                                x+= 'تخفیف ندارد';
                                x+='</td><td class="col-md-2">'+formatNumber(value.post_price)+'</td>'+
                                '<input type="hidden" name="basketId" value="'+value.basket_id+'">'+
                                '<input type="hidden" name="productId[]" value="'+value.id+'">'+
                                '</tr>' ;
//
//                                '<div class="col-md-6 pull-right">' +
//                                '<div class="location-address-wrap">' +
//                                '<h3 class="border_bottom yekan a-right"><b class="">نام محصول :</b>' + value.title + '</h3>' +
//                                '<div class="clearfix location-street a-right yekan"><b class="">توضیحات  :</b>' + value.description + '</div>' +
//                                '<div class="clearfix location-phone a-right yekan"><b class="">قیمت اصلی :</b>' + formatNumber(value.price) + ' تومان<br/>' +
//                                '<b class="">تعداد :</b>' + value.count + '</div>' +
//                                '<div class="clearfix location-cateringlink a-right yekan"><b class="">جمع کل  :</b>' + formatNumber(value.sum) +
//                                ' تومان </div>' +
//                                '</div>' +
//                                '</div>';
                        }
                        cartContent.append(x);
                    });
                }
            }
        });

            $.ajax({
                dataType: "json",
                url: "{{url('order')}}"+'/'+'orderDetail',
                cashe: false,
                type: "get",
                success: function (response) {
                    if(response!=0) {
                        $('#factorPrice').text(formatNumber(response.finalPrice));
                        $('#discountPrice').text(formatNumber(response.totalDiscount));
                        $('#totalPrice').text(formatNumber(response.total));
                        $('#postPrice').text(formatNumber(response.totalPostPrice));
                        $('[name="factorPrice"]').val(response.finalPrice);
                        $('[name="discountPrice"]').val(response.totalDiscount);
                        $('[name="totalPrice"]').val(response.total);
                        $('[name="postPrice"]').val(response.totalPostPrice);
                        $('[name="basketId"]').val(response.basketId);
                    }
                }
            });

    }
    //    $(document).ready(function () {
    $(".shopCart").click(function () {
        loadShopCart('#cartContent');//when menu clicked
    });
    $(".showOrders").click(function () {
        loadShopCart('#orderContent');//when menu clicked
    });
    loadShopCart('#cartContent');//when site loaded
    loadShopCart('#orderContent');//when site loaded
    //    });
</script>
<!-- below script is related to handle subFromCount  -->
<script>
    //$('.subFromCount').each(function () {
    {{--$('.subFromCount').on('click', function () {--}}
    {{--alert("111111");--}}
    {{--var productId = $(this).attr('content');--}}
    {{--var basketId = $(this).attr('name');--}}
    {{--var token = $('#token').val();--}}
    {{--var count = $(this).closest('td').find('input.input-sm').val();--}}
    {{--var unitPrice = $(this).closest('td').prev('td').attr('content');--}}
    {{--var td = $(this);--}}
    {{--$(td).css('pointer-events', 'none');--}}
    {{--$(td).css('color', '#adaaaa');--}}
    {{--if (count == 1) {--}}
    {{--swal({--}}
    {{--title: "",--}}
    {{--text: 'در صورتی که می خواهید کالایی را از سبد خرید حذف کنید می بایست دکمه حذف را بزنید',--}}
    {{--type: "warning",--}}
    {{--confirmButtonText: "بستن"--}}
    {{--});--}}
    {{--setTimeout(function () {--}}
    {{--$(td).css('pointer-events', '');--}}
    {{--}, 5000);--}}
    {{--return false;--}}
    {{--} else {--}}
    {{--$.ajax--}}
    {{--({--}}
    {{--url: "{{url('user/addOrSubCount')}}",--}}
    {{--type: "post",--}}
    {{--data: {'_token': token, 'productId': productId, 'basketId': basketId, 'parameter': 'subFromCount'},--}}
    {{--context: td,--}}
    {{--dataType: "json",--}}
    {{--success: function (response) {--}}

    {{--if (response.code == 1) {--}}

    {{--$(td).closest('td').find('input.input-sm').val(--count);--}}
    {{--var newCount = $(td).closest('td').find('input.input-sm').val();--}}
    {{--var sum = unitPrice * newCount;--}}
    {{--$(td).closest('td').next('td').text(formatNumber(sum) + 'تومان');--}}
    {{--basketTotalPrice();--}}
    {{--setTimeout(function () {--}}
    {{--$(td).css('pointer-events', '');--}}
    {{--$(td).css('color', '#666');--}}
    {{--}, 5000);--}}

    {{--}--}}
    {{--}, error: function (error) {--}}
    {{--console.log(error);--}}
    {{--}--}}
    {{--});--}}
    {{--}--}}
    {{--})--}}
    //})

</script>
<!-- below script is related to remove item from basket -->
<script>
    // removeBasketItem and update shop cart and total price
    // called by onclick
    function removeBasketItem(productId, basketId, price) {
        var orderTotal = $('#orderTotal');
        var orderTotalPrice = orderTotal.text();
        orderTotalPrice = orderTotalPrice.replace(',', '');
        orderTotalPrice = orderTotalPrice.replace(',', '');
        orderTotalPrice = orderTotalPrice.replace(',', '');
        orderTotalPrice = orderTotalPrice.replace(',', '');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax
        ({
            url: "{{url('user/removeItemFromBasket')}}",
            type: "post",
            data: {'productId': productId, 'basketId': basketId},
            dataType: "json",
            success: function (response) {
                if (response.code == 1) {
                    swal({
                        title: "",
                        text: response.message,
                        type: "success",
                        confirmButtonText: "بستن"
                    });
                    var t=formatNumber(orderTotalPrice - price)
                    if(t<0)
                    $('#orderTotal').text('0');
                    else
                    $('#orderTotal').text(t);
                    $('.basketItem-' + productId).remove();
                    basketCountNotify();

                } else {
                    swal({
                        title: "",
                        text: response.message,
                        type: "warning",
                        confirmButtonText: "بستن"
                    });
                }
            }

        });
    }
    //    sub from Product Count in basket cart and update essential tag ...total prices and count
    //    called by onclick
    function subFromProductCount(productId, basketId,price) {
        var orderTotal = $('#orderTotal');
        var orderTotalPrice = orderTotal.text();
        orderTotalPrice = orderTotalPrice.replace(',', '');
        orderTotalPrice = orderTotalPrice.replace(',', '');
        orderTotalPrice = orderTotalPrice.replace(',', '');
        orderTotalPrice = orderTotalPrice.replace(',', '');
        var totalCountTag=$('.totalProductCount-' + productId);
        var totalCount=totalCountTag.text();
        var totalPriceTag=$('.totalProductPrice-' + productId);
        var totalPrice=totalPriceTag.text();
        totalPrice = totalPrice.replace(',', '');
        totalPrice = totalPrice.replace(',', '');
        totalPrice = totalPrice.replace(',', '');
        totalPrice = totalPrice.replace(',', '');
        if (totalCount == 1) {
            swal({
                title: "",
                text: 'در صورتی که می خواهید کالایی را از سبد خرید حذف کنید می بایست دکمه حذف را بزنید',
                type: "warning",
                confirmButtonText: "بستن"
            });
            return false;
        } else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax
            ({
                url: "{{url('user/addOrSubCount')}}",
                type: "post",
                data: { 'productId': productId, 'basketId': basketId, 'parameter': 'subFromCount'},
                dataType: "json",
                success: function (response) {

                    if (response.code == 1) {
                        totalPriceTag.text(formatNumber(totalPrice - price));
                        $('#orderTotal').text(formatNumber(orderTotalPrice - price));
                        totalCountTag.text(totalCount-1);
                    }
                }, error: function (error) {
                   // console.log(error);
                }
            });
        }
    }
//    add To Product Count in basket cart and update essential tag ...total prices and count
//    called by onclick

    function addToProductCount(productId, basketId,price) {
        var orderTotal = $('#orderTotal');
        var orderTotalPrice = orderTotal.text();
        orderTotalPrice = orderTotalPrice.replace(',', '');
        orderTotalPrice = orderTotalPrice.replace(',', '');
        orderTotalPrice = orderTotalPrice.replace(',', '');
        orderTotalPrice = orderTotalPrice.replace(',', '');
        var totalCountTag=$('.totalProductCount-' + productId);
        var totalCount=totalCountTag.text();
        var totalPriceTag=$('.totalProductPrice-' + productId);
        var totalPrice=totalPriceTag.text();
        totalPrice = totalPrice.replace(',', '');
        totalPrice = totalPrice.replace(',', '');
        totalPrice = totalPrice.replace(',', '');
        totalPrice = totalPrice.replace(',', '');
         {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax
            ({
                url: "{{url('user/addOrSubCount')}}",
                type: "post",
                data: { 'productId': productId, 'basketId': basketId, 'parameter': 'addToCount'},
                dataType: "json",
                success: function (response) {

                    if (response.code == 1) {
                        totalPriceTag.text(formatNumber(parseInt(totalPrice) + parseInt(price)));
                        $('#orderTotal').text(formatNumber(parseInt(orderTotalPrice) + parseInt(price)));
                        totalCountTag.text(parseInt(totalCount)+1);
                    }
                }, error: function (error) {
                   // console.log(error);
                }
            });
        }
    }

</script>

<!-- below script is related to add order in data base -->
<script>
    $(document).on('click','#orderRegistration',function () {
        var formData = $('#orderDetailForm').serialize();
        var userCellphone    = $('#userCellphone').val();
        var userCoordination = $('#userCoordination').val();
        $.ajax
        ({
            url         : "{{url('user/orderRegistration')}}",
            type        : "post",
            data        : formData,
            dataType    : 'JSON',
            beforeSend  : function()
            {
                if(userCellphone == '' || userCellphone == null)
                {
                    $('#userCellphone').focus();
                    $('#userCellphone').css('border-color','red');
                    return false;
                }
                if(userCoordination == '' || userCoordination == null)
                {
                    $('#userCoordination').focus();
                    $('#userCoordination').css('border-color','red');
                    return false;
                }

            },
            success : function(response)
            {
                ///console.log(response);
                if(response.code == 1)
                {
                    swal
                    ({
                        title: "",
                        text: response.message +'\n' + response.userPassword,
                        type: "success",
                        confirmButtonText: "بستن"
                    });
//                    setTimeout(function(){
//                        window.location.href = '../login';
//                    },15000);
                }else
                {
                    swal
                    ({
                        title: "",
                        text: response.message,
                        type: "warning",
                        confirmButtonText: "بستن"
                    });
                }
            },
            error   : function(error)
            {
                if(error.status === 500)
                {
                    console.log(error);
                    swal
                    ({
                        title: "",
                        text: "خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید",
                        type: "warning",
                        confirmButtonText: "بستن"
                    });
                }
                if (error.status === 422) {

                    var errors = error.responseJSON; //this will get the errors response data.

                    var errorsHtml = '';

                    $.each(errors, function (key, value) {
                        errorsHtml += value[0] + '\n'; //showing only the first error.
                    });
                    //errorsHtml += errorsHtml;

                    swal({
                        title: "",
                        text: errorsHtml,
                        type: "warning",
                        confirmButtonText: "بستن"
                    });
                }
            }
        });
        $("[name='search_select']").change(function () {
            console.log($(this).val())
            $("#form_search").attr('action','{{url('search')}}/'+$(this).val())
        })
    })
</script>
{{--<script>--}}
    {{--$(function(){--}}
        {{--var basketCount = $('#basketCount').text();--}}
        {{--alert(basketCount);--}}
        {{--$('#showOrders').css('display','none');--}}
    {{--})--}}
{{--</script>--}}
<script src="{{ URL::asset('public/js/persianDatepicker.js')}}"></script>
<script src="{{url('public/js/sweetalert.min.js')}}"></script>

{{--persianDatepicker--}}
<script>
    $('#birth_date').persianDatepicker();
</script>
</body>
</html>