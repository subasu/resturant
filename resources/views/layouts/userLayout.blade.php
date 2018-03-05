@if(Auth::user()->role_id!=3)
        <!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Site Meta Info -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="املاک آنلاین خمینی شهر">
    <meta name="keywords" content="املاک آنلاین خمینی شهر،خمینی شهر،املاک آنلاین،خرید و فروش آنلاین ملک،لیست املاک خمینی شهر،املاک خمینی شهر،مشاور املاک در خمینی شهر،مشاور املاک منظریه،مشاور املاک پاسدارن،مشاور املاک هفتصد دستگاه">
    <meta name="author" content="www.melkomalek.ir">
    <title>صفحه مورد نظر یافت نشد!</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('public/dashboard/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('public/dashboard/fonts/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('public/dashboard/css/animate.min.css')}}" rel="stylesheet">
    {{--My Style Code--}}
    <link href="{{ URL::asset('public/dashboard/css/mystyle.css')}}" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="{{ URL::asset('public/dashboard/css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/dashboard/css/maps/jquery-jvectormap-2.0.3.css')}}" />
    <link href="{{ URL::asset('public/dashboard/css/icheck/flat/green.css')}}" rel="stylesheet" />
    <link href="{{ URL::asset('public/dashboard/css/floatexamples.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{ URL::asset('public/js/jquery.min.js')}}"></script>
    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style> body {font-family:"Yekan" !important;}</style>
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

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section" style="margin-bottom:10px;">
                        <h3 style="font-size: 16px;color:white">پروفایل</h3>
                        <ul class="nav side-menu">
                            {{--//system manager menu--}}
                            <li><a><i class="fa f a-home"></i>پنل کاربر<span></span></a>
                            </li>
                            <li><a><i class="fa fa-cart-arrow-down"></i>ثبت سفارش و پیگیری سفارشات<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="{{url('user/addNewOrders')}}">ثبت سفارش جدید</a>
                                    </li>
                                    <li><a href="{{url('user/followOrders')}}">پیگیری سفارشات</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-print"></i>بررسی خریدها و فاکتورها<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="{{url('user/userOrders')}}">نمایش لیست خریدها</a>
                                    </li>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-key"></i>مدیرت رمز عبور<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="{{url('user/changePassword')}}">تغییر رمز عبور</a>
                                    </li>
                                    </li>
                                </ul>
                            </li>
                            {{--@endif--}}
                            {{--<li><a><i class="fa fa-handshake-o"></i>مدیریت وضعیتهای تحویل<span class="fa fa-chevron-down"></span></a>--}}
                                {{--<ul class="nav child_menu" style="display: none">--}}
                                    {{--<li><a href="{{url('admin/paymentTypesManagement')}}">  نمایش و مدیریت وضعیتهای تحویل</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="{{url('admin/addPaymentType')}}">افزودن وضعیت تحویل</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li><a><i class="fa fa-comments"></i> مدیریت نظرات<span class="fa fa-chevron-down"></span></a>--}}
                                {{--<ul class="nav child_menu" style="display: none">--}}
                                    {{--<li><a href="{{url('admin/systemManager')}}"> نمایش و مدیریت دسته بندی های پروژه</a>--}}
                                        {{--</li>--}}
                                    {{--<li><a href="{{url('systemManager')}}">درج دسته بندی جدید </a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                            {{--<li><a><i class="fa fa-star-half-full"></i> مدیریت امتیازات<span class="fa fa-chevron-down"></span></a>--}}
                                {{--<ul class="nav child_menu" style="display: none">--}}
                                    {{--<li><a href="{{url('systemManager')}}"> نمایش و مدیریت دسته بندی های پروژه</a>--}}
                                        {{--</li>--}}
                                    {{--<li><a href="{{url('systemManager')}}">درج دسته بندی جدید </a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}

                            <li><a href="{{url('/')}}"><i class="fa fa-laptop"></i>صفحه ی اصلی سایت</a>

                            </li>

                            {{--//End User menu--}}
                            {{-- end user dashboard menu --}}
                            <li><a style="background-color: rgba(231, 76, 60, 0.88)" href="{{url('/logout')}}"><i
                                            class="fa fa-sign-out"></i>خروج</a>
                            </li>

                        </ul>
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
                        <a id="makeBodySmall"><i class="fa fa-search-minus" data-toggle="" title="کوچک نمایی"></i></a>
                    </div>
                    <div class="nav toggle">
                        <a id="makeBodyLarg"><i class="fa fa-search-plus" data-toggle="" title="بزرگ نمایی"></i></a>
                    </div>
                    {{--<div class="" style="float: right;padding: 1% 2% 0 0 !important;">--}}
                    {{--<a id="back" class="btn btn-info">بازگشت به صفحه قبل</a>--}}
                    {{--</div>--}}

                    <?php /*
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                   aria-expanded="false">
                                <img src="{{url('public/dashboard/images/img.png')}}" alt="">
                                <span class=" fa fa-angle-down"></span>
                                </a>
                            <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                <li><a href="javascript:;"> مشخصات کاربری من</a>
                                </li>
                                <li>
                                    <a href="javascript:;">راهنما</a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>تنظیمات</span>
                                        </a>
                                </li>
                                <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out pull-right"></i> خروج</a>
                                </li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                                   aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                                </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                <li>
                                    <a>
                                        <span class="image">
                    <img src="{{URL::asset('public/dashboard/images/img.png')}}"
                             alt="Profile Image"/>
                    </span>
                                        <span>
                    <span>John Smith</span>
                    <span class="time">3 mins ago</span>
                    </span>
                                        <span class="message">
                    Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                                        </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image">
                    <img src="{{URL::asset('public/dashboard/images/img.png')}}"
                             alt="Profile Image"/>
                    </span>
                                        <span>
                    <span>John Smith</span>
                    <span class="time">3 mins ago</span>
                    </span>
                                        <span class="message">
                    Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                                        </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image">
                    <img src="{{URL::asset('public/dashboard/images/img.png')}}"
                             alt="Profile Image"/>
                    </span>
                                        <span>
                    <span>John Smith</span>
                    <span class="time">3 mins ago</span>
                    </span>
                                        <span class="message">
                    Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                                        </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image">
                    <img src="{{URL::asset('public/dashboard/images/img.png')}}"
                             alt="Profile Image"/>
                    </span>
                                        <span>
                    <span>John Smith</span>
                    <span class="time">3 mins ago</span>
                    </span>
                                        <span class="message">
                    Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                                        </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a href="inbox.html">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                            </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    */?>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
            <!-- top tiles -->
            <!-- /top tiles -->
            @yield('content')
        </div>
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


<!-- editor -->
<script>
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
<!-- below script is to handle zoom body -->
<script>
    $(document).on('click','#makeBodySmall',function(){
        $(document.body).css('zoom','100%');
    });

    $(document).on('click','#makeBodyLarg',function(){
        $(document.body).css('zoom','120%');
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

</body>
</html>
@endif