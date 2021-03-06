<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Volvo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/foundation.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <style>


            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }



        </style>
    </head>
    <body>


    <div class="hero-full-screen">

        <div class="top-content-section">
            <div class="top-bar">
                <div class="top-bar-left">
                    <ul class="menu">

                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    <a href="{{ url('/home') }}">Admin</a>
                                    @else
                                        <a href="{{ route('login') }}">Login</a>
                                        @endauth
                            </div>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="middle-content-section">
            <div class="title m-b-md">
                <img src="{{ asset('img/logo.png') }}" alt="">
                <h1>Play and win the new Volvo XC40</h1>
            </div>
            <div class="links">
                <a href="{{ url('/wedstrijd') }}" class="hollow button">Participate</a>
                <a target="_blank" href="http://www.volvo.com/home.html" class="hollow button">About Volvo</a>
            </div>
        </div>

        <div class="bottom-content-section text-center" data-magellan data-threshold="0">
            @if(!$winner->isEmpty())
                <h3>Previous winners</h3>
                <hr>
            @endif
            @foreach($winner as $key => $value)

                <h5>Winner {{$value->period }}  : {{$value->player }}</h5>

            @endforeach
        </div>

    </div>

    <div id="main-content-section" data-magellan-target="main-content-section">




    </div>





    </body>
    <!-- Scripts -->
    <script src="{{ asset('js/foundation/vendor/jquery.js') }}"></script>
    <script src="{{ asset('js/foundation/vendor/what-input.js') }}"></script>
    <script src="{{ asset('js/foundation/vendor/foundation.js') }}"></script>
    <script src="{{ asset('js/foundation/app.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</html>
