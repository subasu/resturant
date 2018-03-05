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
        .myAlertColor{
            background-color: #28a745!important
        }
    </style>

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

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
            <div class="x_panel">
                <div class="x_title">
                    <h2> فرم ایجاد اندازه ها</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>

                </div>

                {{-- table --}}
                <div class="col-md-3 col-sm-3 col-xs-12"></div>
                <div class="col-md-12 col-sm-6 col-xs-12 ">
                    <div class="x_content">
                        <form  class="form-horizontal form-label-left" id="unitForm"  method="POST" style="direction: rtl !important;">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <a  class="btn btn-info" onclick="window.location.reload(true)">شروع دوباره</a>
                                <div class="col-md-1 col-sm-1 col-xs-1">
                                    <a id="addInput" class="glyphicon glyphicon-plus btn btn-success" data-toggle="" title=" افزودن فیلد" ></a>
                                </div>
                                <div class="col-md-1 col-sm-1 col-xs-1">
                                    <a id="removeInput" class="glyphicon glyphicon-remove btn btn-danger" data-toggle="" title="حذف فیلد" ></a>
                                </div>
                                {{--<label class="control-label col-md-11 col-sm-11 col-xs-11 font-size-s" for="name">  <span--}}
                                {{--class="required star" title="پر کردن این فیلد الزامی است">نکته:</span>شما حداکثر میتوانید تا سه سطح دسته بندی نمائید و سطح چهارم محصول شما خواهد بود.--}}
                                {{--</label>--}}
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div id="showSizes" style="display: none; !important;">
                                    <div class="col-md-9 col-sm-6 col-xs-9">
                                        <select id="models"  class="form-control" name="models">

                                        </select>




                                    </div>
                                    <label class="control-label col-md-3 col-sm-4 col-xs-3" for="title">حالت های موجود : <span
                                                class="star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>


                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <br/>
                            <br/>

                            <div class="item form-group" id="change1" style="display:none;!important;">
                                <div class='col-md-2'>
                                    <select id="sideways" class='form-control col-md-12 col-sm-9 col-xs-12'>
                                    </select>
                                </div>
                                <div class='col-md-2'>
                                    <select id="diameter" class='form-control col-md-12 col-sm-9 col-xs-12'>

                                    </select>
                                </div>
                                <div class='col-md-2'>
                                    <select id="width"  name="width1" class='form-control col-md-12 col-sm-9 col-xs-12'>

                                    </select>
                                </div>
                                <div class='col-md-3'>
                                    <select id="length" name="length1" class='form-control col-md-12 col-sm-9 col-xs-12'>

                                    </select>
                                </div>
                                <label class='control-label col-md-3 col-sm-4 col-xs-3' for='name'>اندازه های از پیش درج شده:
                                    <span class='star' title='پر کردن این فیلد الزامی است'>*</span>
                                    </label>

                            </div>
                            <div class="item form-group" id="change" style="display:none;!important;">

                            </div>
                            <div class="form-group">
                                <div class="col-md-12" style="margin-top: 2%;">
                                    <button id="reg" type="button" class="col-md-9 btn btn-primary" style="display: none; !important;">ثبت نهایی</button>
                                    <button id="newSize" type="button" class="col-md-9 btn btn-success" style="display: none;">افزودن اندازه های جدید</button>
                                    <input type="hidden" value="" id="modelId" name="modelId">
                                    <input type="hidden" value="" id="title" name="title">
                                    <input type="hidden" value="0" id="counter" name="counter">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12"></div>
            </div>
        </div>



        <!-- below script is to get main units -->
        <script>
            $(function () {
                //load MainUnitsCount
                var option = '';
                $.ajax
                ({
                    cache: false,
                    url: "{{Url('api/v1/getModels')}}",
                    dataType: "json",
                    type: "get",
                    success: function (response) {
                        console.log(response);
                        if (response != 0) {
                            $('#showSizes').css('display','block');
                            var item = $('#models');
                            $.each(response, function (key, value) {
                                item.empty();
                                item.append
                                (
                                    "<option selected='true' disabled='disabled'>برای افزودن اندازه ها از بین حالت های موجود حالتی را انتخاب کنید</option>"
                                )
                                item.append
                                (
                                    option += "<option name='models' content='"+value.id+"'>"+value.title+ "</option>"
                                );
                            });
                            //$('#addMainUnit').css('display','block');
                            $('#addInput').css('display','block');
                           // $('#reg').css('display','block');
                            $('#removeInput').css('display','block');
                            $('#change').css('display','block');
                          //  appendToChange();

                        }
                        else {
                            swal({
                                    title:   "لطفا ابتدا حالت های بوم را درج نمائید ، سپس برای درج دسته ها اقدام کنید",
                                    text: "",
                                    type: "info",
                                    showCancelButton: true,
                                    confirmButtonColor: "	#5cb85c",
                                    cancelButtonText: "بستن",
                                    confirmButtonText: "درج حالت ها",
                                    closeOnConfirm: true,
                                    closeOnCancel: true
                                },
                                function (isConfirm) {
                                    if (isConfirm) {
                                       window.location.href='addModels';
                                    }
                                })
                        }
                    }
                });
            })

        </script>

        <!-- below script is to append html element to change tag -->
        <script>
            function appendToChange(title)
            {
                if(title != '')
                {
                    if(title == 'مستطیل')
                    {
                        $('#change').append
                        (
                            "<div id='child' dir='ltr'>"+
                            "<br/><br/>"+
                            "<div class='col-md-2 col-sm-9 col-xs-12'>"+
                            "<input id='unit' class='form-control col-md-6 col-xs-6 required side' disabled name='sideways[] ' value='0' placeholder='اندازه یک ضلع' required='required' type='text'>"+
                            "</div>"+
                            "<div class='col-md-2 col-sm-9 col-xs-12'>"+
                            "<input id='unit' class='form-control col-md-6 col-xs-6 required circle' disabled placeholder='قطر' value='0'  name='diameter[]' required='required' type='text'>"+
                            "</div>"+
                            "<div class='col-md-2 col-sm-9 col-xs-12'>"+
                            "<input id='unit' class='form-control col-md-6 col-xs-6 required rectangle' name='width[]'   placeholder='عرض' required='required' type='text'>"+
                            "</div>"+
                            "<div class='col-md-3 col-sm-9 col-xs-12'>"+
                            "<input id='unit' class='form-control col-md-6 col-xs-6 required rectangle' name='length[]'   placeholder='طول' required='required' type='text'>"+
                            "</div>"+
                            "<label class='control-label col-md-3 col-sm-4 col-xs-3' for='name'>لیست اندازه های جدید   :"+
                            "<span class='star' title='پر کردن این فیلد الزامی است'>*</span>"+
                            "</label>"
                        );
                    }
                    if(title == 'مثلث' || title == 'مربع')
                    {
                        $('#change').append
                        (
                            "<div id='child' dir='ltr'>"+
                            "<br/><br/>"+
                            "<div class='col-md-2 col-sm-9 col-xs-12'>"+
                            "<input id='unit' class='form-control col-md-6 col-xs-6 required side'  name='sideways[] '  placeholder='اندازه یک ضلع' required='required' type='text'>"+
                            "</div>"+
                            "<div class='col-md-2 col-sm-9 col-xs-12'>"+
                            "<input id='unit' class='form-control col-md-6 col-xs-6 required circle' disabled placeholder='قطر' value='0'  name='diameter[]' required='required' type='text'>"+
                            "</div>"+
                            "<div class='col-md-2 col-sm-9 col-xs-12'>"+
                            "<input id='unit' class='form-control col-md-6 col-xs-6 required rectangle' disabled name='width[]' value='0'  placeholder='عرض' required='required' type='text'>"+
                            "</div>"+
                            "<div class='col-md-3 col-sm-9 col-xs-12'>"+
                            "<input id='unit' class='form-control col-md-6 col-xs-6 required rectangle' disabled name='length[]' value='0'  placeholder='طول' required='required' type='text'>"+
                            "</div>"+
                            "<label class='control-label col-md-3 col-sm-4 col-xs-3' for='name'>لیست اندازه های جدید   :"+
                            "<span class='star' title='پر کردن این فیلد الزامی است'>*</span>"+
                            "</label>"
                        );
                    }
                    if(title == 'دایره')
                    {
                        $('#change').append
                        (
                            "<div id='child' dir='ltr'>"+
                            "<br/><br/>"+
                            "<div class='col-md-2 col-sm-9 col-xs-12'>"+
                            "<input id='sideways' class='form-control col-md-6 col-xs-6 required side' disabled name='sideways[] ' value='0' placeholder='اندازه یک ضلع' required='required' type='text'>"+
                            "</div>"+
                            "<div class='col-md-2 col-sm-9 col-xs-12'>"+
                            "<input id='diameter' class='form-control col-md-6 col-xs-6 required circle'  placeholder='قطر'   name='diameter[]' required='required' type='text'>"+
                            "</div>"+
                            "<div class='col-md-2 col-sm-9 col-xs-12'>"+
                            "<input id='width' class='form-control col-md-6 col-xs-6 required rectangle' disabled name='width[]' value='0'  placeholder='عرض' required='required' type='text'>"+
                            "</div>"+
                            "<div class='col-md-3 col-sm-9 col-xs-12'>"+
                            "<input id='length' class='form-control col-md-6 col-xs-6 required rectangle' disabled name='length[]' value='0'  placeholder='طول' required='required' type='text'>"+
                            "</div>"+
                            "<label class='control-label col-md-3 col-sm-4 col-xs-3' for='name'>لیست اندازه های جدید   :"+
                            "<span class='star' title='پر کردن این فیلد الزامی است'>*</span>"+
                            "</label>"
                        );
                    }

                }else
                    {
                        swal
                        ({
                            title: '',
                            text: 'ابتدا حالتی را انتخاب نمائید سپس دکمه افزودن فیلد را بزنید',
                            type: 'warning',
                            confirmButtonText: "بستن"
                        });
                        return false;
                    }

            }

        </script>

        <!-- below script is to append input type -->
        <script>
            $(document).on('click','#addInput',function () {
                var title = $('#title').val();
                appendToChange(title);
            })
        </script>

        <!-- below script is to remove input type -->
        <script>
            $(function () {
                $(document).on('click','#removeInput',function () {
                    removeFromChange();
                });
                function removeFromChange() {
                    if ($('#change > #child').length > 1) {
                        $('#change > #child').last().remove();
                    };
                }
            });

        </script>




        <!-- below script is to send data to server side -->
        <script>
            $(document).on('click','#reg',function(){
                var option = '';
                var title  = '';
                $("[name = 'models']option:selected").each(function(){
                    $('#modelId').val($(this).attr('content'));
                    title += $(this).val();

                })
                var id = $('#modelId').val();
               // alert(id);
                var formData = new FormData ($('#unitForm')[0]);
                $.ajax
                ({
                    cache       : false,
                    url         : "{{url('admin/addNewSize')}}",
                    type        : "post",
                    processData : false,
                    contentType : false,
                    dataType    : "json",
                    data        : formData,
                    beforeSend:function () {
                        var counter = 0;
                        $(".required").each(function() {
                            if ($(this).val() == "") {
                                $(this).css("border-color" , "red");
                                counter++;
                            }
                        });
                        if(counter > 0){
                            swal
                            ({
                                title: '',
                                text: 'تعدادی از فیلدهای فرم خالی است.لطفا فیلدها را پر نمایید سپس ثبت نهایی را بزنید',
                                type:'warning',
                                confirmButtonText: "بستن"
                            });
                            return false;
                        }
                        if(title == 'مستطیل') {
                            $(".rectangle").each(function () {
                                if ($(this).val() == 0) {
                                    $(this).css("border-color", "red");
                                    counter++;
                                }
                            });
                            if (counter > 0) {
                                swal
                                ({
                                    title: '',
                                    text: 'با توجه به اینکه حالت '+title+' را انتخاب نموده اید باید اندازه های طول و عرض را وارد نمایید',
                                    type: 'warning',
                                    confirmButtonText: "بستن"
                                })
                                return false;
                            }
                        }
                        if(title ==  'مربع' || title== 'مثلث') {
                            $(".side").each(function () {
                                if ($(this).val() == 0) {
                                    $(this).css("border-color", "red");
                                    counter++;
                                }
                            });
                            if (counter > 0) {
                                swal
                                ({
                                    title: '',
                                    text: 'با توجه به اینکه حالت '+title+' را انتخاب نموده اید باید اندازه ی یک ضلع را وارد نمایید',
                                    type: 'warning',
                                    confirmButtonText: "بستن"
                                })
                                return false;
                            }
                        }
                        if(title ==  'دایره') {
                            $(".circle").each(function () {
                                if ($(this).val() == 0) {
                                    $(this).css("border-color", "red");
                                    counter++;
                                }
                            });
                            if (counter > 0) {
                                swal
                                ({
                                    title: '',
                                    text: 'با توجه به اینکه حالت '+title+' را انتخاب نموده اید باید اندازه ی قطر را وارد نمایید',
                                    type: 'warning',
                                    confirmButtonText: "بستن"
                                })
                                return false;
                            }
                        }

                    },
                    success  : function(res) {
                        if (res.code == 1)
                        {
                            $.ajax
                            ({
                                url: "{{url('api/v1/getSizes')}}/" + id,
                                type: "get",
                                dataType: "json",
                                success: function (response) {
                                    console.log(response);
                                    if (response != 0) {
                                        swal
                                        ({
                                            title: '',
                                            text: res.message,
                                            type:'success',
                                            confirmButtonText: "بستن"
                                        });
                                        var len = response.length;
                                        var i = 0;
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
                                        while (i < len) {
                                            $('#change').css('display', 'none');
                                            var item = $('#change1');
                                            item.css('display', 'block');
                                            $('#sideways').append
                                            (
                                                "<option >" + response[i].sideways + "</option>"
                                            );
                                            $('#diameter').append
                                            (
                                                "<option>" + response[i].diameter + "</option>"
                                            );
                                            $('#width').append
                                            (
                                                "<option>" + response[i].width + "</option>"
                                            );
                                            $('#length').append
                                            (
                                                "<option>" + response[i].length + "</option>"
                                            );
                                            i++;
                                        }
                                        $('#reg').css('display','none');
                                        $('#newSize').css('display','block');
                                        handleSelectBox(title);
                                    }
                                },error : function(error)
                                {
                                    console.log(error);
                                }
                            })
                        }
                    },error : function (error)
                    {
                        console.log(error);
                    }
                })
            })
        </script>
        <!-- below script is related to get sizes of each model -->
        <script>
            $(function(){
                $(document).on('change','#models',function(){
                    $("[name = 'models' ]:selected ").each(function () {
                        var id = $(this).attr('content');
                        $('#title').val($(this).val());
                        var title = $('#title').val();
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
                                        var len = response.length;
                                        var i   = 0;
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
                                                $('#change').css('display','none');
                                                var item = $('#change1');
                                                item.css('display','block');
                                                $('#sideways').append
                                                (
                                                    "<option>" + response[i].sideways + "</option>"
                                                );
                                                $('#diameter').append
                                                (
                                                    "<option>" + response[i].diameter + "</option>"
                                                );
                                                $('#width').append
                                                (
                                                    "<option id='wid' name='width2'>" + response[i].width + "</option>"
                                                );
                                                $('#length').append
                                                (
                                                    "<option id='len' name='length2'>" + response[i].length + "</option>"
                                                );
                                            i++;
                                        }
                                        $('#newSize').css('display','block');
                                        $('#reg').css('display','none');
                                        handleSelectBox(title);
                                    }else
                                        {
                                            $('#change1').css('display','none');
                                            $('#change').css('display','block');
                                            $('#newSize').css('display','none');
                                            $('#reg').css('display','block');
                                            $('#change').empty();
                                            appendToChange(title);
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
        <!-- below script is related to handle newSize button -->
        <script>
            $(document).on('click','#newSize',function(){
                var title = $('#title').val();
               $('#change').css('display','block');
               $('#newSize').css('display','none');
                $('#reg').css('display','block');
                $('#change').empty();
                appendToChange(title);
            });
        </script>
        <script>
            function handleSelectBox(title)
            {
                if(title == 'مستطیل')
                {
                    $('#sideways').prop('disabled',true);
                    $('#diameter').prop('disabled',true);
                    $('#length').prop('disabled',false);
                    $('#width').prop('disabled',false);
                }
                if(title == 'مربع' || title == 'مثلث')
                {
                    $('#length').prop('disabled',true);
                    $('#width').prop('disabled',true);
                    $('#diameter').prop('disabled',true);
                    $('#sideways').prop('disabled',false);
                }
                if(title == 'دایره')
                {
                    $('#length').prop('disabled',true);
                    $('#width').prop('disabled',true);
                    $('#sideways').prop('disabled',true);
                    $('#diameter').prop('disabled',false);
                }
            }
        </script>

        <script>
            $(function(){

                $(document).on('change','#length',function(){
                    if($('#title').val() == 'مستطیل')
                    {
                        $('[name = "length2"]:selected').each(function(){
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
                    if($('#title').val() == 'مستطیل')
                    {
                        $('[name = "width2"]:selected').each(function(){
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
@endsection