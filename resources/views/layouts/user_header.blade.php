<header>
    <nav class="shadow p-0 bg-white app-header rounded main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <div class="container m-0">
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__logo">
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item d-none">
                        <div class="nav-item">
                            <button class="btn btn-outline">顧客一覧</button>
                            <button class="btn btn-outline">船舶検査</button>
                            <button class="btn btn-outline">見積一覧</button>
                            <button class="btn btn-outline">売上一覧</button>
                        </div>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                                     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>
