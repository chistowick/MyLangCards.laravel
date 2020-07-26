<!DOCTYPE html>
<html>

<head>
    <title>MyLangCards</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles of Bootstrap-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--My styles and favicon-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <!--    <link rel="shortcut icon" href="https://mrbooks.ru/favicon.png" type="image/png">-->

</head>

<body>

    <div class="container-fluid p-0" id="header">
        <div class="row no-gutters">
            <div class="col-md-4 authentication">
                <!-- Блок с приветствием и кнопками Sign in/Sign up -->
                @guest

                <p>Sign up! It’s Free</p>
                <a href="{{ route('login') }}" id="sign-in-show">Sign in
                </a>
                <a href="{{ route('register') }}" id="sign-up-show">Sign up</a>

                @endguest

                @auth

                <!-- Logout -->
                <p>Hello, {{ Auth::user()->name }}</p>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                    document.getElementById('logout-form').submit();">Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                @endauth
            </div>

            <div class="col-md-8 order-first order-md-last text-center">
                <h1 style="color: white; margin-top: 3rem;">Здесь будет название и логотип сайта</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid p-0" id="middle-part">

        <div class="row no-gutters">
            <div class="col-md-4" id="leftArea">
                @yield('leftArea')
            </div>
            <div class="col-md-8" id="rightArea">

                @hasSection('rightArea')

                @yield('rightArea')

                @else

                @include('slider')

                @endif

            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid p-0" id="footer">
        <div class="row justify-content-center">
            <div class="col-6 text-center pt-4">
                <p id="copy">&copy; 2020 Анатолий Чиняев</p>
            </div>
        </div>
    </div>

    <!-- Scripts: -->

    <!-- JQuery и прочее из стандартного набора Laravel -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Other scripts -->
    @yield('scripts')

</body>

</html>