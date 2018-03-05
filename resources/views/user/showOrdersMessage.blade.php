@extends('layouts.userLayout')
@section('content')
    <div id="messageModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style="font-size: 20px;">&times;</button>
                    <h4 class="modal-title" dir="rtl">ثبت پیام</h4>
                </div>
                <form id="messageForm">
                    <div class="modal-body" style="text-align: right">
                        {{csrf_field()}}
                        <label for="why_not" style="font-size: 20px;">لطفا پیام خود را در قسمت پایین تایپ نمایید</label>
                        <textarea id="message" name="message"  style="text-align: right" maxlength="10000" required="required"
                                  class="form-control" name="message" data-parsley-trigger="keyup"
                                  data-parsley-minlength="20" data-parsley-maxlength="300"
                                  data-parsley-minlength-message="شما حداقل باید 20 کاراکتر وارد کنید"
                                  data-parsley-validation-threshold="10"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="sendMessage" name="sendMessage" class="btn btn-primary col-md-12">ثبت
                            پیام
                        </button>
                        <input type="hidden" name="newOrderId" id="newOrderId" value="">
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>عنوان سفارش : {{$orders->title}}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link" data-toggle="tooltip" title="جمع کردن"><i
                                        class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link" data-toggle="tooltip" title="بستن"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <table style="direction:rtl;text-align: center" id="example"
                       class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <input type="hidden" id="token" value="{{ csrf_token() }}">
                    <thead>
                    <tr>
                        <th style="text-align: center">ردیف</th>
                        <th style="text-align: center">حالت بوم</th>
                        <th style="text-align: center">طول</th>
                        <th style="text-align: center">عرض</th>
                        <th style="text-align: center;border-right: 1px solid #d6d6c2">قطر</th>
                        <th style="text-align: center;border-right: 1px solid #d6d6c2">اندازه یک ضلع</th>
                        <th style="text-align: center;border-right: 1px solid #d6d6c2">وضعیت سفارش</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr class="unit">
                        <td style="font-size:18px;">{{1}}</td>
                        <td style="font-size:18px;">{{$orders->shape}}</td>
                        <td style="font-size:18px;">{{$orders->length}}</td>
                        <td style="font-size:18px;">{{$orders->width}}</td>
                        <td style="font-size:18px;">{{$orders->diameter}}</td>
                        <td style="font-size:18px;">{{$orders->sideways}}</td>
                        @if($orders->orderMessages[0]->status == 0)
                            <td style="font-size:18px;"><button class="btn btn-info col-md-10 col-md-offset-1">در حال بررسی</button></td>
                        @endif
                        @if($orders->orderMessages[0]->status == 1)
                            <td style="font-size:18px;"><button class="btn btn-warning col-md-10 col-md-offset-1">در حال انجام</button></td>
                        @endif
                        @if($orders->orderMessages[0]->status == 2)
                            <td style="font-size:18px;"><button class="btn btn-success col-md-10 col-md-offset-1">انجام شده</button></td>
                        @endif
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    @foreach($orders->orderMessages as $message)
                        <div class="x_content" style="">
                            <div class="item" dir="rtl">
                                <h4 class="control-label col-md-12 col-xs-12 question"><i
                                            class="fa fa-comments"></i><b>  پیام شما در تاریخ :</b>{{$message->persianDate}}<b>و ساعت:</b>  {{$message->time}}
                                </h4>
                                <div id="description" name="description"
                                     class="form-control col-md-12 col-xs-12 text-white"
                                     style="height: max-content;height:-moz-max-content;margin-bottom: 0 !important;">
                                    <p>{{$message->user_message}}</p>
                                </div>
                            </div>
                            @if($message->admin_message != null)
                                <div class="item" dir="rtl">
                                    <h4 class=" col-md-12 col-xs-12 bg-primary answer" for="description"><i
                                                class="fa fa-comments"></i><b>پیام مسئول سایت در تاریخ :</b>{{$message->jalaliDate}}<b> و ساعت: </b>{{$message->adminTime}}
                                    </h4>

                                    <div id="description" name="description" style="height: max-content;height:-moz-max-content;margin-bottom: 0 !important;"
                                         class="form-control col-md-12 col-xs-12 answer-text">
                                        <p>{{$message->admin_message}}</p>
                                    </div>
                                </div>
                            @endif

                        </div>
                    @endforeach
                        <div class="col-md-12">
                            <br>
                            <button  id="userMessage" value="{{$message->new_order_id}}" content="" type="button"
                                     class="col-md-2 btn btn-primary">ارسال پیام جدید
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).on('click','#userMessage',function () {
            var newOrderId = $(this).val();
            $('#newOrderId').val(newOrderId);
            $('#messageModal').modal('show');
        })
    </script>
    <script>
        $(document).on('click','#sendMessage',function(){
            var formData = new FormData($('#messageForm')[0]);
            $.ajax
             ({
                cache       : false,
                url         : "{{url('user/saveNewMessage')}}",
                type        : "post",
                dataType    : "json",
                contentType : false,
                processData : false,
                data        : formData,
                success     : function (response) {
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
                },error     : function(error)
                {
                    console.log(error);
                    swal
                    ({
                        title: '',
                        text: 'خطایی رخ داده است ، لطفا با بخش پشتیبانی تماس بگیرید',
                        type:'warning',
                        confirmButtonText: "بستن"
                    });
                    if (error.status === 422) {
                         $('#message').focus();
                         $('#message').css('border-color','red');
                        var errors = error.responseJSON; //this will get the errors response data.

                        var errorsHtml = '';

                        $.each(errors, function (key, value) {
                            errorsHtml += value[0] + '\n'; //showing only the first error.
                        });
                        //errorsHtml += errorsHtml;

                        swal({
                            title: "",
                            text: errorsHtml,
                            type: "warning",
                            confirmButtonText: "بستن"
                        });
                    }
                }
            })
        })
    </script>
@endsection

