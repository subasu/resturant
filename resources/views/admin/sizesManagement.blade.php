@extends('layouts.adminLayout')
@section('content')

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> مدیریت و نمایش اندازه های : <strong style="color: red;">{{$title}}</strong></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link" data-toggle="tooltip" title="جمع کردن"><i
                                        class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link" data-toggle="tooltip" title="بستن"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>


                <a href="{{url('admin/addSizes')}}" id="" type="button" class="col-md-2 col-md-offset-5 btn btn-info" style="font-weight: bold;">
                    افزودن اندازه جدید                </a>
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
                            <th style="text-align: center">وضعیت</th>
                            <th style="text-align: center;border-right: 1px solid #d6d6c2">ویرایش</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0;?>
                        @foreach($data as $datum)
                            <tr class="unit">
                                <td style="font-size: 120%;">{{++$i}}</td>
                                <td style="font-size: 120%;">{{$datum->length}}</td>
                                <td style="font-size: 120%;">{{$datum->width}}</td>
                                <td style="font-size: 120%;">{{$datum->diameter}}</td>
                                <td style="font-size: 120%;">{{$datum->sideways}}</td>
                                @if($datum->active == 1)
                                    <td style="color: green; font-size: 150%;">فعال</td>
                                @endif
                                @if($datum->active == 0)
                                    <td style="color:red; font-size : 150%;">غیر فعال</td>
                                @endif
                                <td style="font-size: 120%;"><a class="btn btn-warning col-md-8 col-md-offset-2"  href="{{url('admin/editSize')}}/{{$datum->id}}">ویرایش</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



@endsection
