<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>BITLIST - Auth</title>

    <meta name="robots" content="noindex,nofollow" />

    @include('includes.assets')

    <script src="{{ asset('https://unpkg.com/swup@4.6.1/dist/Swup.umd.js') }}"></script>

    <script>
        const swup = new Swup({
            containers: ['#app']
        })
    </script>
</head>
<body x-data="{
        window_width: window.innerWidth,
        mobile_navigation: false
      }"
      x-on:resize.window="window_width = window.innerWidth"
      :class="{ 'overflow-hidden': mobile_navigation }"
>

<div id="app">@yield('content')</div>

</body>
</html>
