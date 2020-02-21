<html>
    <head>
        <meta charset="UTF-8">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <title>Compilador | @yield('title')</title>

        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}"/>

        <style>
            body {
                padding-top: 5%;
            }
        </style>

        @yield('styles')
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>

        <script src="{{mix('js/app.js')}}" type="text/javascript">

        @yield('scripts')
    </body>
</html>
