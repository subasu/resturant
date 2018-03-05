@if(Auth::user()->role_id!=1)
        <!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .margin
        {
            margin-left: 20%;
        }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Site Meta Info -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="فروشگاه اینترنتی">
    <meta name="keywords"
          content="فروشگاه اینترنتی">
    <meta name="author" content="">
    <title>صفحه مورد نظر یافت نشد!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href=""/>
    <link href="{{ URL::asset('public/dashboard/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('public/dashboard/iconPicker/css/bootstrap-iconpicker.min.css')}}" rel="stylesheet" />
    <link href="{{ URL::asset('public/dashboard/fonts/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('public/dashboard/css/animate.min.css')}}" rel="stylesheet">
    {{--My Style Code--}}
    <link href="{{ URL::asset('public/dashboard/css/mystyle.css')}}" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="{{ URL::asset('public/dashboard/css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/dashboard/css/maps/jquery-jvectormap-2.0.3.css')}}"/>
    <link href="{{ URL::asset('public/dashboard/css/icheck/flat/green.css')}}" rel="stylesheet"/>
    <link href="{{ URL::asset('public/dashboard/css/floatexamples.css')}}" rel="stylesheet" type="text/css"/>
    <script src="{{ URL::asset('public/js/jquery.min.js')}}"></script>
{{--<link href="fontawesome-iconpicker.min.css" rel="stylesheet">
--}}
    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style> body {
            font-family: "Yekan" !important;
        }</style>
</head>


<body class="nav-md">



<div class="container body">
    <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
            <div class="col-middle">
                <div class="text-center text-center">
                    <h1 class="error-number">404</h1>
                    <h1>متاسفانه صفحه مورد نظر یافت نشد</h1>
                    <br>
                    <h2><a href="{{url('/')}}">بازگشت به صفحه اصلی</a>
                    </h2>

                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
    <!-- footer content -->
</div>
<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
</body>
</html>
@else
    <!DOCTYPE html>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@if(!empty($pageTitle)){{$pageTitle}}@endif</title>
<link rel="short icon" href="{{URL::asset('public/main/assets/img/logo.png')}}"/>

<!-- Bootstrap core CSS -->

<link href="{{ URL::asset('public/dashboard/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('public/dashboard/fonts/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('public/dashboard/css/animate.min.css')}}" rel="stylesheet">
{{--My Style Code--}}
<link href="{{ URL::asset('public/dashboard/css/mystyle.css')}}" rel="stylesheet">

<!-- Custom styling plus plugins -->
<link href="{{ URL::asset('public/dashboard/css/custom.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css"
      href="{{ URL::asset('public/dashboard/css/maps/jquery-jvectormap-2.0.3.css')}}"/>
<link href="{{ URL::asset('public/dashboard/css/icheck/flat/green.css')}}" rel="stylesheet"/>
<link href="{{ URL::asset('public/dashboard/css/floatexamples.css')}}" rel="stylesheet" type="text/css"/>

<!-- editor -->
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
<link href="{{URL::asset('public/dashboard/css/editor/external/google-code-prettify/prettify.css')}}"
      rel="stylesheet">
<link href="{{URL::asset('public/dashboard/css/editor/index.css')}}" rel="stylesheet">

<!--Data table-->
<link href="{{ URL::asset('public/dashboard/js/datatables/jquery.dataTables.min.css')}}" rel="stylesheet"
      type="text/css"/>
<link href="{{ URL::asset('public/dashboard/js/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet"
      type="text/css"/>
<link href="{{ URL::asset('public/dashboard/js/datatables/fixedHeader.bootstrap.min.css')}}" rel="stylesheet"
      type="text/css"/>
<link href="{{ URL::asset('public/dashboard/js/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet"
      type="text/css"/>
<link href="{{ URL::asset('public/dashboard/js/datatables/scroller.bootstrap.min.css')}}" rel="stylesheet"
      type="text/css"/>


<!--End Data table-->

<link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/sweetalert.css')}}">

<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->

<script src="{{ URL::asset('public/dashboard/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('public/dashboard/js/nprogress.js')}}"></script>

<!--[if lt IE 9]>
<script src="../assets/js/ie8-responsive-file-warning.js"></script>
<![endif]-->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<?php //$user_info=\Illuminate\Support\Facades\Auth::user(); ?>
<input type="hidden" value="{{$user=\Illuminate\Support\Facades\Auth::user()}}">
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="{{URL::asset('public/dashboard/images/img.png')}}" alt="..."
                             class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        {{--<span>@if($user_info->is_supervisor==1)@if($user_info->unit_id!=4) مدیر @endif @endif{{$user->unit->description}}</span><br>--}}
                        {{--<h2>{{$user_info->title}} {{$user_info->name}} {{$user_info->family}}</h2>--}}
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog" dir="rtl" style="width : 700px; height: 700px; margin-left: 20%;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">مشاهده فیلم آموزشی</h2>
                            </div>
                            <div class="modal-body">
                                <video class="video"
                                       id="video" name="video_src">
                                    <source id="playingVideo"
                                            src="{{url('public/dashboard/trainingVideos/panel.mp4')}}">
                                </video>
                            </div>
                            <div class="modal-footer" >
                                <div class="nav toggle">
                                    <a id="playVideo"><i class="fa fa-play-circle margin" data-toggle="" title="پخش ویدئو آموزشی"></i></a>
                                </div>
                                <div class="nav toggle">
                                    <a id="pauseVideo"><i class="fa fa-pause-circle margin" data-toggle="" title="توقف ویدئو آموزشی"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- sidebar menu -->
                <div id="newModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                {{--<button type="button" class="close" data-dismiss="modal" style="font-size: 20px;">&times;</button>--}}
                                <h1 class="modal-title text-center">پیام انتظار</h1>
                            </div>
                            <div class="modal-body text-center">
                                <h3 >لطفا منتظر بمانید ، در صورتی که قبلا موردی را درج کرده باشید یا به صفحه مدیریت و یا به صفحه ویرایش مربوط به همین صفحه منتقل  خواهید شد</h3>
                            </div>
                            {{--<div class="modal-footer" >--}}
                                {{--<button type="button" class="btn btn-dark col-md-6 col-md-offset-3" data-dismiss="modal">بستن</button>--}}
                                {{--</div>--}}
                        </div>

                    </div>
                </div>


                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section" style="margin-bottom:10px;">
                        <h3 style="font-size: 16px;color:white">پروفایل</h3>
                        <ul class="nav side-menu">
                            {{--//system manager menu--}}
                            <li><a></a>
                            </li>
                            <li><a><i class="fa fa-product-hunt"></i> مدیریت محصولات<span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="{{url('admin/productsManagement')}}"> نمایش و مدیریت محصولات</a>
                                    </li>
                                    <li><a href="{{url('admin/addProduct')}}">درج محصول جدید </a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-object-group"></i> مدیریت دسته بندی ها<span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="{{url('admin/categoriesManagement')}}"> نمایش و مدیریت دسته بندی ها</a>
                                    </li>
                                    <li><a href="{{url('admin/addCategory')}}">درج دسته بندی جدید </a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-th-list"></i> مدیریت واحد های شمارش<span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="{{url('admin/unitCountManagement')}}"> نمایش و مدیریت واحد های
                                            شمارش</a>
                                    </li>
                                    <li><a href="{{url('admin/addUnit')}}">درج واحد های شمارش جدید </a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-expand"></i>مدیریت حالت ها و اندازه ها<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    {{--<li><a href="{{url('admin/sizesManagement')}}"> نمایش و مدیریت اندازه ها</a></li>--}}
                                    <li><a href="{{url('admin/addSizes')}}">افزودن  اندازه ها</a></li>
                                    <li><a href="{{url('admin/modelsManagement')}}"> نمایش و مدیریت حالت ها </a></li>
                                    <li><a href="{{url('admin/addModels')}}">افزودن حالت ها</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-dollar"></i>مدیریت وضعیتهای پرداخت<span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="{{url('admin/paymentTypesManagement')}}"> نمایش و مدیریت وضعیتهای
                                            پرداخت</a>
                                    </li>
                                    <li><a href="{{url('admin/addPaymentType')}}">افزودن وضعیت پرداخت</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-print"></i>بررسی سفارش ها و فاکتورها<span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="{{url('admin/newOrders')}}">سفارشات</a></li>
                                    <li><a href="{{url('admin/ordersManagement')}}">خرید ها</a></li>
                                    <li><a href="{{url('admin/oldOrders')}}">سفارش های پیگیری شده</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-photo"></i>مدیریت اسلایدشو و لوگو سایت<span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="{{url('admin/addSlider')}}">درج تصاویر اسلایدشو </a>
                                    </li>
                                    <li><a href="{{url('admin/sliderManagement')}}">ویرایش و مدیریت تصاویر اسلایدشو</a>
                                    </li>
                                    <li><a href="{{url('admin/addLogo')}}">درج لوگو سایت </a>
                                    </li>
                                    <li><a href="{{url('admin/editLogo')}}">ویرایش و مدیریت لوگوی سایت</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-cog"></i>مدیریت سرویس های سایت<span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="{{url('admin/addService')}}">درج سرویس های سایت</a>
                                    </li>
                                    <li><a href="{{url('admin/ServicesManagement')}}">ویرایش سرویس های سایت</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-info-circle"></i>مدیریت درباره ی ما <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="{{url('admin/addAboutUs')}}">درج درباره ی ما</a>
                                    </li>
                                    <li><a href="{{url('admin/editAboutUs')}}">ویرایش درباره ی ما</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-map-marker"></i>مدیریت نقشه گوگل<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="{{url('admin/addGoogleMap')}}">درج نقشه گوگل</a>
                                    </li>
                                    <li><a href="{{url('admin/editGoogleMap')}}">ویرایش و مدیریت نقشه گوگل</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="{{url('/')}}"><i class="fa fa-laptop"></i>صفحه ی اصلی سایت</a>
                            </li>
                            <li><a style="background-color: rgba(231, 76, 60, 0.88)" href="{{url('/logout')}}"><i
                                            class="fa fa-sign-out"></i>خروج</a>
                            </li>

                        </ul>
                        <audio id="audio" controls style="display: none;">
                            <source src="{{url('public/dashboard/mp3/alarm.mp3')}}" type="audio/mpeg">

                        </audio>
                    </div>
                </div>
                <!-- /sidebar menu -->
                <!-- /menu footer buttons -->
            <?php /*
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="تنظیمات">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                    <a data-toggle="tooltip" data-placement="top" title="بزرگ کردن صفحه">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                    <a data-toggle="tooltip" data-placement="top" title="قفل کردن">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                    <a data-toggle="tooltip" data-placement="top" title="خروج">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                </div>
*/?>
            <!-- /menu footer buttons -->
            </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <div class="nav toggle">
                    </div>
                    <div class="nav toggle">

                    </div>
                    <div class="nav toggle">

                    </div>
                    <div class="nav toggle">

                    </div>
                    <div class="nav toggle">
                        <a id="showVideo"><button class="btn btn-dark col-md-offset-12" data-toggle="" title="">پخش ویدئو آموزشی</button></a>
                    </div>
                </nav>
            </div>
            <input type="hidden" id="token" value="{{csrf_token()}}">

        </div>
        <video  class="col-md-12"  style=" display: none;"
                 id="video1" name="video_src">
            <source id="playingVideo1" src="">
        </video>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
            <!-- top tiles -->
            <!-- /top tiles -->
            @yield('content')
        </div>
        {{--<br/><br/><br/><br/>--}}
        {{--<div align="center" dir="rtl">--}}
            {{--<h1 class="col-md-10 col-md-offset-4">درود خدمت شما کاربر گرامی </h1>--}}
            {{--<br/><br/><br/><br/>--}}
            {{--<h3 class="col-md-10 col-md-offset-1 text-justify text-right">در صورت مواجه شدن با هرگونه مشکل در خصوص عملکرد پنل مدیریت و یا مواجه شدن مشکل در خصوص کار با پنل مدیریت میتوانید با شماره تلفن درج شده در زیر که مربوط به  بخش پشتیبانی شرکت مهندسی آرتان است ، تماس بگیرید</h3>--}}
            {{--<br/><br/><br/><br/>--}}
            {{--<h3 class="col-md-10 col-md-offset-1 text-right">شماره تلفن تماس :  03133376496 </h3>--}}
        {{--</div>--}}

        <!-- footer content -->
        <footer>
            <div class="copyright-info">
                <p class="text-center"><a href="#"> کلیه حقوق این پورتال متعلق به شرکت آرتان می باشد</a>
                </p>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
    <!-- /page content -->
</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<script src="{{ URL::asset('public/dashboard/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('public/dashboard/js/nicescroll/jquery.nicescroll.min.js')}}"></script>

<!-- bootstrap progress js -->
<script src="{{ URL::asset('public/dashboard/js/progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- icheck -->
<script src="{{ URL::asset('public/dashboard/js/icheck/icheck.min.js')}}"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="{{ URL::asset('public/dashboard/js/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('public/dashboard/js/datepicker/daterangepicker.js')}}"></script>
<!-- chart js -->
<script src="{{ URL::asset('public/dashboard/js/chartjs/chart.min.js')}}"></script>
<!-- sparkline -->
<script src="{{ URL::asset('public/dashboard/js/sparkline/jquery.sparkline.min.js')}}"></script>

<script src="{{URL::asset('public/js/sweetalert.min.js')}}"></script>
<script src="{{ URL::asset('public/js/serviceRequest.js')}}"></script>
{{--
<script src="{{ URL::asset('public/js/serviceShowDetails.js')}}"></script>
--}}
<script src="{{ URL::asset('public/dashboard/js/custom.js')}}"></script>

<!-- image cropping -->
<script src="{{ URL::asset('public/dashboard/js/cropping/cropper.min.js')}}"></script>
<script src="{{ URL::asset('public/dashboard/js/cropping/main.js')}}"></script>

<!-- flot js -->
<!--[if lte IE 8]>
<script type="text/javascript" src="{{ URL::asset('public/dashboard/js/excanvas.min.js')}}"></script><![endif]-->
<script type="text/javascript" src="{{ URL::asset('public/dashboard/js/flot/jquery.flot.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('public/dashboard/js/flot/jquery.flot.pie.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('public/dashboard/js/flot/jquery.flot.orderBars.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('public/dashboard/js/flot/jquery.flot.time.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('public/dashboard/js/flot/date.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('public/dashboard/js/flot/jquery.flot.spline.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('public/dashboard/js/flot/jquery.flot.stack.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('public/dashboard/js/flot/curvedLines.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('public/dashboard/js/flot/jquery.flot.resize.js')}}"></script>
{{--
<script src="{{ URL::asset('public/js/kianfar.js')}}"></script>
--}}

{{--My Jqyert Code--}}
<script type="text/javascript" src="{{ URL::asset('public/dashboard/js/myCode.js')}}"></script>
<!-- Datatables-->
<script src="{{ URL::asset('public/dashboard/js/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('public/dashboard/js/datatables/dataTables.bootstrap.js')}}"></script>
<script src="{{ URL::asset('public/dashboard/js/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{ URL::asset('public/dashboard/js/datatables/buttons.bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('public/dashboard/js/datatables/jszip.min.js')}}"></script>
<script src="{{ URL::asset('public/dashboard/js/datatables/pdfmake.min.js')}}"></script>
<script src="{{ URL::asset('public/dashboard/js/datatables/vfs_fonts.js')}}"></script>
<script src="{{ URL::asset('public/dashboard/js/datatables/buttons.html5.min.js')}}"></script>
<script src="{{ URL::asset('public/dashboard/js/datatables/buttons.print.min.js')}}"></script>
<script src="{{ URL::asset('public/dashboard/js/datatables/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{ URL::asset('public/dashboard/js/datatables/dataTables.keyTable.min.js')}}"></script>
<script src="{{ URL::asset('public/dashboard/js/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{ URL::asset('public/dashboard/js/datatables/responsive.bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('public/dashboard/js/datatables/dataTables.scroller.min.js')}}"></script>
<link rel="stylesheet" href="{{URL::asset('public/css/persianDatepicker-default.css')}}"/>

{{--<script type="text/javascript">--}}
{{--$(document).ready(function () {--}}
{{--$('#datatable').dataTable();--}}
{{--$('#datatable-keytable').DataTable({--}}
{{--keys: true--}}
{{--});--}}
{{--$('#datatable-responsive').DataTable();--}}
{{--$('#datatable-scroller').DataTable({--}}
{{--ajax: "{{URL::asset('public/dashboard/js/datatables/json/scroller-demo.json')}}",--}}
{{--deferRender: true,--}}
{{--scrollY: 380,--}}
{{--scrollCollapse: true,--}}
{{--scroller: true--}}
{{--});--}}
{{--var table = $('#datatable-fixed-header').DataTable({--}}
{{--fixedHeader: true--}}
{{--});--}}
{{--});--}}
{{--TableManageButtons.init();--}}
{{--</script>--}}
<!-- pace -->
<script src="{{ URL::asset('public/dashboard/js/pace/pace.min.js')}}"></script>
{{--User passChange--}}
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            "pageLength": 10,
            initComplete: function () {
                this.api().columns([0, 1, 3, 4]).every(function () {
                    var column = this;
                    var select = $('<select><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });
                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            }
        });
    });
</script>
<script src="{{URL::asset('public/dashboard/js/dropzone/dropzone.js')}}"></script>
<!-- PNotify -->
<script type="text/javascript" src="{{ URL::asset('public/dashboard/js/notify/pnotify.core.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('public/dashboard/js/notify/pnotify.buttons.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('public/dashboard/js/notify/pnotify.nonblock.js')}}"></script>
<!-- richtext editor -->
<script src="{{URL::asset('public/dashboard/js/editor/bootstrap-wysiwyg.js')}}"></script>
<script src="{{URL::asset('public/dashboard/js/editor/external/jquery.hotkeys.js')}}"></script>
<script src="{{URL::asset('public/dashboard/js/editor/external/google-code-prettify/prettify.js')}}"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<!-- (Optional) Latest compiled and minified JavaScript translation files -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>--}}
<!-- Bootstrap-Iconpicker Iconset -->
<script type="text/javascript" src="{{URL::asset('public/dashboard/iconPicker/js/bootstrap-iconpicker-iconset-all.min.js')}}"></script>
<!-- Bootstrap-Iconpicker -->
<script type="text/javascript" src="{{URL::asset('public/dashboard/iconPicker/js/bootstrap-iconpicker.min.js')}}"></script>
{{--icon picker plugin--}}
<!-- editor -->
<script>
    $('#convert').iconpicker({
        iconset: 'fontawesome',
        icon: 'fa-key',
        rows: 5,
        cols: 5,
        placement: 'top',
    });
    $(document).ready(function () {
        $('.xcxc').click(function () {
            $('#descr').val($('#editor').html());
        });
    });
    $(function () {
        function initToolbarBootstrapBindings() {
            var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                    'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                    'Times New Roman', 'Verdana'
                ],
                fontTarget = $('[title=Font]').siblings('.dropdown-menu');
            $.each(fonts, function (idx, fontName) {
                fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
            });
            $('a[title]').tooltip({
                container: 'body'
            });
            $('.dropdown-menu input').click(function () {
                return false;
            })
                .change(function () {
                    $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                })
                .keydown('esc', function () {
                    this.value = '';
                    $(this).change();
                });
            $('[data-role=magic-overlay]').each(function () {
                var overlay = $(this),
                    target = $(overlay.data('target'));
                overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
            });
            if ("onwebkitspeechchange" in document.createElement("input")) {
                var editorOffset = $('#editor').offset();
                $('#voiceBtn').css('position', 'absolute').offset({
                    top: editorOffset.top,
                    left: editorOffset.left + $('#editor').innerWidth() - 35
                });
            } else {
                $('#voiceBtn').hide();
            }
        };
        function showErrorAlert(reason, detail) {
            var msg = '';
            if (reason === 'unsupported-file-type') {
                msg = "Unsupported format " + detail;
            } else {
                console.log("error uploading file", reason, detail);
            }
            $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
        };
        initToolbarBootstrapBindings();
        $('#editor').wysiwyg({
            fileUploadError: showErrorAlert
        });
        window.prettyPrint && prettyPrint();
    });
</script>
<!-- /editor -->
{{--<script>--}}
{{--// initialize the validator function--}}
{{--validator.message['date'] = 'not a real date';--}}
{{--// validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':--}}
{{--$('form')--}}
{{--.on('blur', 'input[required], input.optional, select.required', validator.checkField)--}}
{{--.on('change', 'select.required', validator.checkField)--}}
{{--.on('keypress', 'input[required][pattern]', validator.keypress);--}}
{{--$('.multi.required')--}}
{{--.on('keyup blur', 'input', function () {--}}
{{--validator.checkField.apply($(this).siblings().last()[0]);--}}
{{--});--}}
{{--// bind the validation to the form submit event--}}
{{--//$('#send').click('submit');//.prop('disabled', true);--}}
{{--$('form').submit(function (e) {--}}
{{--e.preventDefault();--}}
{{--var submit = true;--}}
{{--// evaluate the form using generic validaing--}}
{{--if (!validator.checkAll($(this))) {--}}
{{--submit = false;--}}
{{--}--}}
{{--if (submit)--}}
{{--this.submit();--}}
{{--return false;--}}
{{--});--}}
{{--/* FOR DEMO ONLY */--}}
{{--$('#vfields').change(function () {--}}
{{--$('form').toggleClass('mode2');--}}
{{--}).prop('checked', false);--}}
{{--$('#alerts').change(function () {--}}
{{--validator.defaults.alerts = (this.checked) ? false : true;--}}
{{--if (this.checked)--}}
{{--$('form .alert').remove();--}}
{{--}).prop('checked', false);--}}
{{--</script>--}}
<script>
    NProgress.done();
</script>
<!-- /datepicker -->
<!-- /footer content -->
<script>
    $(document).ready(function () {
        $('#back').click(function () {
            window.history.back();
        });
    });
</script>

{{--<script>--}}
{{--$(document).ready(function(){--}}
{{--setInterval(function(){--}}

{{--$.ajax--}}
{{--({--}}
{{--url      : "{{url('admin/checkOrders')}}",--}}
{{--type     : "get",--}}
{{--dataType : "JSON",--}}
{{--success : function(response)--}}
{{--{--}}
{{--if(response.data > 0)--}}
{{--{--}}
{{--window.open('adminShowFactor/'+response.data);--}}
{{--}--}}
{{--},error:function (error) {--}}
{{--console.log(error);--}}
{{--}--}}
{{--})--}}

{{--},1000);--}}
{{--})--}}
{{--</script>--}}
<!-- below function is related to refresh page for every 30 seconds -->
<script>
    $(function () {
        setInterval(function () {
            $.ajax
            ({
                cache: false,
                url: "{{url('admin/checkOrderStatus')}}",
                type: "get",
                dataType: "json",
                success: function (response) {
                    if (response.message == 'exist') {
                        console.log('new order...');
                        var audio = document.getElementById('audio');
                        audio.autoplay = true;
                        audio.load();
//                        setTimeout(function(){
//                            window.location.replace('ordersManagement');
//                        },10000);
                    } else {
                        console.log('nothing new');
                    }
                }, error: function (error) {
//                    console.log(error.responseText);
                    console.log(error);
                }
            })
        }, 10000);
    })
</script>
<!-- below script is to handle zoom body -->
<script>
    $(document).on('click','#makeBodySmall',function(){
       $(document.body).css('zoom','100%');
    });

    $(document).on('click','#makeBodyLarg',function(){
        $(document.body).css('zoom','120%');
    });
</script>
<script>

    $(document).on('click', '#playVideo', function () {

        var video = document.getElementById('video');
        if (video != null) {
            video.play();
            $(this).hide();
            $('#pauseVideo').show();
        }

    })
    $(document).on('click', '#pauseVideo', function () {
        $(this).hide();
        $('#playVideo').show();
        var video = document.getElementById('video');
        video.pause();
    })

</script>
<script>
//    $(document).on('click','#videoModal',function(){
//        $('#myModal').modal('show');
////        var video1 = document.getElementById('video1');
////        $('#video1').css('display','block');
////        video1.play();
//    })
</script>

<script>
    $(function(){
       var path = window.location.pathname;
        var absolutePath  = path.split('/');
        var pageName  = absolutePath[absolutePath.length-1];
        var token     = $('#token').val();

            if(pageName == 'addGoogleMap' || pageName == 'addAboutUs'  ||  pageName == 'addLogo' || pageName == 'addSlider')
            {
                 $.ajax
                 ({
                     url      : "{{url('admin/pageHandle')}}",
                     type     : "post",
                     dataType : "json",
                     data     : {'pageName' : pageName , '_token' : token},
                     success  : function(response)
                     {


                         if(response.code == 'success')
                         {
                             $('#newModal').modal('show');
                             setTimeout(function () {
                                 switch  (pageName)
                                 {
                                     case 'addGoogleMap':
                                         window.location.href = 'editGoogleMap';
                                         break;

                                     case 'addAboutUs':
                                         window.location.href = 'editAboutUs';
                                         break;

//                                     case 'addService':
//                                         window.location.href = 'ServicesManagement';
//                                         break;

                                     case 'addLogo':
                                         window.location.href = 'editLogo';
                                         break;

                                     case 'addSlider':
                                         window.location.href = 'sliderManagement';
                                         break;
                                 }
                             },6000);

                         }
                     },
                     error   : function(error)
                     {
                         console.log(error.status);
                     }
                 })
            }
    })
</script>

<script>
       $(document).on('click','#showVideo',function(){
           var path = window.location.pathname;
           var absolutePath  = path.split('/');
           var len = absolutePath.length;
           var pageName  = absolutePath[absolutePath.length-1];

           if(len > 4)
           {
               swal({
                   title: "",
                   text: "فیلم آموزشی این صفحه انتهای فیلم آموزشی صفحه قبل میباشد",
                   type: "info",
                   confirmButtonText: "بستن"
               });
               return false;
           }

           if(pageName == 'panel')
           {
               window.location.href = 'admin/videoHandler/'+pageName;
           }else
               {
                   window.location.href = 'videoHandler/'+pageName;
               }

       })
</script>

</body>
</html>
@endif