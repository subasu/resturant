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
    </style>
    <div class="clearfix"></div>
    <div class="row">
        <div class="container">
            @if(!empty($myLogo))
            <form class="form-horizontal form-label-left" id="addForm" enctype="multipart/form-data" style="direction: rtl !important;">
                {{ csrf_field() }}
                <div class="container">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>ویرایش لوگو سایت</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <div id="addPic">
                                <div class="col-md-12">
                                    <br/><br/><br/>
                                    <div class="col-md-6 col-sm-5 col-xs-9 col-md-offset-3 margin-1">
                                        <img class="col-md-6 col-md-offset-3 " src="{{url('public/dashboard/Logo')}}{{'/'.$myLogo->image_src}}">
                                        <label class="control-label col-md-3 col-sm-4 col-xs-3 margin-1" for="file">لوگو فعلی
                                            :
                                            <span class="star"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-6 col-sm-5 col-xs-9 col-md-offset-3 margin-1">
                                        <div class="col-md-9 col-xs-12">
                                        <input class="form-control  required"
                                               type="file" name="file[]" id="pic"/>
                                        </div>
                                        <label class="control-label col-md-3 col-sm-4 col-xs-3 margin-1" for="file"> لوگو:<span class="star"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-6 col-sm-5 col-xs-9 col-md-offset-3 margin-1">
                                        <div class="col-md-9 col-xs-12">
                                        <input class="form-control  required"
                                               name="title" id="title" value="{{$myLogo->title}}"/>
                                        </div>
                                        <label class="control-label col-md-3 col-sm-4 col-xs-3 margin-1" for="file">عنوان لوگو
                                            :
                                            <span class="star"></span>
                                        </label>
                                    </div>
                                </div>
                                <br/>

                            </div>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-dark col-md-6 col-md-offset-3" style="margin-top: 3%; margin-bottom: 3%;" id="reg"> ویرایش لوگو</button>
                            </div>
                        </div>
                    </div>

                </div>
                <input type="hidden" value="{{$myLogo->id}}" name="logoId">
            </form>
            @endif
        </div>

        <!-- send product form -->
        <script>
            $(document).on('click','#reg',function () {
                var data = new FormData($('#addForm')[0]);
                    $.ajax
                    ({
                        cache       : false,
                        url         : "{{url('admin/editLogoPost')}}",
                        type        : "post",
                        dataType    : "json",
                        contentType : false,
                        processData : false,
                        data        : data,
                        beforeSend  : function()
                        {
                            var counter = 0;
                            $(".required").each(function() {
                                    if ($(this).val() == "") {
                                        $(this).css("border-color" , "#8d0900");
                                        counter++;
                                    }
                                });
                                if(counter > 0)
                                {
                                    swal
                                    ({
                                        title: '',
                                        text: 'لطفا تمامی فیلدها را پر نمایید سپس دکمه ثبت تصاویر را بزنید',
                                        type:'warning',
                                        confirmButtonText: "بستن"
                                    });
                                    return false;
                                }
                        },
                        success    : function(response)
                        {
                                if(response.code == 'success')
                                {
                                    swal
                                    ({
                                        title: '',
                                        text: response.message,
                                        type:'success',
                                        confirmButtonText: "بستن"
                                    });
                                    setTimeout(function(){window.location.reload(true);},3000);
                                }else
                                    {
                                        swal
                                        ({
                                            title: '',
                                            text: response.message,
                                            type:'warning',
                                            confirmButtonText: "بستن"
                                        });
                                    }
                        },
                        error      : function(error)
                        {
                          console.log(error);
                            swal
                            ({
                                title: '',
                                text: 'خطایی رخ داده است لطفا با بخش پشتیبانی تماس بگیرید',
                                type:'warning',
                                confirmButtonText: "بستن"
                            });
                        }
                    });
            })
        </script>
        <!-- below script is related to remove input from change  -->

@endsection