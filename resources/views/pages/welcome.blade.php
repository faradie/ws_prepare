@extends('layouts.landing')

@section('content')
<main>
    <section class="hero text-light text-center">
        <div class="container-sm">
            <div class="hero-inner">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if(session()->has('erro_login'))
                    <div class="alert alert-danger">
                        {{ session()->get('erro_login') }}
                    </div>
                @endif
                <h1 class="hero-title h2-mobile mt-0 is-revealing">{{ $config->slogan }}</h1>
                <p class="hero-paragraph is-revealing">{{ $config->welcome_text }}.</p>
                <form action="{{ route('submit.subscribe') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <div class="hero-cta container mb-12">
                            <input type="text" class="container form-control" name="email" placeholder="Enter your email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <p class="hero-cta is-revealing"><button type="submit" class="button button-secondary button-shadow" href="#">Subscribe</button></p>
                </form>
            </div>
        </div>
    </section>

    <section class="features section text-center">
        <div class="container">
            <div class="features-inner section-inner has-top-divider">
                <h2 class="section-title mt-0">Product features</h2>
                <div class="features-wrap">
                    
                    @foreach ($products as $product)
                        <div class="feature is-revealing">
                            <div class="feature-inner">
                                <div class="feature-icon">
                                    <img src="{{ $product->image }}" alt="">
                                </div>
                                <h4 class="feature-title h3-mobile">{{ $product->title }}</h4>
                                <p class="text-sm">{{ $product->description }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <section class="features-extended section">
        <div class="container">
            <div class="features-extended-inner section-inner has-top-divider">
                <div class="features-extended-header text-center">
                    <div class="container-sm">
                        <h2 class="section-title mt-0">{{ env('APP_NAME') }}</h2>
                        <p class="section-paragraph">{{ $config->about }}</p>
                    </div>
                </div>
                
                @foreach ($blogs as $item)
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
                            <a href="{{ route('blog.detail',$item->slug) }}"><h3 class="mt-0">{{ $item->title }}</h3></a>
                            <p>{{ $item->body }}</p>
                        </div>
                    </div>
                @endforeach
                
            </div>
            {{-- {{ $blogs->links('includes.paginator.default') }} --}}
            {{-- {{ $blogs->render("pagination::simple-bootstrap-4") }} --}}
            {{ $blogs->render("pagination::semantic-ui") }}
        </div>
    </section>

    <section class="pricing section">
        <div class="container">
            <div class="pricing-inner section-inner has-top-divider">
                <h2 class="section-title mt-0 text-center">Pricing</h2>
                <div class="pricing-tables-wrap">

                    @foreach ($products as $item)
                        <div class="pricing-table is-revealing">
                            <div class="pricing-table-inner">
                                <div class="pricing-table-main">
                                    <div class="pricing-table-header">
                                        <div class="pricing-table-title mt-12 mb-16 text-primary">{{ $item->title }}</div>
                                        <div class="pricing-table-price mb-24 pb-32"><span class="pricing-table-price-currency h3">$</span><span class="pricing-table-price-amount h1">{{ $item->price }}</span></div>
                                    </div>
                                    <ul class="pricing-table-features list-reset text-xs mb-56">
                                        
                                        @foreach ($item->details as $detail)
                                            <li>
                                                <span class="list-icon">
                                                    <svg width="16" height="12" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M14.3.3L5 9.6 1.7 6.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z" fill="#00A2B8" fill-rule="nonzero"/>
                                                    </svg>
                                                </span>
                                                <span>{{ $detail->detail }}.</span>
                                            </li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                                <div class="pricing-table-cta">
                                    <a class="button button-primary button-block" href="#">Get started now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
</main>
@endsection
