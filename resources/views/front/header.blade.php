<!-- Main Navigation -->

<!-- Navigation Start -->
<nav class="navbar fixed-top navbar-expand-md navbar-light bg-transparent" id="mainNavbar">
    <div class="container-fluid" id="containerNav">
        <a class="navbar-brand" href="{{route('home')}}" style="display:none;">
            <img src="{{url('/skins/front/img/Logo Petar.jpg')}}" alt="Artist Signature">
        </a>
        <button class="navbar-toggler" 
                type="button" 
                data-toggle="collapse" 
                data-target="#navbarNav" 
                aria-controls="navbarNav" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home') . '#paintings'}}">Paintings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home') . '#about'}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home') . '#contact'}}">Contact</a>
                </li>
            </ul>
        </div>
    </div><!-- Container End -->
</nav><!-- Navigation End -->


