<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- StyleSheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('semantic/dist/semantic.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/template/main.css') }}">

    @yield('stylesheets')

    <script src="{{ asset('library/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('library/angular.min.js') }}"></script>
    <script src="{{ asset('semantic/dist/semantic.min.js') }}"></script>
    <script src="{{ asset('js/template/main.js') }}"></script>

    @yield('javascript-before')

    <title>@yield('title')</title>

</head>
    <body>

        <div class="ui inverted vertical masthead center aligned segment">
            <div class="ui container">
                <div class="ui large secondary inverted pointing menu">
                    <a class="toc item">
                        <i class="sidebar icon"></i>
                    </a>
                    <a class="active item">Home</a>
                    <a class="item">Nosotros</a>
                    <a class="item">Productos</a>
                    <div class="right item">
                        <a class="ui inverted button">Iniciar sesión</a>
                    </div>
                </div>
            </div>

            @yield('inside-header')

        </div>

        <div class="ui vertical inverted sidebar menu left">
            <a class="active item">Home</a>
            <a class="item">Nosotros</a>
            <a class="item">Productos</a>
            <a class="item">Iniciar sesión</a>
        </div>

        @yield('content')

        <div class="ui inverted vertical footer segment">
            <div class="ui container">
                <div class="ui stackable inverted divided equal height stackable grid">
                    <div class="three wide column">
                        <h4 class="ui inverted header">About</h4>
                        <div class="ui inverted link list">
                            <a href="#" class="item">Sitemap</a>
                            <a href="#" class="item">Contact Us</a>
                            <a href="#" class="item">Religious Ceremonies</a>
                            <a href="#" class="item">Gazebo Plans</a>
                        </div>
                    </div>
                    <div class="three wide column">
                        <h4 class="ui inverted header">Services</h4>
                        <div class="ui inverted link list">
                            <a href="#" class="item">Banana Pre-Order</a>
                            <a href="#" class="item">DNA FAQ</a>
                            <a href="#" class="item">How To Access</a>
                            <a href="#" class="item">Favorite X-Men</a>
                        </div>
                    </div>
                    <div class="seven wide column">
                        <h4 class="ui inverted header">Footer Header</h4>
                        <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- JavaScript -->
        @yield('javascript')

    </body>
</html>