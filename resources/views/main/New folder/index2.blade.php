<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<script type="text/javascript">

    //check if the page was called via ajax - if not, redirect to index.html, crawlers will ignore this and fetch the simple HTML pageHash
    function checkIfAsgard(){

        var thisHref = window.location.href;
        thisHref = thisHref.substr(thisHref.lastIndexOf('/') + 1);
        thisHref = thisHref.split(".html");

        if(typeof this["isAsgard"] === 'undefined')
            window.location.href = "index.html"+"#"+thisHref[0];

    }

    //check if the page was called via ajax - if not, redirect to index.html, crawlers will ignore this and fetch the simple HTML pageHash
    checkIfAsgard();

    function animateThis(){

        //custom inner page animations
        animatePage("home1", "right");
        animatePage("home2", "left");
        animatePage("home", "top");
        animatePage("home3", "bottom");

    }

    //animate buttons and other elements on hover
    animateOnHover();

    //function that handles all normal links
    linkage();

    //start nivo slider
//    $('#slider').nivoSlider();

    //function that handles blog list post animation and linking
    blogListPost();

</script>

<title>Asgard - Home page</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>

<!-- home background -->
<div class="full-width-background">
    <img src="{{url('public/main/images/backgrounds/grey.jpg')}}" alt="grey" />
</div>
<!-- home background -->
<!-- nivo slider -->
<div class="slider-wrapper theme-default" id="home">
    <div id="slider" class="nivoSlider">
        <img src="{{url('public/main/images/backgrounds/grey.jpg')}}" alt="grey" />
        <img src="{{url('public/main/images/backgrounds/grey.jpg')}}" alt="grey" />

        {{--        @foreach($sliders as $slide)--}}
{{--        <img src="{{url('public/dashboard/sliderImages/')}}{{'/'.$slide->image_src}}" alt="{{$slide->title}}" title="{{$slide->title}}" />--}}
        {{--@endforeach--}}
    </div>
    <div id="htmlcaption" class="nivo-html-caption">
        <strong>این </strong> یک مثال است <em>HTML</em> با عنوان <a href="#">یک لینک</a>. 
    </div>
</div>
<!-- nivo slider -->

<!-- header and paragraph -->
<div class="skeleton-center not-full container" id="home1">
    <div class="sixteen columns">
        <h1 class="first">لورم ایپسوم متن ساختگی </h1>
        <p class="last">
            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
        </p>
    </div>
</div>
<!-- header and paragraph -->

<!-- boxes with icons -->
<div class="skeleton-center not-full container" id="home2">
    <div class="sixteen columns">
        <!-- multiple columns and icons -->
        <div class="row" style="margin-bottom:0px">
            <div class="about-circle four columns alpha centered">
                {{--<img class="full-width-image" src="images/1-circle.png" alt="circle-1" />--}}
                <h5 class="circle-heading">لورم ایپسوم</h5>
                <p>
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد
                </p>
            </div>

            <div class="about-circle four columns centered">
                {{--<img class="full-width-image" src="images/2-circle.png" alt="circle-2" />--}}
                <h5 class="circle-heading">پشتیبانی از سرویس ابر</h5>
                <p>
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد
                </p>
            </div>

            <div class="about-circle four columns centered">
                {{--<img class="full-width-image" src="images/3-circle.png" alt="circle-3" />--}}
                <h5 class="circle-heading">لورم ایپسوم</h5>
                <p>
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد
                </p>
            </div>

            <div class="about-circle four columns omega centered">
                {{--<img class="full-width-image" src="images/4-circle.png" alt="circle-4" />--}}
                <h5 class="circle-heading">همه تحت حفاظت ما</h5>
                <p>
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد
                </p>
            </div>
        </div>
    </div>
</div>
<!-- boxes with icons -->

<!-- last part with header and text -->
<div class="skeleton-center not-full container" style="margin-bottom:20px" id="home3">
    <div class="sixteen columns">
        <h3 class="first">لورم ایپسوم متن ساختگی با تولید سادگی</h3>
        <p class="last">
            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد
        </p>
    </div>
</div>
<!-- last part with header and text -->

</body>
</html>
