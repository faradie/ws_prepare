@extends('layouts.landing')

@section('content')
<main>
    <section class="features-extended section">
        <div class="container">
            <div class="features-extended-inner section-inner has-top-divider">
                <div class="features-extended-header text-center">
                    <div class="container-sm">
                        <h2 class="section-title mt-0">{{ $blog->title }}</h2>
                    </div>
                </div>
                
                <div class="feature-extended">
                    <div class="feature-extended-image is-revealing">
                        <svg width="480" height="360" viewBox="0 0 480 360" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <filter x="-500%" y="-500%" width="1000%" height="1000%" filterUnits="objectBoundingBox" id="dropshadow-1">
                                    <feOffset dy="16" in="SourceAlpha" result="shadowOffsetOuter"/>
                                    <feGaussianBlur stdDeviation="24" in="shadowOffsetOuter" result="shadowBlurOuter"/>
                                    <feColorMatrix values="0 0 0 0 0.12 0 0 0 0 0.17 0 0 0 0 0.21 0 0 0 0.2 0" in="shadowBlurOuter"/>
                                </filter>
                            </defs>
                            <path fill="#F6F8FA" d="M0 220V0h200zM480 140v220H280z"/>
                            <path fill="#FFF" d="M40 50h400v260H40z" style="mix-blend-mode:multiply;filter:url(#dropshadow-1)"/>
                            <path fill="#FFF" d="M40 50h400v260H40z"/>
                            <path fill="#FFF" d="M103 176h80v160h-80zM320 24h88v88h-88z" style="mix-blend-mode:multiply;filter:url(#dropshadow-1)"/>
                            <path fill="#FFF" d="M103 176h80v160h-80zM320 24h88v88h-88z"/>
                            <path fill="#FFF" d="M230.97 198l16.971 16.971-16.97 16.97L214 214.972z" style="mix-blend-mode:multiply;filter:url(#dropshadow-1)"/>
                            <path fill="#02C6A4" d="M230.97 198l16.971 16.971-16.97 16.97L214 214.972z"/>
                            <path fill="#FFF" d="M203 121H103v100z" style="mix-blend-mode:multiply;filter:url(#dropshadow-1)"/>
                            <path fill="#84E482" d="M203 121H103v100z"/>
                            <circle fill="#FFF" cx="288" cy="166" r="32" style="mix-blend-mode:multiply;filter:url(#dropshadow-1)"/>
                            <circle fill="#0EB3CE" cx="288" cy="166" r="32" style="mix-blend-mode:multiply"/>
                        </svg>
                    </div>
                    <div class="feature-extended-body">
                        <p>{{ $blog->body }}</p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</main>
@endsection
