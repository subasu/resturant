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

            <form class="form-horizontal form-label-left" id="sliderForm" enctype="multipart/form-data" style="direction: rtl !important;">
                {{ csrf_field() }}

                <div class="container">
                    {{--<div class="col-md-1 col-sm-1 col-xs-1 ">--}}
                        {{--<a id="addInput" class="glyphicon glyphicon-plus btn btn-success"--}}
                           {{--data-toggle=""--}}
                           {{--title="افزودن فیلد"></a>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-1 col-sm-1 col-xs-1">--}}
                        {{--<a id="removeInput" class="glyphicon glyphicon-remove btn btn-danger" data-toggle="" title="حذف فیلد"></a>--}}
                    {{--</div>--}}
                    <div id="addPic">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2> فرم درج تصاویر اسلایدر</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div id="child" class="col-md-12">

                                <div class="col-md-4 col-sm-6 col-xs-9 col-md-offset-1 ">
                                    <input class="form-control col-md-12 col-xs-12 required"
                                           type="file" name="file[]" id="pic"/>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-9 ">
                                    <input class="form-control col-md-12 col-xs-12 required"
                                           name="title[]" id="title"/>
                                </div>
                                <label class="control-label col-md-2 col-sm-4 col-xs-3" for="file">عنوان تصویر
                                    :
                                    <span class="star"></span>
                                </label>
                            </div>
                            <br/><br/><br/>
                            <div id="child" class="col-md-12">

                                <div class="col-md-4 col-sm-6 col-xs-9 col-md-offset-1 ">
                                    <input class="form-control col-md-12 col-xs-12 required"
                                           type="file" name="file[]" id="pic"/>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-9 ">
                                    <input class="form-control col-md-12 col-xs-12 required"
                                           name="title[]" id="title"/>
                                </div>
                                <label class="control-label col-md-2 col-sm-4 col-xs-3" for="file">عنوان تصویر
                                    :
                                    <span class="star"></span>
                                </label>
                            </div>
                            <br/><br/><br/>
                            <div id="child" class="col-md-12">

                                <div class="col-md-4 col-sm-6 col-xs-9 col-md-offset-1 ">
                                    <input class="form-control col-md-12 col-xs-12 required"
                                           type="file" name="file[]" id="pic"/>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-9 ">
                                    <input class="form-control col-md-12 col-xs-12 required"
                                           name="title[]" id="title"/>
                                </div>
                                <label class="control-label col-md-2 col-sm-4 col-xs-3" for="file">عنوان تصویر
                                    :
                                    <span class="star"></span>
                                </label>
                            </div>
                            <br/><br/><br/>
                            <div id="child" class="col-md-12">

                                <div class="col-md-4 col-sm-6 col-xs-9 col-md-offset-1 ">
                                    <input class="form-control col-md-12 col-xs-12 required"
                                           type="file" name="file[]" id="pic"/>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-9 ">
                                    <input class="form-control col-md-12 col-xs-12 required"
                                           name="title[]" id="title"/>
                                </div>
                                <label class="control-label col-md-2 col-sm-4 col-xs-3" for="file">عنوان تصویر
                                    :
                                    <span class="star"></span>
                                </label>
                            </div>
                            <div class="col-md-12 ">
                                <button type="button" class="btn btn-dark col-md-6 col-md-offset-2" style="margin-top: 3%; margin-bottom: 3%;" id="reg"> ثبت تصویر یا تصاویر اسلایدر</button>
                                <input type="hidden"  id="counter" value="1">
                            </div>
                        </div>
                        <br/>

                        </div>

                </div>
            </form>
        </div>

        <!-- send product form -->
        <script>
            $(document).ready(function () {
                //add input type file for add pic for product

                $('#addInput').on('click', function () {
                    var counter = $('#counter').val();
                    //setTimeout(function () {$(this).prop('disabled');});
                    if (counter < 10) {
                        $('#addPic').append
                        (
                        '<div id="child" class="col-md-10">' +
                            '<div class="col-md-4 col-sm-6 col-xs-9 col-md-offset-2">' +
                            '<input class="form-control col-md-12 col-xs-12 required" type="file" name="file[]" id="file"/>' +
                            '</div>' +
                            '<div class="col-md-4 col-sm-6 col-xs-9">'+
                            '<input class="form-control col-md-12 col-xs-12 required" name="title[]" id="title"/>'+
                            '</div>'+
                            '<label class="control-label col-md-2 col-sm-4 col-xs-3" for="file">عنوان تصویر:'+
                            '<span class="star"></span>'+
                            '</label>'+
                        '</div>'
                    );
                        counter++;
                        $('#counter').val(counter);
                    }
                    else
                        {
                            swal
                            ({
                                title: '',
                                text: 'نمی توانید بیش از 10 تصویر برای اسلایدرها در نظر بگیرید',
                                type:'warning',
                                confirmButtonText: "بستن"
                            });
                        }
                });
            });
        </script>

        <script>
            $(document).on('click','#reg',function () {
                var data = new FormData($('#sliderForm')[0]);
                    $.ajax
                    ({
                        cache       : false,
                        url         : "{{url('admin/addNewSlider')}}",
                        type        : "post",
                        dataType    : "JSON",
                        contentType : false,
                        processData : false,
                        data        : data,
                        beforeSend  : function()
                        {
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
        <script>

            $(function () {
                $(document).on('click','#removeInput',function () {
                    var counter = $('#counter').val();
                    removeFromChange(counter);
                });
                function removeFromChange(counter) {

                    if (counter > 1 )
                    {
                        $('#addPic > #child').last().remove();
                        counter--;
                        $('#counter').val(counter);
                    };


                }
            });

        </script>
@endsection