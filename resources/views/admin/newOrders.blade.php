@extends('layouts.adminLayout')
@section('content')

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>مشخصات مشتریان</h2>
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
                            <th style="text-align: center">نام مشتری</th>
                            <th style="text-align: center">شماره همراه مشتری</th>
                            <th style="text-align: center">استان محل سکونت مشتری</th>
                            <th style="text-align: center;border-right: 1px solid #d6d6c2">مشاهده سفارشات مشتری</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $i = 0 ?>
                        @foreach($data as $datum)
                            <tr class="unit">
                                <td style="font-size:18px;">{{++$i}}</td>
                                <td style="font-size:18px;">{{$datum->name .chr(10). $datum->family}}</td>
                                <td style="font-size:18px;">{{$datum->cellphone}}</td>
                                <td style="font-size:18px;">{{$datum->capital_city}}</td>
                                <td style="font-size:18px;"><a class="btn btn-dark" href="{{url('admin/showNewOrders/'.$datum->id)}}">مشاهده سفارشات</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>




@endsection
