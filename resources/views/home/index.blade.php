@extends('layouts.site')

@section('title' , 'Home')

@section('content')

<section>
    <h1>Home</h1>
</section>

@endsection


{{-- Scripts dinâmicos --}}
@push('scripts')

<script>
    alert('Oi')
</script>
@endpush