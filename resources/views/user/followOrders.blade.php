@extends('layouts.userLayout')
@section('content')

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>سفارشات :</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link" data-toggle="tooltip" title="جمع کردن"><i
                                        class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link" data-toggle="tooltip" title="بستن"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table style="direction:rtl;text-align: center" id="example"
                           class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <input type="hidden" id="token" value="{{ csrf_token() }}">
                        <thead>
                        <tr>
                            <th style="text-align: center">ردیف</th>
                            <th style="text-align: center">عنوان</th>
                            <th style="text-align: center">تعداد</th>
                            <th style="text-align: center;border-right: 1px solid #d6d6c2">وضعیت سفارش</th>
                            <th style="text-align: center;border-right: 1px solid #d6d6c2">بررسی توضیحات و تعیین وضعیت</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $i = 0 ?>
                        @foreach($orders as $order)
                            <tr class="unit">
                                <td style="font-size:18px;">{{++$i}}</td>
                                <td style="font-size:18px;">{{$order->title}}</td>
                                <td style="font-size:18px;">{{$order->count}}</td>
                                @if($order->orderMessages[0]->status == 0)
                                    <td style="font-size:18px;">
                                        <button class="btn btn-info col-md-10">در حال بررسی</button>
                                    </td>
                                @endif
                                @if($order->orderMessages[0]->status == 1)
                                    <td style="font-size:18px;">
                                        <button class="btn btn-warning col-md-10">در حال انجام</button>
                                    </td>
                                @endif
                                @if($order->orderMessages[0]->status == 2)
                                    <td style="font-size:18px;">
                                        <button class="btn btn-success col-md-10">انجام شده</button>
                                    </td>
                                @endif
                                <td style="font-size:18px;"><a class="btn btn-dark" href="{{url('user/showOrdersMessage/'.$order->id)}}">بررسی توضیحات و ارسال پیام</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>




@endsection
