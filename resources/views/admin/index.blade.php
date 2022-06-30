@extends('layouts.admin')

@section('title' , 'Home')

@section('content')

<section class="container">
    <header>
        <h2>Suas Páginas</h2>
    </header>

    <div class="addPage">
        <a href="">Adicionar nova página</a>
    </div>

    <table class="tableLinks">
        <thead>
            <tr>
                <th>Título</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)
            <tr>
                <td>{{$page->op_title}} ({{$page->slug}})</td>
                <td>
                    <a href="{{route('page.index',$page->slug)}}" target="_blank">Abrir</a>
                    <a href="{{route('admin.links',$page->slug)}}">Links</a>
                    <a href="{{route('admin.design',$page->slug)}}">Aparência</a>
                    <a href="{{route('admin.stats',$page->slug)}}">Estatísticas</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</section>

@endsection


{{-- Scripts dinâmicos --}}
{{-- @push('scripts')

<script>
    alert('Oi')
</script>
@endpush --}}