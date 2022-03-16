<!DOCTYPE html>
<html lang="en">
<head>
    @include('site.layout.header')

</head>
<body>
<!--start nav bar  -->
@include('site.layout.nav')

@yield('content')
<!-- end magazine -->
<!-- FOOTER START -->
@include('site.layout.footer')
<!-- end copy right -->
</body>
@include('site.layout.js')
</html>
