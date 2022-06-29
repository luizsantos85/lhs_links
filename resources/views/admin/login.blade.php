@extends('layouts.admin')
@push('css')
<link rel="stylesheet" href="{{asset('assets/css/admin.login.css')}}">
@endpush

@section('title' , 'Login')

@section('content')

<section class="formLogin">

    <form method="POST">
        @csrf
        <h1>@yield('title')</h1>
        @include('layouts.components.alerts')

        <input type="email" name="email" placeholder="email@exemplo.com.br">
        <input type="password" name="password" placeholder="Senha">
        <button>Entrar</button>
        <p>
            Ainda não tem cadastro? <a href="{{route('admin.register')}}">Cadastre-se!</a>
        </p>
    </form>
</section>

@endsection