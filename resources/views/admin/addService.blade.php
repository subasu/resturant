@extends('layouts.adminLayout')
@section('content')
    <style>
        input, label {
            font-size: 15px;
        }
    </style>
    <div class="row">
        <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
            <div class="x_panel">
                <div class="x_title">
                    <h2> فرم ثبت سرویس
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                {{-- table --}}
                <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" id="serviceForm" dir="rtl">
                            {{ csrf_field() }}
                            <div class="item form-group">
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <button id="iconPicker" class="btn btn-default" data-placement="left"
                                            role="iconpicker" style="margin: 0 !important;"></button>
                                    <div class="col-md-9 col-sm-6 col-xs-12" style="padding: 0 !important;">
                                        <input id="icon-name-hidden" class="form-control" name="icon"
                                                type="hidden">
                                        <input id="icon-name" class="form-control required"
                                               type="text">
                                    </div>
                                </div>
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="icon"> آیکن : <span
                                            class="star" title="پر کردن این فیلد الزامی است">*</span>
                                </label>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <input id="title" class="form-control col-md-7 col-xs-12 required" name="title"
                                            type="text">
                                </div>
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="title"> عنوان : <span
                                            class="star" title="پر کردن این فیلد الزامی است">*</span>
                                </label>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <textarea id="description" class="form-control col-md-7 col-xs-12 required"
                                              name="description"
                                              ></textarea>
                                </div>
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="description"> توضیحات :
                                    <span class="star" title="پر کردن این فیلد الزامی است">*</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button id="sendInfo" type="button" class="col-md-8 col-sm-6 col-xs-1  btn btn-primary ">ثبت نهایی
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12"></div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                //when icon selector change the name of icon show in input text and input hidden
                $('#iconPicker').on('change', function (e) {
                    $("#icon-name").val(e.icon);
                    $("#icon-name-hidden").val(e.icon);
                });
                $("#sendInfo").click(function () {
                    var formData = new FormData($('#serviceForm')[0]);
                    console.log(formData);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{url('admin/addServicePost')}}",
                        type: 'post',
                        cache: false,
                        data: formData,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        beforeSend : function () {
                            var counter = 0;
                            $(".required").each(function() {
                                if ($(this).val() == "") {
                                    $(this).css("border-color" , "red");
                                    counter++;
                                }
                            });
                            if(counter > 0)
                            {
                                swal
                                ({
                                    title: '',
                                    text: 'لطفا تمامی فیلدها را پر نمایید سپس دکمه ثبت نهایی را بزنید',
                                    type:'warning',
                                    confirmButtonText: "بستن"
                                });
                                return false;
                            }
                        },
                        success: function (response) {
                            if(response.code == 'success')
                            {
                                swal({
                                    title: "",
                                    text: response.message,
                                    type: "success"
                                });
                                setTimeout(function(){window.location.reload(true)},3000);
                            }else
                                {
                                    swal({
                                        title: "",
                                        text: response.message,
                                        type: "warning"
                                    });
                                }

                        }, error: function (error) {
                            console.log(error);
                            swal({
                                title: "",
                                text: 'خطایی رخ داده است ، لطفا با بخش پشتیبانی تماس بگیرید',
                                type: "warning"
                            });
                        }
                    });
                });
            });
        </script>
@endsection