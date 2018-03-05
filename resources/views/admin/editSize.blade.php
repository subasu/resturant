@extends('layouts.adminLayout')
@section('content')

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>ویرایش سایز: <strong style="color: red;">{{$title}}</strong>  </h2>
                    <input type="hidden" id="title" value="{{$title}}">
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link" data-toggle="tooltip" title="جمع کردن"><i
                                        class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link" data-toggle="tooltip" title="بستن"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>


                {{--<a href="{{url('admin/addProduct')}}" id="user-send" type="button" class="col-md-2 btn btn-primary" style="font-weight: bold;">--}}
                {{--<i class="fa fa-th-list"></i>                    افزودن دسته ی جدید                </a>--}}
                {{--<div class="pull-right" style="direction: rtl"><i class="fa fa-square" style="font-size: 35px;color:#ffff80;"></i> مدیران واحد</div>--}}
                <div class="x_content">
                    <table style="direction:rtl;text-align: center" id="example"
                           class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <input type="hidden" id="token" value="{{ csrf_token() }}">
                        <thead>
                        <tr>
                            <th style="text-align: center">ردیف</th>
                            <th style="text-align: center">طول(سانتیمتر)</th>
                            <th style="text-align: center">عرض(سانتیمتر)</th>
                            <th style="text-align: center">قطر(سانتیمتر)</th>
                            <th style="text-align: center">اندازه یک ضلع(سانتیمتر)</th>
                            <th style="text-align: center">تغییر وضعیت</th>
                            <th style="text-align: center">ویرایش</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $i = 0 ?>
                        <form id="editForm">
                            {{csrf_field()}}
                            {{--@foreach($categoryInfo as $category)--}}
                            <tr class="unit">
                                <td style="font-size: 120%;">{{++$i}}</td>
                                <td class="col-md-2 "><input  class="form-control required rectangle" style="width: 100%;" id="length" name="length" value="{{$data[0]->length}}"></td>
                                <td class="col-md-2 "><input  class="form-control required rectangle" style="width: 100%;" id="width" name="width" value="{{$data[0]->width}}"></td>
                                <td class="col-md-2 "><input  class="form-control required circle" style="width: 100%;" id="diameter" name="diameter" value="{{$data[0]->diameter}}"></td>
                                <td class="col-md-2 "><input  class="form-control required side" style="width: 100%;" id="sideways" name="sideways" value="{{$data[0]->sideways}}"></td>
                                @if($data[0]->active == 1)
                                    <td><a id="active" content="{{$data[0]->active}}" name="{{$data[0]->id}}" type="button"  data-content="غیر فعال" class="btn btn-danger col-md-8 col-md-offset-2" >غیر فعال</a></td>
                                @endif
                                @if($data[0]->active == 0)
                                    <td><a id="active" content="{{$data[0]->active}}" name="{{$data[0]->id}}" type="button"  data-content="فعال" class="btn btn-success col-md-8 col-md-offset-2"> فعال</a></td>
                                @endif
                                <td><button id="edit" type="button" class="btn btn-warning col-md-9 col-md-offset-1">ویرایش</button></td>
                                <input type="hidden" value="{{$data[0]->id}}" id="id" name="id">
                                <input type="hidden" id="token" value="{{csrf_token()}}" name="_token">
                            </tr>
                            {{--@endforeach--}}
                        </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script>
            $(document).on('click','#edit',function () {
                var length = $('#length').val();
                var width  = $('#width').val();
                var diameter  = $('#diameter').val();
                var sideways  = $('#sideways').val();
                var id     = $('#id').val();
                var token  = $('#token').val();
                var title  = $('#title').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                swal({
                        title:   " آیا می خواهید ویرایش انجام دهید؟  ",
                        text: "",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonColor: "	#5cb85c",
                        cancelButtonText: "خیر",
                        confirmButtonText: "آری",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            $.ajax
                            ({
                                cache: false,
                                url: "{{url('admin/editSizeInformation')}}",
                                data: { 'id': id, '_token': token,'length' : length , 'width' : width , 'diameter' : diameter , 'sideways':sideways},
                                type: "post",
                                dataType: "JSON",
                                beforeSend: function () {
                                    var counter = 0;
                                    if ($('#sideways').val() == null || $('#sideways').val() == '' || $('#diameter').val() == null || $('#diameter').val() == '' || $('#width').val() == null || $('#width').val() == '' || $('#length').val() == null || $('#length').val() == '') {
                                        $('.required').each(function () {
                                            if ($(this).val() == '') {
                                                $(this).css("border-color", "red");
                                                counter++;
                                            }
                                        })
                                        if (counter > 0) {
                                            swal({
                                                title: "",
                                                text: 'هیچ کدام از اندازه ها نباید خالی باشند ، در صورت عدم نیاز به اندازه مربوطه مقدار آن را برابر با صفر قرار دهید',
                                                type: "warning",
                                                confirmButtonText: "بستن"
                                            });
                                            return false;
                                        }
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
                                success: function (response) {
                                    if (response.code == 1) {
                                        swal({
                                            title: "",
                                            text: response.message,
                                            type: "success",
                                            confirmButtonText: "بستن"
                                        });
                                        setTimeout(function () {
                                            window.location.href = document.referrer;
                                        },3000);
                                    }
                                    else {
                                        swal({
                                            title: "",
                                            text: response.message,
                                            type: "warning",
                                            confirmButtonText: "بستن"
                                        });
                                    }

                                }, error: function (error) {
                                    console.log(error);
                                    if (error.status === 500) {
                                        swal({
                                            title: "",
                                            text: 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید',
                                            type: "warning",
                                            confirmButtonText: "بستن"
                                        });
                                    }
                                }
                            })

                        }
                    })
            })
        </script>

        <!-- below script is to make it active or deactive -->
        <script>
            $(document).on('click','#active',function () {
                var active     = $(this).attr('content');
                var token      = $("#token").val();
                var sizeId = $(this).attr('name');
                var title      = $(this).attr('data-content');
                //alert(title);
                swal({
                        title:   " آیا در نظر دارید این اندازه را " +"(( "+ title +" ))"+  "  نمایید؟ ",
                        text: "",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonColor: "	#5cb85c",
                        cancelButtonText: "خیر",
                        confirmButtonText: "آری",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            $.ajax
                            ({
                                cache: false,
                                url: "{{url('admin/enableOrDisableSize')}}",
                                type: "post",
                                data: {'_token': token, 'active': active, 'sizeId': sizeId},
                                dataType: "JSON",
                                success: function (response) {
                                    if (response.code == 1) {
                                        swal({
                                            title: "",
                                            text: response.message,
                                            type: "success",
                                            confirmButtonText: "بستن"
                                        });
                                        setTimeout(function () {
                                            window.location.href = document.referrer;
                                        }, 3000);
                                    } else {
                                        swal({
                                            title: "",
                                            text: response.message,
                                            type: "warning",
                                            confirmButtonText: "بستن"
                                        });
                                    }

                                }, error: function (error) {
                                    console.log(error);
                                    swal({
                                        title: "",
                                        text: 'خطایی رخ داده است ، با بخش پشتیبانی تماس بگیرید',
                                        type: "warning",
                                        confirmButtonText: "بستن"
                                    });
                                }
                            })
                        }
                    })
            })

        </script>
@endsection