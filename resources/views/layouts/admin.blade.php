<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/admin.dash.css')}}">
    @stack('css')
    <title>@yield('title') - Painel de Controle</title>
</head>

<body>

    @if (!request()->is('admin/login') && !request()->is('admin/register'))
    <nav>
        <div class="navTop">
            <a href="{{route('admin.index')}}">
                <span class="material-symbols-outlined">
                    web
                </span>
            </a>
        </div>
        <div class="navBottom">
            <a href="{{route('admin.logout')}}">
                <span class="material-symbols-outlined">
                    logout
                </span>
            </a>
        </div>
    </nav>
    @endif

    <main>
        @yield('content')
    </main>



    <!--JS Dinâmicos-->
    @stack('scripts')

</body>

</html>