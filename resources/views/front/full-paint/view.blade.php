@extends('front.layout')

@section('content')


<main class="fullPaint">
    <div class="container">
        <nav class="navbar navbar-light bg-transparent" id="fullPagePaint">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="img/Logo Petar.jpg" alt="Artist Signature">
            </a>
            <button 
                type="button" 
                class="btn btn-secondary" 
                data-toggle="tooltip" 
                data-placement="bottom" 
                title="Close"
                >
                <b>x</b>
            </button>
        </nav>
    </div>
    <div class="container">
        <div class="full-page-paint">
            <a href="{{route('view-paint', ['id' => 1])}}">
                <img src="{{url('skins/front/img/pink_void_100x80.jpg')}}">
            </a>
        </div>
    </div>
</main>

@endsection

@push('footer_javascript')

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    $(document).ready(function () {
        var targetElement = $('[data-toggle="tooltip"]');

//        $(targetElement).on('click', function () {
//            window.location.href = "{{route('paint') . '1'}}";
//
//
//        });
    });
</script>

@endpush