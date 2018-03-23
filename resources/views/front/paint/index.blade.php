@extends('front.layout')

@section('content')

<main>
    <div class="container">
        <div class="row paint-name" id="paintName">
            <div class="col-md-12">
                <h3><i>Purple_Void</i></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" id="breadcrumbs">
                <a href="main_page.html#paintings"><small> Paintings </small></a> | 
                <a href="series.html"><small> Portrait Series </small></a> | Purple_Void
            </div>
        </div>
        <section class="paint" >
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <figure>
                        <a href="">
                            <img src="{{url('skins/front/img/pink_void_100x80.jpg')}}">
                        </a>
                    </figure>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="row paint-details">
                        <div class="col-12">
                            <h3>Purple_Void</h3>
                            <p>
                                <a href="series.html">
                                    Portrait Series
                                </a><br>
                                Painting<br>
                                <small>
                                    Size: "39.4" x "31.5"cm
                                </small>
                                <br>
                                <i><small>Shipping Info</small></i>
                            </p> 
                        </div>
                        <div class="col-12">
                            <h5>$2,350.00 USD</h5>
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
                        <i>"Purple_Void"</i>
                        <br>
                        Size: "39.4" x "31.5"cm
                        <br>
                        Year: 2017
                        <br>
                        Series: 
                        <a href="series.html">Portrait Series</a>
                        <br><br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Pellentesque nec nibh vitae lorem feugiat gravida. Integer molestie urna a leo vestibulum aliquam. 
                        Ut ultrices molestie aliquet. Sed vitae dui eu arcu posuere facilisis. Aenean tempor felis id bibendum pellentesque. 
                        Ut auctor porttitor dui ut condimentum. Fusce tellus massa, tempus sed sodales vestibulum, gravida sed dolor. 
                        Morbi erat lorem, vehicula eu sagittis quis, eleifend et quam. Ut ac nunc non tortor ultrices mattis. 
                        Aenean accumsan neque elit, sit amet pellentesque mauris elementum et. Proin in lacus vitae dolor tempus ullamcorper.    
                    </p>  
                </div>
            </div>
        </section>
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


</script>

@endpush
