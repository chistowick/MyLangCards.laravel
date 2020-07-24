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

    <div class="container-fluid" id="header">
        <div class="row">
            <div class="col-4 authentication">
                <!-- Блок с приветствием и кнопками Sign in/Sign up -->
                    @guest

                    <p>Sign up! It’s Free</p>
                    <a href="/" id="sign-in-show" onclick="event.preventDefault(); 
                    document.getElementById('sign-in-div').style.display = 'block';
                    document.getElementById('forgot-password-div').style.display = 'none';
                    document.getElementById('sign-up-div').style.display = 'none';">Sign in
                    </a>
                    <a href="/" id="sign-up-show" onclick="event.preventDefault(); 
                    document.getElementById('sign-in-div').style.display = 'none';
                    document.getElementById('forgot-password-div').style.display = 'none';
                    document.getElementById('sign-up-div').style.display = 'block';">Sign up</a>

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

            <div class="col-8 text-center">
                <h1 style="color: white; margin-top: 3rem;">Здесь будет название и логотип сайта</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="middle-part">

        <div class="row">
            <div class="col-4" id="leftArea">
                @yield('leftArea')
            </div>
            <div class="col-8" id="rightArea">
                @yield('rightArea')
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid" id="footer">
        <div class="row justify-content-center">
            <div class="col text-center">
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