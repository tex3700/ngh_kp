<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">

@include('partials.head')

<body>

    @include('partials.navigation')

    @include('partials.header')

    @yield('content')

    @include('partials.footer')

</body>
</html>
