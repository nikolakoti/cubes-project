
@extends('front.layout')

@section('head_title', trans('front.home-page_title'))

@section('content')
<!-- Intro Image -->
<div class="bgimg-1 container-fluid"></div><!-- Intro image -->

<!-- Main Navigation End-->

<!-- Main Layout Start-->
<main>
    <!-- About Section Start -->
    <div class="container">
        <div class="row artist" id="about">
            <article class="text-center mb-md-3">
                <h3>BIOGRAPHY</h3>
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
            <div class="col-md-7 mb-md-5">
                <figure>
                    <img src="{{url('/skins/front/img/artist_atelier.jpg')}}" alt="Artist picture in atelier"/>
                </figure>
            </div>
            <div class="col-md-5">
                <article class="text-center mb-md-0">
                    <h3 style="margin-top: -10px;">ARTIST STATEMENT / CONCEPT</h3>
                    <p>
                        <strong>"Human Arch - Scape"</strong> is a series of paintings that 
                        interpret the human figure as a building block of 
                        architectural cityscape. Using various levels of 
                        abstraction and experimenting with the scale, artist 
                        develops a dialog in which the human is simultaneously 
                        city's creator and destroyer of its physical and social 
                        ecosystem. Knowledge, sense of space perspective as 
                        well as digital media techniques derived from his 
                        architectural background help him create a unity 
                        of the human and the city in a contextual heterogeneous 
                        matrix. The context varies depending on artist's current 
                        location, interests and emotions, all of which are 
                        explored in his painting process.<br>

                        <strong>"Portrait Series"</strong> showing existence and presence 
                        in the city. How does city becomes destroyer of human, 
                        or it is inevitable that we will destroy each other. 
                        We create city and city create "urbanites" with 
                        different moral, ethical and personal values.<br>

                        <strong>"Human City - Scape"</strong> consectetur adipiscing elit. 
                        Aenean consectetur nec felis sed iaculis. Orci varius natoque penatibus 
                        et magnis dis parturient montes, nascetur ridiculus mus. Praesent consectetur hendrerit fermentum. 
                        Fusce ullamcorper sapien vel metus lobortis, quis auctor dolor porttitor. Nullam tincidunt arcu felis. 
                        Maecenas facilisis, sem ac interdum convallis, ante sapien lacinia lacus, sit amet venenatis ex turpis 
                        vestibulum enim. Nunc sed auctor mauris, et varius arcu. 
                    </p>
                </article>
            </div>
        </div>
    </div><!-- About Section End -->

    <!-- Second Parallax Image with Paintings -->
    <div class="bgimg-2 container-fluid"></div>

    <!-- Container (Portfolio Section) -->
    <div class="container">
        <div class="row series" id="paintings">
            <div class="col-md-12 text-center mb-md-3">
                <h3>MY WORK</h3>
                <p><i>Click on the image to see all paintings from collection</i></p>
            </div>
            @foreach(\App\Models\Series::get() as $oneSeries)
            <div class="col-md-12 col-lg-4 text-center">
                <a  href="{{$oneSeries->frontendUrl()}}">
                    <figure class="notice">
                        <img src="{{url('/skins/front/img/' . $oneSeries->series_photo_filename)}}" class="image" alt=""/>
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
    </div>
    <!-- Third Parallax Image Contact -->
    <div class="bgimg-3 container-fluid"></div>
    <div class="container">
        <div class="row contact" id="contact">
            <div class="col-md-12 text-center mb-md-3">
                <h3>CONTACT</h3>
                <p>
                    For all inquiries please contact me at 
                    <a href="mailto:petar.smiljanic@yahoo.com">petar.smiljanic@yahoo.com</a> 
                    or fill out the form
                </p>
            </div>
            <div class="col-md-5 text-center">
                <figure>
                    <img src="{{url('/skins/front/img/contact_image.jpg')}}" alt="Artist picture in atelier"/>
                </figure>
            </div>
            <div class="col-md-7">
                <form method="post" action="" class="form-control" id="contactForm">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group" id="labelName">
                                <label>Name*</label>
                                <input type="text" name="contactName" class="form-control">
                                <div class="error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="labelEmail">
                                <label>Email Address*</label>
                                <input type="text" name="contactEmail" class="form-control text-muted">
                                <div class="error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="labelMessage">
                        <label>Message*</label>
                        <textarea name="contactMessage" class="form-control"></textarea>
                        <div class="error"></div>
                    </div>
                    <button type="submit" class="btn btn-dark px-4 mt-3" data-action="submit">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>  
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</main><!-- Main Layout End -->
@endsection

@push('footer_javascript')

<script>

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
                    rangelength: [3, 50]
                },

                contactEmail: {
                    required: true,
                    email: true
                },

                contactMessage: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                contactName: {
                    required: "Name field is required!",
                    rangelength: "Name must be between 3 and 50 characters!"
                },

                contactEmail: {
                    required: "Email field is required!",
                    email: "Please enter a valid email address!"
                },

                contactMessage: {
                    required: "Message field is required!",
                    minlength: "Message must have at least 5 characters!"
                }
            },
            errorElement: 'p',
            errorPlacement: function (error, element) {
                error.appendTo($(element).closest('.form-group').find('.error'));
            }
        });


    });
    //Form Validation

    $(document).ready(function () {

        $(window).on('scroll', function () {

            var targetElement = $('#mainNavbar');

            var container = $('#containerNav');

            var logo = container.find('a.navbar-brand');

            if ($(this).scrollTop() > 100) {

                logo.removeAttr('style');

                targetElement.removeClass('bg-transparent');

                targetElement.addClass('bg-white');

            } else {

                targetElement.removeClass('bg-white');

                targetElement.addClass('bg-transparent');

                logo.attr('style', 'display:none;');

            }
        }).trigger('scroll');
    });

    $(document).ready(function () {

        $(window).on('scroll', function () {

            if ($(this).scrollTop() === 0) {
                window.location.href = "/";
            }

        });
    });

    $(document).ready(function () {

        $('#smooth-scrolling').on('click', function () {
            $("html, body").animate({scrollTop: 0}, 1500);
            return false;
        });
    });
    
    

</script>

@endpush