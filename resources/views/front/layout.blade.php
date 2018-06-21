<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Nikola Kotarac">
        <meta name="description" content="contact page">
        <meta name="keywords" content="artist, paintings, gallery">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>@yield('head_title') | {{trans('front.main_title')}}</title>

        <!--FONTS CSS-->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

        <link rel="shortcut icon" href="{{url('/skins/front/img/ms-icon-310x310.png')}}" type="image/x-icon"> 


        <!-- Bootstrap -->
        <link href="{{url('/skins/front/css/bootstrap.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--THEME CSS-->
        <link href="{{url('/skins/front/css/main.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('/skins/front/css/responsive.css')}}" rel="stylesheet" type="text/css"/>

        <!--CUSTOM PAGE CSS-->


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        @stack('header_css')
    </head>
    <body>

        @include('front.header')

        @yield('content')

        @include('front.footer')


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{url('/skins/front/js/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{url('/skins/front/js/poper.js')}}" type="text/javascript"></script>
        <script src="{{url('/skins/front/js/bootstrap.min.js')}}"></script>
        <script src="{{url('/skins/front/js/jquery.validate.min.js')}}" type="text/javascript"></script>

        <!--CUSTOM PAGE JS-->


        <script src="{{url('/skins/front/js/main.js')}}" type="text/javascript"></script>
        <script src="{{url('/skins/front/js/jquery.fancybox.min.js')}}" type="text/javascript"></script>
        @stack('footer_javascript')
    </body>
</html>


