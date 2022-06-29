@extends('layouts.admin')
@push('css')
<link rel="stylesheet" href="{{asset('assets/css/admin.login.css')}}">
@endpush

@section('title' , 'Cadastro')

@section('content')

<section class="formLogin">

    <form method="POST">
        @csrf
        <h1>@yield('title')</h1>

        @include('layouts.components.alerts')

        <input type="text" name="name" placeholder="Nome">
        <input type="email" name="email" placeholder="email@exemplo.com.br">
        <input type="password" name="password" placeholder="Senha">
        <button>Cadastrar</button>
        <p>
            Já possui cadastro? <a href="{{route('login')}}">Efetue o login!</a>
        </p>
    </form>
</section>

@endsection