@extends('front.layout')

@section('head_title', $oneSeries->series_name)

@section('content')

<!--MAIN Start-->
<main id="series" style="background-color: #f7f7f7;">

    <!-- CONTAINER SERIES NAME -->
    <div class="container" id="categoryTitle">
        <div class="col-md-12 text-muted" id="breadcrumbsCategory">
            <a href="{{route('home')}}"><small> Home </small></a> | 
            <a href="{{route('home') . '#paintings'}}"><small> Paintings  </small></a> 
        </div>
        <hr>
        <h1 class="text-center pt-2 pb-2"></h1>
    </div><!-- CONTAINER SERIES NAME END -->

    <!-- CONTAINER SERIES CONTENT -->
    <div class="container" id="series-content">
        <div id="artist-statement" class="col-sm-12 text-center pb-2">
            <article>
                <p></p>
            </article>
        </div>
        <section class="item-wrapper pb-2">
            <div id="collection-holder" class="row justify-content-center">
                <figure class="col-md-6"></figure>
            </div>
        </section>

        <div id="template-series-content" style="display: none;">
            <a>
                <img/>
            </a>
            <p></p>
        </div>
        <div id="loader"></div>
    </div><!-- CONTAINER SERIES CONTENT END -->

</main><!--MAIN End-->

@endsection

@push('footer_javascript')

<script>

    $(document).ready(function () {

        $(window).on('scroll', function () {

            var targetElement = $('#mainNavbar');

            if ($(this).scrollTop() >= 0) {

                targetElement.slideDown(700);

            }
        }).trigger('scroll');


    });

    $(document).ready(function () {

        $('#smooth-scrolling').on('click', function () {
            $("html, body").animate({scrollTop: 0}, 1500);
            return false;
        });

        var hyperlink = $('#breadcrumbsCategory').find('a:odd');

        hyperlink.after(' | {{$oneSeries->series_name}}');

        var title = $('#categoryTitle').find('h1');

        title.html('{{$oneSeries->series_name}}');

        //console.log(title);

        $.ajax({

            "type": "GET",
            "url": "{{route('series.ajax', ['id' => $oneSeries->id])}}",
            "cache": false

        }).done(function (response) {

            var i;

            for (i in response.paintings) {

                var singlePaint = response.paintings[i];

                var template = $('#template-series-content').clone();

                var img = template.find('img');

                img.attr({
                    'src': "{{url('/skins/front/img')}}" + "/" + singlePaint.img_photo_name,
                    'alt': singlePaint.name,
                    'class': "pt-4"
                });
                var paintDesc = singlePaint.name + ", " + " " + singlePaint.year + ", " + " oil on canvas " + singlePaint.size + "cm";

                var hyperlink = template.find('a');

                hyperlink.html(img);

                var paragraph = template.find('p');

                paragraph.attr('class', 'pt-1 pb-1 pl-1').css('background-color', '#ffff');

                hyperlink.appendTo('#collection-holder figure');

                paragraph.html(paintDesc);

                paragraph.appendTo('#collection-holder figure');

                var seriesConcept = response.artistStatement;

                $('#artist-statement').find('article p').html(seriesConcept);
            }

            var paintsURL = [response.paintsURL];

            var hyperlinks = $('#collection-holder a');

            for (var x = 0; x < hyperlinks.length; x++) {

                for (var index in paintsURL) {

                    var singlePaintURL = paintsURL[index];
                }

                $(hyperlinks[x]).attr({
                    'href': singlePaintURL[x]
                });

            }

        });



    });




</script>

@endpush