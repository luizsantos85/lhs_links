@extends('layouts.site')

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/page.css')}}">
<style>
    .contentPage {
        background: {{$data['bg']}};
        color: {{$data['font_color']}};
    }
    .banner a {
        color: {{$data['font_color']}};
    }
    .linkArea a.linkquare{
        border-radius: 0;
    }
    .linkArea a.linkrounded{
        border-radius: 20px;
    }
</style>
@endpush

@section('title' , $data['title'])

@section('content')

<section class="contentPage" >
    <div class="profileImage">
        <img src="{{$data['profile_image']}}" alt="imge_{{$data['title']}}">
    </div>

    <div class="profileTitle">
        {{$data['title']}}
    </div>

    <div class="profileDescription">
        {{$data['description']}}
    </div>

    <div class="linkArea">
        @foreach ($data['links'] as $link)
                <a href="{{$link['href']}}"
                    class="link{{$link['op_boder_type']}}"
                    style="background-color:{{$link['op_bg_color']}} ; color:{{$link['op_text_color']}};" target="_blank" rel="noopener noreferrer"
                >
                    {{ucfirst($link['title'])}}
                </a>

        @endforeach
    </div>

    <div class="banner">
        Feito com &#10084; por <a style="color: {{$data['font_color']}}" href="https://lhscode.com.br" target="_blank"
            rel="noopener noreferrer">LHSCODE</a>
    </div>

</section>


@endsection



{{-- Scripts dinâmicos --}}
@push('scripts')
@if (!empty($data['fb_pixel']))
<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
                    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                        n.queue=[];t=b.createElement(e);t.async=!0;
                        t.src=v;s=b.getElementsByTagName(e)[0];
                        s.parentNode.insertBefore(t,s)}(window, document, 'script',
                        'https://connect.facebook.net/en_US/fbevents.js');
                        fbq('init', '{{$data['fb_pixel']}}');
                        fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?=id={{$data['fb_pixel']}}&ev=PageView&noscript=1" /></noscript>
<!-- End Facebook Pixel Code -->
@endif
@endpush