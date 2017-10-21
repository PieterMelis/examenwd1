<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/foundation.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
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

        <div class="bottom-content-section" data-magellan data-threshold="0">

        </div>

    </div>

    <div id="main-content-section" data-magellan-target="main-content-section">
        @foreach($winner as $key => $value)
                <h1>{{$value->player }}</h1>
        @endforeach
    </div>





    </body>
    <!-- Scripts -->
    <script src="{{ asset('js/foundation/vendor/jquery.js') }}"></script>
    <script src="{{ asset('js/foundation/vendor/what-input.js') }}"></script>
    <script src="{{ asset('js/foundation/vendor/foundation.js') }}"></script>
    <script src="{{ asset('js/foundation/app.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</html>
