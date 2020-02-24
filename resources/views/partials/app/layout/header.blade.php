<header id="app-header">
    <i
  class="container-fluid d-flex justify-content-between align-items-center p-0 pl-lg-4">
        <div class="header-item d-flex align-items-center">
            <div class="logo position-relative">
                <a href="{{ url('/') }}"
                   class="logo-link d-flex justify-content-center align-items-center position-absolute">
                    <svg width="130" height="100">
                        <use xlink:href="#logo"></use>
                    </svg>
                </a>
            </div>
            <div class="search d-none d-sm-flex align-items-center">
                <form id="form-search" class="form form--search" action="{{ route('app.search') }}" method="get">
                    <input class="form-control" type="search" name="search" placeholder="Поиск...">
                    <div class="search-btn position-absolute">
                        <button class="btn btn-search material-icons">search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="header-item d-flex justify-content-end">
            <ul class="login-list list-unstyled d-none d-lg-flex">
                <li class="login-list-item">
                    @auth
                        @if (!auth()->user()->hasRole('admin'))
                            <div class="d-md-flex pr-xl-3">
                        <li class="login-list-item">
                            <a href="{{ route('app.profile.index') }}" class="login-list-item__link">
                                @lang('profile.title')
                            </a>
                        </li>
                        </div>
                        @else
                        <div class="d-md-flex pr-xl-3">
                        <li class="login-list-item">
                            <a href="{{ route('admin.home') }}" class="login-list-item__link">
                                @lang('navigation.header.dashboard')
                            </a>
                        </li>
                        </div>
                        @endif
                    @else
                        <div class="d-md-flex pr-xl-3">
                            <li class="login-list-item">
                            <a href="{{ route('login') }}" class="mb-2 mb-md-0 mr-md-3 login-list-item__link">
                                @lang('profile.login')
                            </a>
                            </li>
                            <li class="login-list-item">
                            <a href="{{ route('register') }}" class="mb-2 mb-md-0 login-list-item__link">
                                @lang('profile.register')
                            </a>
                            </li>
                        </div>
                    @endauth
            </ul>
            <div class="locale-selector mt-1 ml-auto ml-lg-3 mt-lg-0 pr-xl-5">
                @foreach(config('app.locales') as $locale)
                    @if (app()->getLocale() === $locale)
                        <span class="locale-selector__item is-active">{{ $locale }}</span>
                    @else
                        <a href="{{ route('app.locale', [$locale]) }}"
                           class="locale-selector__item">{{ $locale }}</a>
                    @endif
                @endforeach
            </div>
            <div class="burger-menu d-flex flex-column justify-content-center align-items-center position-relative">
                <div class="line line--top"></div>
                <div class="line line--middle"></div>
                <div class="line line--bottom"></div>
                <div class="line line-close line--left"></div>
                <div class="line line-close line--right"></div>
            </div>
            <div class="menu position-absolute d-flex align-items-center">
                <ul class="menu-nav-list list-unstyled">
                @foreach(app('nav')->frontend() as $item)
                        <li class="menu-nav-list-item">
                            <a href="{{ $item->route }}" class="menu-nav-list-item__link">
                                {!! $item->name !!}
                            </a>
                        </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</header>
