
@extends('front.layout')

@section('head_title', trans('front.home-page_title'))

@section('content')
<!-- Intro Image (First Parallax Image) -->
<div class="bgimg-1 container-fluid"></div><!-- Intro image -->


<!-- Main Layout Start-->
<main>
    <!-- Portfolio Section Start -->
    <div class="container">
        <div class="row artist" id="about">
            <div class="col-md-12 text-center pb-3">
                <h3>BIOGRAPHY</h3>
            </div>
        </div>
        <div class="row align-items-start mb-md-4">
            <div class="col-md-12 col-lg-6">
                <figure>
                    <img src="{{url('/skins/front/img/about.jpg')}}" alt="Artist picture in atelier"/>
                </figure>
            </div>
            <div id="biography"  class="col-md-12 col-lg-6 pt-2 pb-2">
                <article class="text-center">
                    <p>
                        <strong>Petar Smiljanic</strong> was born in Valjevo, Serbia in 1985. 
                        He graduated from Faculty of Architecture in 2009 
                        in Belgrade, Serbia. After he finished master in 
                        Architecture he was working in several international 
                        companies. He showed passion about painting in 
                        his early age, learning from his father who is engaged 
                        to this art. He is currently based in Shenzhen China, 
                        where in parallel to his job as an architect he strives 
                        to express his passion on canvas.
                    </p>
                </article>
            </div>
        </div>

    </div><!-- Portfolio Section End -->

    <!-- Second Parallax Image with Paintings -->
    <div class="bgimg-2 container-fluid"></div>

    <!-- About Section Start -->
    <div class="container">
        <div class="row series mb-md-4" id="paintings">
            <div class="col-md-12 text-center pb-md-3">
                <h3>MY WORK</h3>
                <p><i>Click on the image to see all paintings from collection</i></p>
            </div>
            @foreach(\App\Models\Series::get() as $oneSeries)
            <div class="col-sm-12 col-md-6 col-lg-4 text-center pb-4">
                <a  href="{{$oneSeries->frontendUrl()}}">
                    <figure class="notice">
                        <img src="{{url('/skins/front/img/' . $oneSeries->series_photo_filename)}}" class="image" alt="{{$oneSeries->series_name}}"/>
                        <div class="content">
                            <h6>{{$oneSeries->series_name}}</h6>
                            <p>See collection</p>
                        </div>
                    </figure>
                </a>
                <div class="text-center caption">
                    <h5>{{$oneSeries->series_name}}</h5>
                </div>
            </div>
            @endforeach
        </div>
    </div><!-- About Section End -->

    <!-- Third Parallax Image -->
    <div class="bgimg-3 container-fluid"></div>

    <!-- Contact Section Start -->
    <div class="container">
        <div class="row contact pb-md-4" id="contact">
            <div class="col-md-12 text-center pb-md-3">
                <h3>GET IN TOUCH</h3>
                <p>
                    For all inquiries please contact me at 
                    <a href="mailto:petar.smiljanic@yahoo.com">petar.smiljanic@yahoo.com</a> 
                    or fill out the form
                </p>
            </div>
            <div class="col-md-12 col-lg-5 text-center">
                <figure >
                    <img src="{{url('/skins/front/img/contact_image.jpg')}}" alt=""/>
                </figure>
            </div>
            <div class="col-md-12 col-lg-7 pb-4 pt-2 pt-lg-0">
                <div id="message" class="row"></div>
                <form method="post" action="" class="form-control" id="contactForm">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group pb-1 col-md-6">
                            <input 
                                type="text" 
                                name="contactName" 
                                class="form-control text-uppercase"
                                placeholder="Your Name"
                                >
                            <div class="error pt-3"></div>
                            @if($errors->has('contactName'))
                            <div class="form-errors text-danger">
                                @foreach($errors->get('contactName') as $errorMessage)
                                <label class="error">{{$errorMessage}}</label>
                                @endforeach
                            </div>  
                            @endif
                        </div>

                        <div class="form-group pb-1 col-md-6">
                            <input 
                                type="text" 
                                name="contactEmail" 
                                class="form-control text-uppercase"
                                placeholder="Your Email"
                                >
                            <div class="error pt-3"></div>
                            @if($errors->has('contactEmail'))
                            <div class="form-errors text-danger">
                                @foreach($errors->get('contactEmail') as $errorMessage)
                                <label class="error">{{$errorMessage}}</label>
                                @endforeach
                            </div>  
                            @endif
                        </div>
                    </div>

                    <div class="form-group pt-1 pb-1">
                        <input 
                            type="text" 
                            name="subject" 
                            class="form-control text-uppercase"
                            placeholder="Subject"
                            >
                        <div class="error pt-3"></div>
                        @if($errors->has('subject'))
                        <div class="form-errors text-danger">
                            @foreach($errors->get('subject') as $errorMessage)
                            <label class="error">{{$errorMessage}}</label>
                            @endforeach
                        </div>  
                        @endif
                    </div>

                    <div class="form-group pt-1 pb-1">
                        <textarea 
                            name="contactMessage" 
                            class="form-control text-uppercase justify-content-end"
                            rows="12"
                            placeholder="Message"></textarea>
                        <div class="error pt-3"></div>
                        @if($errors->has('contactMessage'))
                        <div class="form-errors text-danger">
                            @foreach($errors->get('contactMessage') as $errorMessage)
                            <label class="error">{{$errorMessage}}</label>
                            @endforeach
                        </div>  
                        @endif
                    </div>
                    <div class="form-group pt-1">
                        <button type="submit" class="btn btn-dark px-4" data-action="submit">
                            <i class="fa fa-paper-plane pr-1" aria-hidden="true"></i>  
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- Contact Section End -->
</main><!-- Main Layout End -->
@endsection

@push('footer_javascript')

<script>


//Form Validation
$(document).ready(function () {

    $(".form-control").validate({
        highlight: function (element) {
            $(element).closest('.form-group').addClass("has-danger");
            $(element).addClass("form-control-danger");
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
            $(element).removeClass('form-control-danger').addClass('form-control-success');
        },
        rules: {
            contactName: {
                required: true,
                minlength: 2
            },

            contactEmail: {
                required: true,
                email: true
            },

            contactMessage: {
                required: true,
                minlength: 5
            },

            subject: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            contactName: {
                required: "Please enter your name"
            },

            contactEmail: {
                required: "Please enter your email address"
            },

            contactMessage: {
                required: "Please write something"
            },

            subject: {

                required: "Please enter subject"
            }

        },
        errorElement: 'p',
        errorPlacement: function (error, element) {
            error.appendTo($(element).closest('.form-group').find('.error').fadeIn('slow'));
        }
    });


    $(this).on('scroll', function () {

        var targetElement = $('#mainNavbar');

        if ($(this).scrollTop() > 200) {

            targetElement.slideDown(700);

        } else {

            targetElement.slideUp(700);


        }
    }).trigger('scroll');

    var navHome = $('.nav-link:first');

    $('#smooth-scrolling').on('click', function () {
        $("html, body").animate({scrollTop: 0}, 800);
        return false;
    });

    navHome.on('click', function () {
        $("html, body").animate({scrollTop: 0}, 800);
        return false;
    });


    $('a[href^="#"]').on('click', function () {
        var href = $.attr(this, 'href');

        $('html, body').animate({
            scrollTop: $(href).offset().top
        }, 500, function () {
            window.location.hash = href;
        });

       
        if ($(window).width() < 768) {

            $('a[href^="#"]').on('click', function () {

                $('button.navbar-toggler').trigger('click');

            });

        }

        return false;
    });


    $('#contactForm').on('submit', function (e) {

        e.preventDefault();

        function removeClass(form, element, className) {

            var target = form.find(element);

            target.removeClass(className);

            return form[0].reset();

        }


        var name = $('[ name="contactName" ]').val();
        var email = $('[ name="contactEmail" ]').val();
        var message = $('[ name="contactMessage" ]').val();
        var subject = $('[ name="subject" ]').val();

        $.ajax({

            'type': 'POST',
            'url': "{{route('contact')}}",
            'data': {
                'contactName': name,
                'contactEmail': email,
                'contactMessage': message,
                'subject': subject,
                '_token': '{{csrf_token()}}'
            },

            beforeSend: function () {

                if (name !== '' && email !== '' && message !== '' && subject !== '') {

                    var target = $('#contactForm').find('[data-action="submit"]');

                    var newContent = '<i class="fa fa-paper-plane" aria-hidden="true"></i>' + ' Sending Message...';

                    target.html(newContent);
                }

            }


        }).done(function (data) {

            $('#message').html(data.success);

            removeClass($('#contactForm'), 'div.form-group', 'has-success');


            var target = $('#contactForm').find('[data-action="submit"]');

            var deafultContent = '<i class="fa fa-paper-plane" aria-hidden="true"></i>' + ' Send Message';

            target.html(deafultContent);

        }).fail(function (data) {



            var errors = data.responseJSON.errors;

            if (data.status !== 200 && data.readyState !== 4) {

                var errorMessage = '<div class="col-sm-12">' +
                        '<div class="alert alert-danger" role="alert">' +
                        '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                        'Ups... Something went wrong!' +
                        '</div>' +
                        '</div>';

                $('#message').html(errorMessage);
            }

        });

    });

});












</script>

@endpush