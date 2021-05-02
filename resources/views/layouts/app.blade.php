<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Bloggy</title>
    <meta name="author" content="Chamodya Wimansha" />
    <meta name="description" content="A simple and cute bolg site" />
    <meta name="keywords" content="simple, blog" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>


<body class="bg-gray-100 font-sans leading-normal tracking-normal">

@include('partials.nav')

<!--Container-->
<div class="container w-full md:max-w-3xl mx-auto pt-20">
    <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
        @yield('content')
    </div>
</div>
<!--/container-->

@include('partials.footer')
</body>
</html>
