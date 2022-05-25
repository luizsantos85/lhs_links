<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/site.css')}}">
    @stack('css')
    <title>@yield('title') - LHS LINKS</title>
</head>

<body>

    <main class="container">
        @yield('content')
    </main>



    <footer>

    </footer>


    <!--JS Dinâmicos-->
    @stack('scripts')
</body>

</html>