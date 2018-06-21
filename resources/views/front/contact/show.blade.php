@extends('front.layout')

@section('head_title', trans('front.home-page_title'))

@section('content')

<main>
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
                    <img id="contact-image" src="{{url('/skins/front/img/contact_image.jpg')}}" alt="Artist picture in atelier"/>
                </figure>
            </div>

            <div class="col-md-7">
                <div class="row">
                    <div class="col-sm-12">
                        @if(!empty($systemMessage))
                        <div class="alert alert-success alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{$systemMessage}}
                        </div>
                        @endif()
                    </div>
                </div>
                <form method="post" action="{{route('contact')}}" class="form-control" id="contactForm">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group" id="labelName">
                                <label>Name*</label>
                                <input type="text" name="contactName" class="form-control">

                                @if($errors->has('contactName'))
                                <div class="form-errors text-danger">
                                    @foreach($errors->get('contactName') as $errorMessage)
                                    <label class="error">{{$errorMessage}}</label>
                                    @endforeach
                                </div>  
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="labelEmail">
                                <label>Email Address*</label>
                                <input type="text" name="contactEmail" class="form-control text-muted">
                                @if($errors->has('contactEmail'))
                                <div class="form-errors text-danger">
                                    @foreach($errors->get('contactEmail') as $errorMessage)
                                    <label class="error">{{$errorMessage}}</label>
                                    @endforeach
                                </div>  
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="labelMessage">
                        <label>Message*</label>
                        <textarea name="contactMessage" class="form-control"></textarea>
                        @if($errors->has('contactName'))
                        <div class="form-errors text-danger">
                            @foreach($errors->get('contactMessage') as $errorMessage)
                            <label class="error">{{contactMessage}}</label>
                            @endforeach
                        </div>  
                        @endif
                    </div>
                    <button type="submit" class="btn btn-dark px-4 mt-3" data-action="submit">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>  
                        Send Message
                    </button>
                </form>
            </div>
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
            $("html, body").animate({scrollTop: 0}, 1500);
            return false;
        });
    });


    $('#contactForm').on('submit', function () {

        var name = $('[name="contactName]').val();
        var email = $('[name="contactEmail]').val();
        var message = $('[name="contactMessage]').val();
        
        $.ajax({
            
            'type': 'POST',
            'url': "{{route('contact-process')}}",
            'data': {
                'name': name,
                'email': email,
                'message': message,
                '_token': '{{csrf_token()}}'
            }
        }).done(function(response) {
            
            alert(response);
        });
    });




</script>

@endpush
