<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title') | Link Shortener</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
    @stack('css')
</head>
<body>
<div id="app">

    <header-component :user="{{ Auth::check() ? Auth::user() : 'null' }}" :app_settings="{{ $app_settings }}"></header-component>

    <section class="blog-area">

            @yield('content')


    </section><!-- section -->

    <footer-component :app_settings="{{ $app_settings }}" :social_settings="{{ $social_settings }}" :footer_settings="{{ $footer_settings }}"></footer-component>

</div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/front_script.js') }}"></script>
    <script src="{{ asset('js/iziToast.js') }}"></script>

    @include('vendor.lara-izitoast.toast')
</body>
</html>
