@extends('layouts.userLayout')
@section('content')
    <style>
        .modal {
            text-align: center;
            padding: 0!important;
        }

        .modal:before {
            content: '';
            display: inline-block;
            height: 100%;
            vertical-align: middle;
            margin-right: -4px;
        }

        .modal-dialog {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
        }
    </style>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog" dir="rtl">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div  class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 id="oldTitle" class="modal-title" style="float: right; display: none;">لطفا منتظر بمانید</h2>
                    <h2 id="newTitle" class="modal-title" style="float: right; display: none;">برای حالت انتخاب شده اندازه ای ثبت نشده!</h2>
                    <progress id="progress" class="col-md-7 col-md-offset-2" style="direction: ltr;"></progress>
                </div>
                <div  id="showMessage" style="display: none;" class="modal-dialog">
                    <h2 > میتوانید پس از ثبت سفارش با مسئول مربوطه در خصوص اندازه ها بحث و گفتگو نمائید</h2>
                </div>
                <div class="" >
                    {{--<button type="button" class="btn btn-dark col-md-5 col-md-offset-1" data-dismiss="modal">بستن</button>--}}
                </div>
            </div>

        </div>
    </div>
    <!-- page content -->
    <div class="" role="main">
        <div class="">
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-10 col-xs-12 col-md-offset-1">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>ثبت سفارش جدید</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link" data-toggle="tooltip" title="جمع کردن"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link" data-toggle="tooltip" title="بستن"  ><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <button class="btn btn-info col-md-6 col-md-offset-2" style="font-size: 120%;"  onclick="window.location.reload(true);">در صورت بروز مشکل در انتخاب اندازه و حالت اینجا را کلیک نمائید</button>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            {{--<a href="{{url('admin/realStateManagement')}}" class="btn btn-warning col-md-6 col-xs-12 col-sm-12 col-md-offset-3" style="margin-bottom: 20px;display: none;" id="goAdminPage">بازگشت به مدیریت</a>--}}
                            <form id="newOrderForm" enctype="multipart/form-data" class="form-horizontal form-label-left input_mask" style="direction:rtl" >
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <h2 class="">عنوان :</h2>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <h2 class="">لطفا حالت بوم مورد نظر خود را از بین حالت های زیر انتخاب نمائید :</h2>
                                        <select id="models"  name="model" class="form-control">

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" id="size" style="display: none;">
                                    <div class="col-md-12  form-group has-feedback">
                                        <h2 class="">اندازه های مربوط به حالت انتخاب شده :</h2>
                                            <div class='col-md-3'>
                                                <select name="sideways" id="sideways"  class='form-control col-md-12 col-sm-9 col-xs-12 side'>
                                                </select>
                                            </div>
                                            <div class='col-md-3'>
                                                <select name="diameter" id="diameter" class='form-control col-md-12 col-sm-9 col-xs-12 circle'>

                                                </select>
                                            </div>
                                            <div class='col-md-3'>
                                                <select name="width" id="width"  class='form-control col-md-12 col-sm-9 col-xs-12 rectangle'>

                                                </select>
                                            </div>
                                            <div class='col-md-3'>
                                                <select name="length" id="length" class='form-control col-md-12 col-sm-9 col-xs-12 rectangle'>

                                                </select>
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <h2>در صورت لزوم میتوانید نمونه ای از طرح خود را در قالب فایل با پسوند jpg  یا  png  برای ما ارسال نمائید:</h2>
                                        <input id="file" type="file" name="file[]"  class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <h2>لطفا توضیحات مربوط به سفارش خود را بطور کامل در کادر زیر بنویسید:</h2>
                                        <textarea id="description"  name="description"  class="form-control"  ></textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="button" id="saveNewOrder" class="btn btn-success col-md-12" style="font-size:20px;">ثبت سفارش</button>
                                        <input type="hidden" id="status" value="0">
                                        <input type="hidden" id="type" value="0">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>
            $(function () {
                var option = '';
                $.ajax
                ({
                    url      : "{{url('api/v1/getModels')}}",
                    type     : "get",
                    dataType : "json",
                    success  : function(response)
                    {
                        console.log(response);
                        $.each(response,function (key,value) {
                            $('#models').empty();
                            $('#models').append
                            (
                              "<option>لطفا از بین حالت های موجود یک حالت را انتخاب نمائید و سپس اندازه آن را نیز مشخص کنید</option>"
                            );
                            $('#models').append
                            (
                               option +=  "<option  name='models' id='"+value.id+"'>"+value.title+"</option>"
                            );
                        })
                    },
                    error    : function(error)
                    {
                        console.log(error);
                    }
                })
            })
        </script>
        <script>
            $(function(){
                $(document).on('change','#models',function(){
                    $("[name = 'models' ]:selected ").each(function () {
                        var id = $(this).attr('id');
                        $('#type').val($(this).val());
                        var type = $('#type').val();
                        if(id != null || id != '')
                        {
                            $.ajax
                            ({
                                url      : "{{url('api/v1/getSizes')}}/"+id,
                                type     : "get",
                                dataType : "json",
                                success  : function(response)
                                {
                                    if(response != 0)
                                    {
                                        $('#status').val('1');
                                        $('#myModal').modal('show');
                                        $('#oldTitle').show();
                                        $('#newTitle').hide();
                                        $('#showMessage').hide();
                                        $('#progress').show();
                                        var len = response.length;
                                        var i   = 0;
                                        setTimeout(function(){
                                            $('#sideways').empty();
                                            $('#sideways').append
                                            (
                                                "<option>اندازه یک ضلع</option>"
                                            );
                                            $('#diameter').empty();
                                            $('#diameter').append
                                            (
                                                "<option>قطر</option>"
                                            );
                                            $('#width').empty();
                                            $('#width').append
                                            (
                                                "<option>عرض</option>"
                                            );
                                            $('#length').empty();
                                            $('#length').append
                                            (
                                                "<option>طول</option>"
                                            );
                                            while(i < len) {
                                                var item = $('#size');
                                                item.css('display','block');
                                                $('#sideways').append
                                                (
                                                    "<option id='side' name='side'>" + response[i].sideways + "</option>"
                                                );
                                                $('#diameter').append
                                                (
                                                    "<option id='dia' name='dia'>" + response[i].diameter + "</option>"
                                                );
                                                $('#width').append
                                                (
                                                    "<option id='wid' name='width1'>" + response[i].width + "</option>"
                                                );
                                                $('#length').append
                                                (
                                                    "<option id='len' name='length1'>" + response[i].length + "</option>"
                                                );
                                                i++;
                                            }
                                            $('#myModal').modal('hide');
                                        },3000);
                                        handleSelectBox(type);

                                    }else
                                        {
                                            $('#status').val('0');
                                            $('#myModal').modal('show');
                                            $('#progress').hide();
                                            $('#size').hide();
                                            $('#oldTitle').hide();
                                            $('#newTitle').show();
                                            $('#showMessage').show();
                                            setTimeout(function () {
                                                $('#myModal').modal('hide');
                                            },3000);

                                        }
                                },
                                error    : function(error)
                                {
                                    console.log(error);
                                }
                            })
                        }
                    })
                })
            })
        </script>
        <script>
            $(document).on('click','#saveNewOrder',function(){
                var model = $('#models').val();
                var counter = 0;
                var formData = new FormData($('#newOrderForm')[0]);
                $.ajax
                ({
                    cache       : false,
                    url         : "{{url('user/saveNewOrder')}}",
                    type        : "post",
                    processData : false,
                    contentType : false,
                    dataType    : "json",
                    data        : formData,
                    beforeSend  : function()
                    {
                        if($('#title').val() == '' || $('#title').val() == null)
                        {
                            $('#title').focus();
                            $('#title').css('border-color','red');
                            return false;
                        }
                        else if($('#models').val() == 'لطفا از بین حالت های موجود یک حالت را انتخاب نمائید و سپس اندازه آن را نیز مشخص کنید')
                        {
                            $('#models').focus();
                            $('#models').css('border-color','red');
                            swal
                            ({
                                title: '',
                                text: 'لطفا حالت مورد نظر خود را انتخاب نمائید',
                                type:'warning',
                                confirmButtonText: "بستن"
                            });
                            return false;
                        }
                        else if($('#description').val() == '' || $('#description').val() == null)
                        {
                            $('#description').focus();
                            $('#description').css('border-color','red');
                            return false;
                        }
                        else if(model == 'مستطیل') {
                            $(".rectangle").each(function () {
                                if ($(this).val() == 0 || $(this).val() ==  'طول' || $(this).val() ==  'عرض' && $('#status').val() == 1) {
                                    $(this).css("border-color", "red");
                                    counter++;
                                }
                            });
                            if (counter > 0) {
                                swal
                                ({
                                    title: '',
                                    text: 'با توجه به اینکه حالت '+model+' را انتخاب نموده اید باید اندازه های طول و عرض را وارد نمایید',
                                    type: 'warning',
                                    confirmButtonText: "بستن"
                                })
                                return false;
                            }
                        }
                        if(model ==  'مربع' || model== 'مثلث') {
                            $(".side").each(function () {
                                if ($(this).val() == 0 || $(this).val() ==  'اندازه یک ضلع' && $('#status').val() == 1) {
                                    $(this).css("border-color", "red");
                                    counter++;
                                }
                            });
                            if (counter > 0) {
                                swal
                                ({
                                    title: '',
                                    text: 'با توجه به اینکه حالت '+model+' را انتخاب نموده اید باید اندازه ی یک ضلع را وارد نمایید',
                                    type: 'warning',
                                    confirmButtonText: "بستن"
                                })
                                return false;
                            }
                        }
                        if(model ==  'دایره') {
                            $(".circle").each(function () {
                                if ($(this).val() == 0 || $(this).val() == 'قطر' && $('#status').val() == 1) {
                                    $(this).css("border-color", "red");
                                    counter++;
                                }
                            });
                            if (counter > 0) {
                                swal
                                ({
                                    title: '',
                                    text: 'با توجه به اینکه حالت '+model+' را انتخاب نموده اید باید اندازه ی قطر را وارد نمایید',
                                    type: 'warning',
                                    confirmButtonText: "بستن"
                                })
                                return false;
                            }
                        }
                    },
                    success     : function(response)
                    {
                        console.log(response.message);
                       if (response.code == 'success')
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
                    error       : function(error)
                    {
                        console.log(error);
                        if(error.status === 500)
                        {
                            swal
                            ({
                                title: '',
                                text: 'خطایی رخ داده است ، لطفا با بخش پشتیبانی تماس بگیرید',
                                type:'warning',
                                confirmButtonText: "بستن"
                            });
                        }else if(error.status === 422)
                        {
                            var errors = error.responseJSON;
                            var errorsHtml = '';
                            $.each(errors,function (key,vlaue) {
                                errorsHtml += value[0] + '\n';
                            })
                            swal
                            ({
                                title: '',
                                text: errorsHtml,
                                type:'warning',
                                confirmButtonText: "بستن"
                            });
                        }

                    }
                });
            })
        </script>
        <script>
            $(function(){

                    $(document).on('change','#length',function(){
                        if($('#type').val() == 'مستطیل')
                        {
                            $('[name = "length1"]:selected').each(function(){
                                var len = $(this).val();
                                $.ajax
                                ({
                                    url      : "{{url('user/checkLength')}}",
                                    type     : "get",
                                    data     : {'len' : len},
                                    dataType : "json",
                                    success  : function(response)
                                    {
                                        console.log(response);
                                        if(response != 0)
                                        {
                                            $('#myModal').modal('show');
                                            var length = response.data.length;
                                            console.log(length);
                                            $('#width').empty();
                                            $('#width').append
                                            (
                                                "<option>عرض</option>"
                                            );
                                            var i = 0;
                                            while(i < length)
                                            {
                                                $('#width').append
                                                (
                                                   "<option>"+response.data[i]+"</option>"
                                                );
                                                i++;
                                            }
                                            setTimeout(function () {
                                                $('#myModal').modal('hide');
                                            },3000);
                                        }
                                    },error  : function(error)
                                    {
                                        console.log(error);
                                    }
                                })
                            })
                        }
                    })

            })
        </script>
        <script>
            $(function(){
                $(document).on('change','#width',function(){
                    if($('#type').val() == 'مستطیل')
                    {
                        $('[name = "width1"]:selected').each(function(){
                            var width = $(this).val();
                            $.ajax
                            ({
                                url      : "{{url('user/checkWidth')}}",
                                type     : "get",
                                data     : {'width' : width},
                                dataType : "json",
                                success  : function(response)
                                {
                                    console.log(response);
                                    if(response != 0)
                                    {
                                        $('#myModal').modal('show');
                                        var length = response.data.length;
                                        console.log(length);
                                        $('#length').empty();
                                        $('#length').append
                                        (
                                            "<option>طول</option>"
                                        );
                                        var i = 0;
                                        while(i < length)
                                        {
                                            $('#length').append
                                            (
                                                "<option>"+response.data[i]+"</option>"
                                            );
                                            i++;
                                        }
                                        setTimeout(function () {
                                            $('#myModal').modal('hide');
                                        },3000);
                                    }
                                },error  : function(error)
                                {
                                    console.log(error);
                                }
                            })
                        })
                    }
                })
            })
        </script>
        <script>
            function handleSelectBox(type)
            {
                if(type == 'مستطیل')
                {
                    $('#sideways').prop('disabled',true);
                    $('#diameter').prop('disabled',true);
                    $('#length').prop('disabled',false);
                    $('#width').prop('disabled',false);
                }
                if(type == 'مربع' || type == 'مثلث')
                {
                    $('#length').prop('disabled',true);
                    $('#width').prop('disabled',true);
                    $('#diameter').prop('disabled',true);
                    $('#sideways').prop('disabled',false);
                }
                if(type == 'دایره')
                {
                    $('#length').prop('disabled',true);
                    $('#width').prop('disabled',true);
                    $('#sideways').prop('disabled',true);
                    $('#diameter').prop('disabled',false);
                }
            }
        </script>
@endsection
