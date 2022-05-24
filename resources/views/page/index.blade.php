@extends('layouts.site')

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/page.css')}}">
@endpush

@section('title' , $data['title'])

@section('content')

<section>
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