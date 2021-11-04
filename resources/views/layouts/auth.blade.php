<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('page_title')</title>

    <link href="{{ asset('theme/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('theme/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">

    @yield('styles')
</head>

<body class="gray-bg">

@yield('content')

<!-- Mainly scripts -->
<script src="{{ asset('theme/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>

@yield('scripts')

</body>
</html>
