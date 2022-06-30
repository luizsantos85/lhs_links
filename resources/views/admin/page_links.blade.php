@extends('layouts.page')

@section('body')

<div class="addPage addLink">
    <a href="{{route('admin.newlink', $page->slug)}}">Adicionar novo link</a>
</div>

<ul id="links">
    @foreach ($links as $link)
    <li class="linkItem">
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
            <a href="{{route('admin.destroylink',[$page->slug,$link->id])}}">Excluir</a>
        </div>
    </li>
    @endforeach
</ul>

@endsection

{{-- Scripts dinâmicos --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>


@endpush