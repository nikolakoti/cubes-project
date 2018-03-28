@extends('front.layout')

@section('head_title', $oneSeries->series_name)

@section('content')

<!--MAIN Start-->
<main>
    <!-- CONTAINER SERIES NAME -->
    <div class="container" id="categoryTitle">
        <div class="col-md-12 text-muted" id="breadcrumbsCategory">
            <a href="{{route('home')}}"><small> Home </small></a> | 
            <a href="{{route('home') . '#paintings'}}"><small> Paintings  </small></a> | {{$oneSeries->series_name}}
        </div>
        <hr>
        <div class="row justify-content-center row-series-name">
            <h1>{{$oneSeries->series_name}}</h1>
        </div>
    </div><!-- CONTAINER SERIES NAME END -->

    <!-- CONTAINER SERIES CONTENT -->
    <div class="container">
        @foreach($oneSeries->paintings as $painting)
        <section class="item-wrapper mb-4">
            <div class="row align-items-end justify-content-center">
                <figure class="col-md-6">
                    <a href="{{$painting->frontendUrl()}}">
                        <img src="{{url('/skins/front/img/' . $painting->img_photo_name)}}" alt="{{$painting->name}}"/>
                    </a>
                    <div>
                        <h5 class="text-left mb-0">
                            "{{$painting->name}}"
                        </h5>
                    </div>
                    <div id="paintDetails">
                        <small class="text-muted">Painting, {{$painting->size}}</small>
                    </div>
                    <div id="paintPrice">
                        <p>${{$painting->price}}</p>
                    </div>
                </figure>
            </div>
        </section>
        @endforeach


    </div><!-- CONTAINER SERIES CONTENT END -->

</main><!--MAIN End-->

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
            $("html, body").animate({scrollTop: 0}, 1500);
            return false;
        });
    });


</script>

@endpush