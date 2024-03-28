<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>BITLIST - Decentralized crypto platform.</title>

    @include('includes.assets')

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
    <div id="app">
        <x-header />
        <x-mobile-navigation />

        @yield('content')

        <x-footer />
    </div>
</div>

</body>
</html>
