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
                                        <h2 class="">تعداد :</h2>
                                        <input type="text" class="form-control" id="count" name="count">
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <h2>لطفا توضیحات مربوط به سفارش خود را بطور کامل در کادر زیر بنویسید:</h2>
                                        <textarea id="description"  name="description"  class="form-control"  ></textarea>

                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <h2>لطفا آدرس تحویل سفارش خود را بطور کامل در کادر زیر بنویسید:</h2>
                                        <textarea id="coordination"  name="coordination"  class="form-control"  ></textarea>

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
                        else if($('#count').val() == '' || $('#count').val() == null)
                        {
                            $('#count').focus();
                            $('#count').css('border-color','red');
                            swal
                            ({
                                title: '',
                                text: 'لطفا تعداد مورد نظر را انتخاب کنید',
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
                        }else if($('#coordination').val() == '' || $('#description').val() == null)
                        {
                            $('#coordination').focus();
                            $('#coordination').css('border-color','red');
                            return false;
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
