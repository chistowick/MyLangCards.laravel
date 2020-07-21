<!DOCTYPE html>
<html>

<head>
    <title>MyCards</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--My styles and favicon-->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <!--    <link rel="shortcut icon" href="https://mrbooks.ru/favicon.png" type="image/png">-->
    
</head>

<body>
    <!-- Header -->
    <div id="header">

        <!-- Блок с приветствием и кнопками Sign in/Sign up -->
        <div class="authentication">
            @guest

            <p>Sign up! It’s Free</p>
            <a href="/" id="sign-in-show" onclick="event.preventDefault(); 
                document.getElementById('sign-in-form').style.display = 'block';
                document.getElementById('sign-up-form').style.display = 'none';">Sign in
            </a>
            <a href="/" id="sign-up-show" onclick="event.preventDefault(); 
                document.getElementById('sign-in-form').style.display = 'none';
                document.getElementById('sign-up-form').style.display = 'block';">Sign up</a>

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

    </div>

    <!-- Средняя часть бутерброда -->
    <div id="middle-part">

        @yield('leftArea')

        @yield('rightArea')

    </div>

    <!-- Footer -->
    <div id="footer">
        <p id="copy">&copy; 2020 Анатолий Чиняев</p>
    </div>

    <!-- Scripts: -->

    <!-- JQuery и прочее из стандартного набора Laravel -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Other scripts -->
    @yield('scripts')

</body>

</html>