<html>
<head>
    <title>App Name - @yield('title')</title>
    @include('libs.lib')
    @if(Route::currentRouteName() != 'login')
        @include('layouts.steps')
    @endif

</head>
<body>

<div class="container">
    @yield('content')
</div>
</body>
<footer>

</footer>
</html>