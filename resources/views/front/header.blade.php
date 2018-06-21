<!-- Main Navigation -->

<!-- Navigation Start -->
<nav class="navbar fixed-top navbar-expand-md navbar-light bg-white" id="mainNavbar" style="display: none;">
    <div class="container" id="containerNav">
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{url('/skins/front/img/artist_signature.jpg')}}" alt="Artist Signature">
        </a>
        <button class="navbar-toggler"
                type="button" 
                data-toggle="collapse" 
                data-target="#navbarNav" 
                aria-controls="navbarNav" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
            <span>
                 <i class="fa fa-navicon"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarNav">
            @if(\Request::path() == '/')
            <ul class="navbar-nav ml-auto">
                <li class="nav-item pr-3 pl-3">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item pr-3 pl-3">
                    <a class="nav-link" href="{{url('#about')}}">About</a>
                </li>
                <li class="nav-item pr-3 pl-3">
                    <a class="nav-link" href="{{url('#paintings')}}">Paintings</a>
                </li>
                <li class="nav-item pr-3 pl-3">
                    <a class="nav-link" href="{{url('#contact')}}">Contact</a>
                </li>
            </ul>
            @else
            <ul class="navbar-nav ml-auto">
                <li class="nav-item pr-3 pl-3">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item pr-3 pl-3">
                    <a class="nav-link" href="{{route('home') . '#about'}}">About</a>
                </li>
                <li class="nav-item pr-3 pl-3">
                    <a class="nav-link" href="{{route('home') . '#paintings'}}">Paintings</a>
                </li>
                <li class="nav-item pr-3 pl-3">
                    <a class="nav-link" href="{{route('home') . '#contact'}}">Contact</a>
                </li>
            </ul>
            @endif
        </div>
    </div><!-- Container End -->
</nav><!-- Navigation End -->



