<header class="site-header">
    <div class="container">
        <div class="site-header-inner">
            <div class="brand header-brand">
                <h1 class="m-0">
                    <a href="{{ route('landing') }}">
                        <svg width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <title>Evelyn</title>
                            <defs>
                                <radialGradient cy="0%" fx="50%" fy="0%" r="100%" id="logo-gradient">
                                    <stop stop-color="#FFF" offset="0%"/>
                                    <stop stop-color="#FFF" stop-opacity=".24" offset="100%"/>
                                </radialGradient>
                            </defs>
                            <path d="M16 32C7.163 32 0 24.837 0 16S7.163 0 16 0s16 7.163 16 16-7.163 16-16 16zm0-10a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" fill="url(#logo-gradient)" fill-rule="evenodd"/>
                        </svg>
                    </a>
                </h1>
            </div>
            <ul class="header-links list-reset m-0">
               @auth
               <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
               @else
               <li>
                    <a href="{{ route('login') }}">Login</a>
                </li>
                <li>
                    <a class="button button-sm button-shadow" href="{{ route('register') }}">Signup</a>
                </li>
               @endauth
            </ul>
        </div>
    </div>
</header>