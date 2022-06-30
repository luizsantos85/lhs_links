@extends('layouts.admin')

@section('title' , $page->op_title.' - Links')

@section('content')

<section class="container">

    <div class="preheader">
        Página {{$page->op_title}}
    </div>

    <div class="area">
        <div class="leftside">
            <header>
                <ul>
                    <li @if ($menu=='links' ) class="active" @endif><a href="{{route('admin.links',$page->slug)}}">Links</a>
                    </li>
                    <li @if ($menu=='design' ) class="active" @endif><a
                            href="{{route('admin.design',$page->slug)}}">Aparência</a></li>
                    <li @if ($menu=='stats' ) class="active" @endif><a
                            href="{{route('admin.stats',$page->slug)}}">Estatísticas</a></li>
                </ul>
            </header>

            @yield('body')
        </div>
        <div class="rightside">
            <iframe src="{{route('page.index',$page->slug)}}" frameborder="0"></iframe>
        </div>
    </div>


</section>

@endsection


{{-- Scripts dinâmicos --}}
{{-- @push('scripts')

<script>
    alert('Oi')
</script>
@endpush --}}