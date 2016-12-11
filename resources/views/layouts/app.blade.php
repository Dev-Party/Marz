<!DOCTYPE html>
<html lang="es-AR">
<head>
    @include('partials.head')
</head>
<body>
    @include('partials.header')
    <div id="app">
    @yield('content')
    </div>
    @include('partials.footer')
    <script src="/js/app.js"></script>
</body>
</html>
