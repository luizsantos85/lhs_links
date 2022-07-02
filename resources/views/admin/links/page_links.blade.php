@extends('layouts.page')

@section('body')

<div class="addPage addLink">
    <a href="{{route('admin.newlink', $page->slug)}}">Adicionar novo link</a>
</div>

<ul id="links">
    @foreach ($links as $link)
    <li class="linkItem" data-id="{{$link->id}}">
        <div class="linkItemOrder">
            <span class="material-symbols-outlined">
                sort
            </span>
        </div>

        <div class="linkItemInfo">
            <div class="linkItemTitle">{{$link->title}}</div>
            <div class="linkItemHref">{{$link->href}}</div>
        </div>
        <div class="linkItemButtons">
            <a href="{{route('admin.editlink',[$page->slug,$link->id])}}">Editar</a>
            <a href="{{route('admin.destroylink',[$page->slug,$link->id])}}"
                onclick="return confirm('Deseja realmente excluir o link?');">Excluir</a>
        </div>
    </li>
    @endforeach
</ul>

@endsection

{{-- Scripts dinâmicos --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    new Sortable(document.querySelector('#links'),{
        animation: 150,
        onEnd: async(e) => {
            let id = e.item.getAttribute('data-id');
            let link = `{{url('/admin/linkorder/${id}/${e.newIndex}')}}`;
            await fetch(link);
            window.location.href = window.location.href;
        }
    })
</script>

@endpush