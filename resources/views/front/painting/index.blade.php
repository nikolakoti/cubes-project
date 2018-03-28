@extends('front.layout')

@section('head_title', $painting->name . ' ' .
' | ' . trans('front.painting_title'))

@section('content')

<main id="onePaintDetails">
    <div class="container">
        <div class="row paint-name" id="paintName">
            <div class="col-md-12">
                <h3><i>{{$painting->name}}</i></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" id="breadcrumbs">
                <a href="{{route('home') . '#paintings'}}"><small> Paintings </small></a> | 


                <a href="{{$painting->frontendSeriesUrl()}}"><small>{{$painting->series->series_name}}</small></a>


                |<span> {{$painting->name}}</span>
            </div>
        </div>
        <section class="paint" >
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <figure id="pointer">

                        <img src="{{url('skins/front/img/' . $painting->img_photo_name)}}">

                    </figure>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="row paint-details">
                        <div class="col-12">
                            <h3>{{$painting->name}}</h3>
                            <p>
                                <a href="{{$painting->frontendSeriesUrl()}}">
                                    {{$painting->series->series_name}}
                                </a><br>
                                Painting<br>
                                <small>
                                    Size: {{$painting->size}}cm
                                </small>
                                <br>
                                <i><small>Shipping Info</small></i>
                            </p> 
                        </div>
                        <div class="col-12">
                            <h5>${{$painting->price}} USD</h5>
                            <button type="button" class="button-cart">
                                Add to 
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </div>
                        <div class="col-12">
                            <p>
                                <br>
                                <i class="fa fa-check"></i> Shipping included<br>
                                <i class="fa fa-check"></i> 7-day money back guarantee<br>
                                <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                Trustpilot Score 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-12">
                <h4>Art Description</h4>
            </div>
        </div>
        <section class="art-description">
            <div class="row">
                <div class="col-12 text-justify">
                    <p>
                        <i>"{{$painting->name}}"</i>
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
            </div>
        </section>
    </div>

</main>

<main class="fullPaint" style="display: none;">
    <div class="container">
        <nav class="navbar navbar-light bg-transparent" id="fullPagePaint">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{url('/skins/front/img/Logo Petar.jpg')}}" alt="Artist Signature">
            </a>
            <button 
                type="button" 
                class="btn btn-secondary" 
                data-toggle="tooltip" 
                data-placement="bottom" 
                title="Close"
                >
                <b>x</b>
            </button>
        </nav>
        <div class="full-page-paint">
            <a href="">
                <img src="{{url('skins/front/img/' . $painting->img_photo_name)}}">
            </a>
        </div>
    </div>
</main>

@endsection


@push('footer_javascript')

<script>

    $(document).ready(function () {

        $(window).on('scroll', function () {

            var targetElement = $('#mainNavbar');

            var container = $('#containerNav');

            var logo = container.find('a.navbar-brand');

            if ($(this).scrollTop() >= 0) {

                logo.removeAttr('style');

                targetElement.removeClass('bg-transparent');

                targetElement.addClass('bg-white');

            }
        }).trigger('scroll');
    });

    $(document).ready(function () {
        $('#smooth-scrolling').on('click', function () {
            $("html, body").animate({scrollTop: 0}, 1000);
            return false;
        });
    });

    $(document).ready(function () {

        $('#pointer').on('click', function () {

            $('#mainNavbar').hide();
            $('#onePaintDetails').hide();
            $('#footer').hide();
            $('main.fullPaint').removeAttr('style');
        });
    });

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    $(document).ready(function () {
        var targetElement = $('[data-toggle="tooltip"]');

        var currentPageURL = window.location.pathname;
        
        $(targetElement).on('click', function () {
            window.location.href = currentPageURL;


        });
    });


</script>

@endpush
