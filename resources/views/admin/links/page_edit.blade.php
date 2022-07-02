@extends('layouts.page')

@section('body')

<form method="post" class="formPage">
    @csrf
    <h3>{{isset($link) ? 'Editar Link' : 'Cadastrar Link'}}</h3>

    @if($errors->any())
    <ul class="error-list">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif

    @include('admin.links.formLink')

</form>

@endsection