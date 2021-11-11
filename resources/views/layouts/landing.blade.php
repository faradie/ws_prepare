<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.landing.head')
</head>
<body class="is-boxed has-animations">
    <div class="body-wrap boxed-container">

        @include('includes.landing.header')

        @yield('content')

        @include('includes.landing.foot')
    </div>
    @include('includes.landing.script')
</body>
</html>
