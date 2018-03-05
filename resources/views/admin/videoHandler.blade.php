{{--@extends('layouts.adminLayout')--}}
{{--@section('content')--}}

    {{--<div class="">--}}
        {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
        {{--<h2 class="">مشاهده فیلم آموزشی</h2>--}}
    {{--</div>--}}
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ URL::asset('public/dashboard/css/custom.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body{
            background: #ffffff !important;
            margin-top: 1%;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12" >
            <div class="col-md-6">
                <a id="playVideo"><button class="btn btn-success col-md-12" data-toggle="" title="">پخش ویدئو آموزشی</button></a>
            </div>
            <div class="col-md-6">
                <a id="pauseVideo"><button class="btn btn-warning col-md-12" data-toggle="" title="">توقف ویدئو آموزشی</button></a>
            </div>
        </div>
            <div class="col-md-12">
                <video class="video"
                       id="video" name="video_src">
                    <source id="playingVideo"
                            src="{{url('public/dashboard/trainingVideos/'.$parameter.'.mp4')}}">
                </video>
            </div>

    </div>
</div>
</body>
</html>
<script>

    $(document).on('click', '#playVideo', function () {

        var video = document.getElementById('video');
        if (video != null) {
            video.play();
            $(this).find('button').addClass('disabled');
            $('#pauseVideo').find('button').removeClass('disabled');
//            $('#pauseVideo').show();
        }

    })
    $(document).on('click', '#pauseVideo', function () {
//        $(this).hide();
        $('#playVideo').find('button').removeClass('disabled');
        $(this).find('button').addClass('disabled');
        var video = document.getElementById('video');
        video.pause();
    })

</script>
{{--@endsection--}}