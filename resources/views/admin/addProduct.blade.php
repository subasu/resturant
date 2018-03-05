@extends('layouts.adminLayout')
@section('content')
    <style>
        .star {
            color: #ff0000;
            float: right;
            padding-right: 4px;
            padding-left: 4px;
        }

        input, label {
            font-size: 15px;
        }

        .margin-1 {
            margin-top: 1%;
        }

        .margin-2 {
            margin-top: 2%;
        }

        .margin-bot-1 {
            margin-bottom: 1%;
        }

        .overflow-x {
            overflow-x: hidden;
        }

        .myColor {
            width: 13px;
            height: 13px;
            padding: 0 !important;
            margin: 0 !important;
            vertical-align: bottom;
            position: relative;
            top: 6px;
            float: right;
            left: 21px;
            *overflow: hidden;
        }

        .myLabel {
            display: block;
            padding-left: 15px;
            text-indent: -15px;
            float: right;
        }

        .float-right {
            float: right;
        }

        .padding-right-2 {
            padding-right: 2%;
        }
    </style>
    <!-- Include SmartWizard CSS -->
    <link href="{{url('public/dashboard/stepWizard/css/smart_wizard.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Optional SmartWizard theme -->
    <link href="{{url('public/dashboard/stepWizard/css/smart_wizard_theme_arrows.css')}}" rel="stylesheet"
          type="text/css"/>
    <div class="clearfix"></div>
    <div class="row">
        <div class="container">
            <form class="form-horizontal form-label-left" id="productForm" enctype="multipart/form-data"
                  style="direction: rtl !important;">
            {{ csrf_field() }}
            <!-- SmartWizard 1 html -->
                <div id="smartwizard">
                    <ul>
                        <li><a href="#step-1">اطلاعات اصلی محصول<br/>
                                <small><!-- This is step description --></small>
                            </a></li>
                        <li><a href="#step-2">اطلاعات تکمیلی محصول<br/>
                                <small></small>
                            </a></li>
                        {{--<li><a href="#step-3">قیمت / تخفیف / پیک<br/>--}}
                                {{--<small></small>--}}
                            {{--</a></li>--}}
                        <li><a href="#step-3"> تصاویر / ویدئو <br/>
                                <small></small>
                            </a></li>
                    </ul>
                    <div>
                        <div id="step-1" class="">
                            <br>
                            <div class="container">
                                <br>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <select id="categories" class="form-control col-md-12"
                                                name="categories">
                                        </select>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="title"> دسته ی اصلی :
                                        <span class="required star" title=" فیلد دسته بندی الزامی است">*</span>
                                    </label>
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1" id="subCategoriesDiv"
                                     style="display: none;">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <select id="subCategories" class="form-control col-md-12" name="subCategories">
                                        </select>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="title"> زیردسته های
                                        دسته
                                        فوق :
                                        <span class="required star" title=" فیلد دسته بندی الزامی است">*</span>
                                    </label>
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1" id="BrandsDiv" style="display: none;">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <select id="brands" class="form-control col-md-12" name="brands">
                                        </select>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="title"> زیردسته های
                                        دسته
                                        فوق :
                                        <span class="required star" title=" فیلد دسته بندی الزامی است">*</span>
                                    </label>
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1" id="">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <select id="oldProduct" class="form-control col-md-12">
                                        </select>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="title"> محصولات موجود
                                        در دسته :
                                    </label>
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="title" class="form-control col-md-12 col-xs-12" name="title">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="title"> نام محصول :
                                        <span class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                    </label>
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    {{--<div class="col-md-1" style="margin-left: 6.333333%;margin-right: 2%;"></div>--}}
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <textarea id="description" class="form-control col-md-12 col-xs-12 overflow-x"
                                                  name="description"></textarea>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="description"> توضیح
                                        محصول :
                                        <span class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                    </label>
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <select id="unit" class="form-control col-md-7 col-xs-12" name="unit_count">
                                        </select>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="unit"> واحد شمارش :
                                        <span class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                    </label>
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1 margin-bot-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="price" class="form-control col-md-12 col-xs-12 pr" name="price"
                                        >
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="price"> قیمت اصلی
                                        (تومان) :
                                        <span class="required star" title="پر کردن این فیلد الزامی است">*</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="step-2" class="">
                            <div class="container">

                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="sales_price" class="form-control col-md-12 col-xs-12 pr"
                                               name="sales_price" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="sales_price"> قیمت حراج
                                        (تومان):
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="special_price" class="form-control col-md-12 col-xs-12 pr"
                                               name="special_price">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="special_price"> قیمت
                                        ویژه (تومان):
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="wholesale_price" class="form-control col-md-12 col-xs-12 pr"
                                               name="wholesale_price" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="wholesale_price"> قیمت
                                        عمده (تومان):
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="free_price" class="form-control col-md-12 col-xs-12 pr"
                                               name="free_price" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="free_price"> قیمت
                                        زاپاس (تومان):
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <select id="activePrice" class="form-control col-md-12"
                                                name="activePrice">
                                            <option value="price">قیمت اصلی</option>
                                            <option value="sales_price">قیمت حراج</option>
                                            <option value="special_price">قیمت ویژه</option>
                                            <option value="wholesale_price">قیمت عمده</option>
                                            <option value="free_price">قیمت زاپاس</option>
                                        </select>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="color">انتخاب قیمت فعلی
                                        محصول :
                                    </label>
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <strong class="pull-right text-danger">
                                            وارد نکردن هزینه ی پست به منزله رایگان بودن هزینه ی پست این محصول تلقی خواهد
                                            شد.
                                        </strong>
                                        <input id="post_price" class="form-control col-md-12 col-xs-12 pr"
                                               name="post_price" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3 margin-2" for="post_price">
                                        هزینه ی
                                        پست (تومان):
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                </div>

                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="warehouse_count" class="form-control col-md-12 col-xs-12"
                                               name="warehouse_count" type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="warehouse_count"> تعداد
                                        موجود در
                                        انبار :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                </div>
                                <div class="col-md-10 col-md-offset-1 margin-1">
                                    <div class="col-md-7 col-sm-6 col-xs-9 col-md-offset-2">
                                        <input id="ready_time" class="form-control col-md-12 col-xs-12"
                                               name="ready_time"
                                               type="text">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="ready_time"> زمان آماده
                                        شدن بر حسب ساعت :
                                        <span class="required star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div id="step-3" class="">
                            <div class="container">
                                <div id="addPic">
                                    <div class="col-md-12 margin-1">
                                        <div class="col-md-1 col-sm-1 col-xs-1 col-md-offset-2">
                                            <a id="addInput" class="glyphicon glyphicon-plus btn btn-success"
                                               data-toggle=""
                                               title="افزودن تصویر"></a>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-9 ">
                                            <input class="form-control col-md-12 col-xs-12"
                                                   type="file" name="file[]" id="pic"/>
                                        </div>
                                        <label class="control-label col-md-2 col-sm-4 col-xs-3" for="file"> تصویر محصول
                                            :
                                            <span class="required star"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-10 ">
                                    <hr>
                                </div>
                                <div class="col-md-12 margin-bot-1">
                                    <div class="col-md-5 col-sm-6 col-xs-9 col-md-offset-3">
                                        <input class="form-control col-md-12 col-xs-12"
                                               type="file" name="video_src" id="video_src"/>
                                    </div>

                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="video_src"> ویدئوی
                                        محصول :
                                        <span class="required star"></span>
                                    </label>
                                </div>
                                <div class="col-md-12 col-md-offset-1 margin-1">
                                    <div class="col-md-5 col-sm-6 col-xs-9 col-md-offset-2">
                                        <select id="productModel" class="form-control col-md-7 col-xs-12" name="productModel">
                                        </select>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="productModel"> انتخاب حالت محصول :
                                    </label>
                                </div>
                                <div class="col-md-12 col-md-offset-1 margin-1 margin-bot-1">
                                    <div class="col-md-5 col-sm-6 col-xs-9 col-md-offset-2">
                                        <select id="productSizes" class="form-control col-md-7 col-xs-12" name="productSizes">
                                            <option disabled="" >ابتدا حالت مورد نظر را انتخاب نمائید</option>
                                        </select>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-4 col-xs-3" for="productSizes"> انتخاب اندازه :
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
            </form>
        </div>
        <!-- Include SmartWizard JavaScript source -->
        <script type="text/javascript"
                src="{{url('public/dashboard/stepWizard/js/jquery.smartWizard.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#productForm").submit(function (e) {
                    e.preventDefault();
                });
                // Toolbar extra buttons
                var btnFinish = $('<button></button>').text('ثبت محصول')
                    .addClass('btn btn-info')
                    .on('click', function () {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        });
                        var formData = new FormData($("#productForm")[0])
                        $.ajax({
                            url: '{{url('admin/addNewProduct')}}',
                            type: 'post',
                            cache: false,
                            data: formData,
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            success: function (data) {
                                console.log(data)
                                var x = '';
                                $.each(data, function (key, val) {
                                    x += val + '\n'
                                });
                                console.log(data.responseText)
                                swal({
                                    title: '',
                                    text: x,
                                    type: "info",
                                    confirmButtonText: "بستن"
                                });
                                if(data.data == 'محصول شما با مؤفقیت درج شد')
                                {
                                    setTimeout(function () {
                                        window.location.reload(true);
                                    }, 3000);
                                }


                            },
                            error: function (xhr) {
                                var x;
                                $.each(xhr, function (key, val) {
                                    x += val + '\n'
                                });
                                swal({
                                    title: '',
                                    text: xhr,
                                    type: "info",
                                })
                            }//error
                        })//ajax
                    });//onclick
                var btnCancel = $('<button></button>').text('شروع مجدد')
                    .addClass('btn btn-danger')
                    .on('click', function () {
//                        $('#smartwizard').smartWizard("reset");
                        //$('#productForm')[0].reset();
                        window.location.reload(true);
                    });
                $('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'arrows',
                    transitionEffect: 'fade',
                    showStepURLhash: false,
                    toolbarSettings: {
                        toolbarPosition: 'bottom',
                        toolbarExtraButtons: [btnFinish, btnCancel]
                    }
                });
                // External Button Events
                $("#reset-btn").on("click", function () {
                    // Reset wizard
                    $('#smartwizard').smartWizard("reset");
                    return true;
                });
                $("#prev-btn").on("click", function () {
                    // Navigate previous
                    $('#smartwizard').smartWizard("قبلی");
                    return true;
                });
                $("#next-btn").on("click", function () {
                    // Navigate next
                    $('#smartwizard').smartWizard("بعدی");
                    return true;
                });
                $(".sw-btn-next").text('بعدی');
                $(".sw-btn-prev").text('قبلی');
//
            });
        </script>
        <!-- send product form -->
        <script>
            $(document).ready(function () {
                //add input type file for add pic for product
                var counter = 0
                $('#addInput').on('click', function () {
                    if (counter < 3) {
                        $('#addPic').append
                        (
                            '<div class="col-md-12 margin-1">' +
                            '<div class="col-md-5 col-sm-6 col-xs-9 col-md-offset-3">' +
                            '<input class="form-control col-md-12 col-xs-12" type="file" name="file[]" id="file"/>' +
                            '</div>' +
                            '<label class="control-label col-md-2 col-sm-4 col-xs-3" for="pic"> تصویر محصول :' +
                            '<span class="required star"></span>' +
                            '</label></div>'
                        );
                        counter++;
                    }
                    else {
                    }
                });
                //load all main category in select box in addProductForm
                $.ajax({
                    cache: false,
                    url: "{{url('api/v1/getMainCategories')}}",
                    type: 'get',
                    dataType: "json",
                    success: function (response) {
                        if (response != 0) {
                            var responses = response;
                            var selectBoxId = "#categories";
                            var msgOpt1 = "لطفا دسته مورد نظر خود را انتخاب نمایید";
                            var msgOpt2 = "اگر دسته مورد نظر در این لیست وجود ندارد این گزینه را انتخاب نمایید";
                            var valueOption2 = "000";
                            loadItems(responses, selectBoxId, msgOpt1, msgOpt2, valueOption2)
                        }
                        else {
                           setTimeout(function(){location.href = '{{url("admin/addCategory")}}';},3000);
                        }
                    }
                });
                //load subCategories after ask do you want load it's sub Categories or no then load product title related selected category
                $('#categories').on("change", function () {
                    var id = $(this).val();
                    var depth = $(this).find("option:selected ").attr('depth');
                    if (id == 000) {
                        setTimeout(function(){location.href = '{{url("admin/addCategory")}}';},3000);
                    }
                    else if (depth != 0) {
                        swal({
                                title: '',
                                text: 'آیا میخواهید زیردسته های دسته ی منتخب را ببینید و محصول را در یکی از زیر دسته ها ذخیره کنید؟',
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "  #5cb85c",
                                cancelButtonText: "خیر",
                                confirmButtonText: "آری",
                                closeOnConfirm: true,
                                closeOnCancel: true
                            },
                            function (isConfirm) {
                                if (isConfirm) {
                                    //load all subCategory in select box in addProductForm
                                    $.ajax
                                    ({
                                        cache: false,
                                        url: "{{Url('api/v1/getSubCategories')}}/" + id,
                                        dataType: "json",
                                        type: "get",
                                        success: function (response) {
                                            var responses = response;
                                            var selectBoxId = '#subCategories';
                                            var msgOpt1 = "لطفا زیر دسته مورد نظر را انتخاب نمایید";
                                            var msgOpt2 = "اگر زیر دسته مورد نظر در این لیست وجود ندارد این گزینه انتخاب نمایید";
                                            var valueOption2 = "000";
                                            loadItems(responses, selectBoxId, msgOpt1, msgOpt2, valueOption2)
                                            $('#subCategoriesDiv').css('display', 'block');
                                            //hide brands selector parent div after change categories and empty it's selector
                                            $('#BrandsDiv').css('display', 'none');
                                            $('#brands').empty();
                                            findTitle(id)
                                        }
                                    });
                                }
                                else {//if user select 'خیر'
                                    $('#subCategoriesDiv').css('display', 'none');
                                    $('#subCategories').empty();
                                    //hide brands selector parent div after change categories and empty it's selector
                                    $('#BrandsDiv').css('display', 'none');
                                    $('#brands').empty();
                                    findTitle(id, 'method2')
                                }
                            });
                    }
                    else {
                        $('#subCategoriesDiv').css('display', 'none');
                        $('#BrandsDiv').css('display', 'none');
                        $('#subCategories').empty();
                        $('#brands').empty();
                        console.log('100');
                        findTitle(id,'method2')
                    }
                })

                //load brands after ask do you want load it's brands or no then load product title related selected subCategory
                $('#subCategories').on("change", function () {
                    var id = $(this).val();
                    var depth1 = $(this).find("option:selected ").attr('depth');
                    if (id == 000) {
                        setTimeout(function(){location.href = '{{url("admin/addCategory")}}';},3000);
                    }
                    else if (depth1 != 0) {
                        swal({
                                title: '',
                                text: 'آیا میخواهید زیردسته های دسته ی منتخب را ببینید و محصول را در یکی از برندها ذخیره کنید؟',
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "  #5cb85c",
                                cancelButtonText: "خیر",
                                confirmButtonText: "آری",
                                closeOnConfirm: true,
                                closeOnCancel: true
                            },
                            function (isConfirm) {
                                if (isConfirm) {
                                    //load all subCategory in select box in addProductForm
                                    $.ajax
                                    ({
                                        cache: false,
                                        url: "{{Url('api/v1/getBrands')}}/" + id,
                                        dataType: "json",
                                        type: "get",
                                        success: function (response) {
                                            var responses = response;
                                            var selectBoxId = '#brands';
                                            var msgOpt1 = "لطفا زیر دسته مورد نظر را انتخاب نمایید";
                                            var msgOpt2 = "اگر زیر دسته مورد نظر در این لیست وجود ندارد این گزینه انتخاب نمایید";
                                            var valueOption2 = "000";
                                            loadItems(responses, selectBoxId, msgOpt1, msgOpt2, valueOption2)
                                            $('#BrandsDiv').css('display', 'block');
                                            findTitle(id)
                                        }
                                    });
                                }
                                else {//if user select 'خیر'
                                    //hide brands selector parent div after change categories and empty it's selector
                                    $('#BrandsDiv').css('display', 'none');
                                    $('#brands').empty();
                                    findTitle(id, 'method2')
                                }
                            });
                    }
                    else {
                        $('#BrandsDiv').css('display', 'none');
                        $('#brands').empty();
                        findTitle(id, 'method2')
                    }
                });
                //check option 2 selected or not, if yes redirect to addCategory view
                $('#brands').on("change", function () {
                    var id = $(this).val();
                    if (id == 000) {
                        setTimeout(function(){location.href = '{{url("admin/addCategory")}}';},3000);
                    }
                    findTitle(id)
                });
                //check option 2 selected or not, if yes redirect to add unit view//in main unit select box
                $('#unit').on("change", function () {
                    var id = $(this).val();

                    if (id == 0) {
                        setTimeout(function(){location.href = '{{url("admin/addUnit")}}';},3000);
                    }
                });
                //check option 2 selected or not, if yes redirect to add unit //view in subunit select box
                $('#subunit').on("change", function () {
                    var id = $(this).val();

                    if (id == 0) {
                        setTimeout(function(){location.href = '{{url("admin/addUnit")}}';},3000);

                    }
                });
                //load MainUnitsCount if there is no category in table redirect addCategory
                $.ajax({
                    cache: false,
                    url: "{{Url('api/v1/getMainUnits')}}",
                    dataType: "json",
                    type: "get",
                    success: function (response) {
                        console.log(response);
                        if (response != 0) {
                            var responses = response;
                            var selectBoxId = '#unit';
                            var msgOpt1 = "لطفا واحد شمارش مورد نظر خود را انتخاب نمایید";
                            var msgOpt2 = "اگر واحد شمارش مورد نظر در این لیست وجود ندارد این گزینه انتخاب نمایید";
                            var valueOption2 = 0000;
                            loadItems(responses, selectBoxId, msgOpt1, msgOpt2, valueOption2)
                        }
                        else {
                            setTimeout(function(){location.href = '{{url("admin/addUnit")}}';},3000);
                        }
                    }
                });
                //load brands
                //id = 0000 it's for second option for redirect to add unit
                $('#unit').on("change", function () {
                    var id = $(this).val();
                    if (id == 0) {
                        setTimeout(function(){location.href = '{{url("admin/addUnit")}}';},3000);
                    }
                    else {
                        $.ajax
                        ({
                            cache: false,
                            url: "{{Url('api/v1/getSubunits')}}/" + id,
                            dataType: "json",
                            type: "get",
                            success: function (response) {
                                var responses = response;
                                var selectBoxId = '#subunit';
                                var msgOpt1 = "لطفا زیر واحد شمارش مورد نظر خود را انتخاب نمایید";
                                var msgOpt2 = "اگر زیر واحد شمارش مورد نظر در این لیست وجود ندارد این گزینه انتخاب نمایید";
                                var valueOption2 = 0;
                                loadItems(responses, selectBoxId, msgOpt1, msgOpt2, valueOption2)
                            }
                        });
                    }
                });
                //load product Models if there is no product Model in table redirect addModels
                $.ajax({
                    cache: false,
                    url: "{{Url('api/v1/getModels')}}",
                    dataType: "json",
                    type: "get",
                    success: function (response) {
                        console.log(response);
                        if (response != 0) {
                            var responses = response;
                            var selectBoxId = '#productModel';
                            var msgOpt1 = "لطفا حالت مورد نظر خود را انتخاب نمایید";
                            var msgOpt2 = "اگر حالت مورد نظر در این لیست وجود ندارد این گزینه انتخاب نمایید";
                            var valueOption2 = 0000;
                            loadItems(responses, selectBoxId, msgOpt1, msgOpt2, valueOption2)
                        }
                        else {
                            setTimeout(function(){location.href = '{{url("admin/addModels")}}';},1500);
                        }
                    }
                });
                $('#productSizes').on("change", function () {
                    var id = $(this).val();
                    if (id == 0) {
                        setTimeout(function(){location.href = '{{url("admin/addSizes")}}';},1500);
                    }
                    });
                $('#productModel').on("change", function () {
                    var id = $(this).val();
                    if (id == 0) {
                        setTimeout(function(){location.href = '{{url("admin/addModels")}}';},1500);
                    }
                    else {
                        $.ajax
                        ({
                            cache: false,
                            url: "{{Url('api/v1/getSizes')}}/" + id,
                            dataType: "json",
                            type: "get",
                            success: function (response) {
                                var responses = response;
                                var selectBoxId = '#productSizes';
                                var msgOpt1 = "لطفا اندازه مورد نظر خود را انتخاب نمایید";
                                var msgOpt2 = "اگر اندازه مورد نظر در این لیست وجود ندارد این گزینه انتخاب نمایید";
                                var valueOption2 = 0;
                                loadSizes(responses, selectBoxId, msgOpt1, msgOpt2, valueOption2)
                            }
                        });
                    }
                });
                //load sizes in select box
                function loadSizes(responses, selectBoxId, msgOption1, msgOption2, valueOption2) {
                    var item = $(selectBoxId);
                    item.empty();
                    item.append("<option selected='true' disabled='disabled'>" + msgOption1 + "</option>");
                    item.append("<option value='" + valueOption2 + "'>" + msgOption2 + "</option>");
                    console.log(responses);
                    $.each(responses, function (key, value) {
                        if(value.sideways!="")
                        item.append
                        ("<option value='" + value.id + "' > ضلع " + value.sideways + "</option>");
                        else if(value.width!="")
                        item.append
                        ("<option value='" + value.id + "' >" + value.width +" در "+ value.length + "</option>");
                        else if(value.diameter!="")
                        item.append
                        ("<option value='" + value.id + "' > قطر " + value.diameter + "</option>");
                    });
                }
                //load item in select box
                function loadItems(responses, selectBoxId, msgOption1, msgOption2, valueOption2) {
                    var item = $(selectBoxId);
                    item.empty();
                    item.append("<option selected='true' disabled='disabled'>" + msgOption1 + "</option>")
                    item.append("<option value='" + valueOption2 + "'>" + msgOption2 + "</option>")
                    $.each(responses, function (key, value) {
                        item.append
                        ("<option value='" + value.id + "' depth='" + value.depth + "'>" + value.title + "</option>");
                    });
                }

                //find categori's selected product title
                function findTitle(cid, method) {
                    if (method == "method2") {
                        $.ajax
                        ({
                            cache: false,
                            url: "{{url('api/v1/findCategoryProduct')}}",
                            dataType: "json",
                            type: "post",
                            data: {'id': cid, 'my_method': 2},
                            success: function (response) {
                                var item = $('#oldProduct');
                                item.empty();
                                if (response != 0) {
                                    $.each(response, function (key, value) {
                                        item.append("<option disabled='disabled' selected='selected'>" + value + "</option>");
                                    });
                                }
                                else {
                                    item.append("<option  selected='selected'>تا کنون برای این دسته محصولی ثبت نشده است</option>");
                                }
                            }
                        });
                    }
                    else {
                        $.ajax
                        ({
                            cache: false,
                            url: "{{url('api/v1/findCategoryProduct')}}",
                            dataType: "json",
                            type: "post",
                            data: {'id': cid, 'my_method': '1'},
                            success: function (response) {console.log(response);
                                var item = $('#oldProduct');
                                item.empty();
                                if (response != 0) {
                                    $.each(response, function (key, value) {
                                        item.append("<option disabled='disabled' selected='selected'>" + value + "</option>");
                                    });
                                }
                                else {
                                    item.append("<option  selected='selected'>تا کنون برای این دسته محصولی ثبت نشده است</option>");
                                }
                            }
                        });
                    }

                }//end find title of selected categories->we show title's product of this category to user that admin registered before
                function appendItem(divId, inputName, myUrl) {
                    $.ajax({
                        url: myUrl,
                        dataType: "json",
                        cache: false,
                        type: "get",
                        success: function (response) {
                            var item = $(divId);
                            item.empty();
                            $.each(response, function (key, value) {

                                item.append(
                                    '<div class="col-md-4 col-sm-6 col-xs-3 float-right">' +
                                    '<label class="myLabel">' +
                                    '<input class="form-control myColor" type="checkbox" name="' + inputName + '[]" value="' + value.id + '"/>'
                                    + value.title + '</label></div>')
                            });
                        }
                    })
                }

                appendItem("#color", "color", "{{url('api/v1/getModels')}}");
                appendItem("#size", "size", "{{url('api/v1/getSizes')}}");
            });
        </script>
        <script src="{{ URL::asset('public/js/persianDatepicker.js')}}"></script>
        {{--persianDatepicker--}}
        <script>
            $('#produce_date').persianDatepicker();
            $('#expire_date').persianDatepicker();
        </script>
        <script>
            $(function () {
                function formatNumber(num) {
                    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
                }

                $(".pr").on('keyup', function () {
                    var price = $(this);
                    var v0 = price.val();
                    var v1 = v0.split(',').join('');
                    var v2 = formatNumber(v1);
                    price.val(v2)
                })

            });
            //discount input length in add product nus not above 2 number(1% to 99%)
            $('input[name="discount"]').keypress(function() {
                if (this.value.length >= 2) {
                    return false;
                }
            });
        </script>
@endsection