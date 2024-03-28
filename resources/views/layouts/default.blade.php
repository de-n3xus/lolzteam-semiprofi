<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>BITLIST - Decentralized crypto platform.</title>

    <script src="{{ asset('/assets/js/alpine-screen.min.js') }}" defer></script>
    <script src="{{ asset('/assets/js/alpine.min.js') }}" defer></script>
    <script src="{{ asset('/assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('/assets/js/lscache.min.js') }}"></script>
    @vite(['resources/js/app.js'])

    <link rel="shortcut icon" href="{{ asset('assets/img/logo-mini.svg') }}" type="image/x-icon"/>

    <script type="application/ld+json">
        {
          "@context": "https://schema.org/",
          "@type": "Site",
          "name": "BITLiST",
          "author": {
            "@type": "Person",
            "name": "n3xus"
          },
          "description": "BITLIST - Decentralized crypto platform.",
        }
    </script>

    <script>
        document.addEventListener('alpine:init', () => {
            const axios = window.axios
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

<div class="wrapper">
    <x-header />
    <x-mobile-navigation />

    <div id="app">@yield('content')</div>

    <x-footer />
</div>

</body>
</html>
