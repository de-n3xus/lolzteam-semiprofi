@php
    use \Illuminate\Support\Facades\Auth;
@endphp

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>BITLIST - Admin</title>

    <meta name="robots" content="noindex,nofollow"/>

    @include('includes.assets')
</head>
<body x-data="{
        window_width: window.innerWidth,
        mobile_navigation: false
      }"
      x-on:resize.window="window_width = window.innerWidth"
      :class="{ 'overflow-hidden': mobile_navigation }"
>

<div id="app">
    <div class="flex flex-col w-full h-screen items-center justify-center">
        <div class="bg-zinc-900 rounded-lg drop-shadow-xl min-w-[700px] my-48 overflow-y-scroll">
            <div class="flex justify-start gap-4 flex-nowrap">
                <aside class="admin">
                    <a href="/admin">
                        <img src="{{ asset('/assets/img/logo-mini.svg') }}"
                             alt="BITLIST"
                             class="mb-6"
                        />
                    </a>

                    <nav>
                        <a href="/admin" class="item {{ !request()->routeIs('admin.home') ?: 'active' }}">
                            Home
                        </a>

                        @if(Auth::user()->is_admin)
                            <a href="/admin/users"
                               class="item {{ !request()->routeIs('admin.users') ?: 'active' }}"
                            >
                                Users
                            </a>
                            <a href="/admin/currencies"
                               class="item {{ !request()->routeIs('admin.currencies') ?: 'active' }}"
                            >
                                Currencies
                            </a>
                            <a href="/admin/currencies/add"
                               class="item {{ !request()->routeIs('admin.currencies.add') ?: 'active' }} text-nowrap"
                            >
                                Currency add
                            </a>
                        @endif

                        <a href="/logout" class="item mt-4">
                            Logout
                        </a>
                    </nav>
                </aside>

                <main class="px-4 py-8 w-full">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</div>

</body>
</html>
