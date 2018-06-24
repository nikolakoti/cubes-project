@extends('front.layout')

@section('head_title', $painting->name)

@section('content')

<main id="onePaintDetails" style="background-color: #f7f7f7;">
    <div class="container" id="categoryTitle">
        <!--        <div class="col-md-12 text-muted" id="breadcrumbsCategory">
                    <a href="{{route('home')}}"><small> Home </small></a> |
                    <a href="{{route('home') . '#paintings'}}"><small> Paintings </small></a> | 
                    <a href="{{$painting->frontendSeriesUrl()}}"><small>{{$painting->series->series_name}}</small></a>
                    |<span> {{$painting->name}}</span>
                </div>
                <hr>-->

        <section class="item-wrapper" style="padding-top: 90px; padding-bottom: 90px;">
            <div class="row justify-content-center">
                <figure class="col-md-8" >
                    <a class="image-popup-no-margins" href="{{url('skins/front/img/' . $painting->img_photo_name)}}">
                        <img src="{{url('skins/front/img/' . $painting->img_photo_name)}}">
                    </a>

                    <div class="col-md-12 pt-4 pb-3 art-description" style="background-color: #fff;">
                        <h4 class="text-uppercase">{{$painting->name}}</h4>
                        <p>
                            <br>
                            Size: {{$painting->size}}cm
                            <br>
                            Year: {{$painting->year}}
                            <br>
                            Series: 
                            <a href="{{$painting->frontendSeriesUrl()}}">{{$painting->series->series_name}}</a>
                            <br><br>
                            {{$painting->description}} 
                        </p>  
                    </div>
                </figure>
            </div>
        </section>
    </div>
</main>


@endsection

@push('header_css')
<link href="{{url('/skins/front/js/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css"/>
@endpush


@push('footer_javascript')
<script src="{{url('/skins/front/js/magnific-popup/magnific-popup.min.js')}}" type="text/javascript"></script>

<script>

$(document).ready(function () {

    $(window).on('scroll', function () {

        var targetElement = $('#mainNavbar');

        if ($(this).scrollTop() >= 0) {

            targetElement.slideDown(700);

        }
    }).trigger('scroll');

    $('#smooth-scrolling').on('click', function () {
        $("html, body").animate({scrollTop: 0}, 500);
        return false;
    });

    $('.image-popup-no-margins').magnificPopup({
        type: 'image',
        removalDelay: 300,
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        mainClass: 'mfp-no-margins mfp-with-zoom',
        image: {
            verticalFit: false
        },
        zoom: {
            enabled: true,
            duration: 300,
            easing: 'ease-in-out',

            opener: function (openerElement) {
                return openerElement.is('img') ? openerElement : openerElement.find('img');
            }
        }
    });


});

</script>

@endpush
