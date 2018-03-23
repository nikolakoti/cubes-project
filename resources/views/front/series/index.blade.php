@extends('front.layout')

@section('content')

<!--MAIN Start-->
<main>
    <!-- CONTAINER SERIES NAME -->
    <div class="container" id="categoryTitle">
        <div class="col-md-12 text-muted" id="breadcrumbsCategory">
            <a href="{{route('home')}}"><small> Home </small></a> | 
            <a href="{{route('home') . '#paintings'}}"><small> Paintings  </small></a> | Portrait Series
        </div>
        <hr>
        <div class="row justify-content-center row-series-name">
            <h1>Portrait Series</h1>
        </div>
    </div><!-- CONTAINER SERIES NAME END -->

    <!-- CONTAINER SERIES CONTENT -->
    <div class="container">
        <section class="item-wrapper mb-4">
            <div class="row align-items-end justify-content-center">
                <figure class="col-md-6">
                    <a href="{{route('paint', ['id' => 1])}}">
                        <img src="{{url('/skins/front/img/pink_void_100x80.jpg')}}" alt=""/>
                    </a>
                    <div>
                        <h5 class="text-left mb-0">
                            "Pink_Void"
                        </h5>
                    </div>
                    <div id="paintDetails">
                        <small class="text-muted">Painting, "100" x "80"cm</small>
                    </div>
                    <div id="paintPrice">
                        <p>$2,350.00</p>
                    </div>
                </figure>
            </div>
        </section>
        <section class="item-wrapper mb-4">
            <div class="row align-items-end justify-content-center">
                <figure class="col-md-6">
                    <a href="#">
                        <img src="{{url('skins/front/img/black_void120x100cm.jpg')}}" alt=""/>
                    </a>
                    <div>
                        <h5 class="text-left mb-0">
                            "Black_Void"
                        </h5>
                    </div>
                    <div id="paintDetails">
                        <small class="text-muted">Painting, "120" x "100"cm</small>
                    </div>
                    <div id="paintPrice">
                        <p>$2,350.00</p>
                    </div>
                </figure>
            </div>
        </section>
       
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