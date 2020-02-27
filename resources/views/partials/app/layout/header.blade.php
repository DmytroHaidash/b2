<header id="app-header">
    <div class="container-fluid">

        <div class="row align-items-center">
            <div class="col-auto">
                <a href="{{ url('/') }}"
                   class="header-logo">
                    <svg width="100" height="80">
                        <use xlink:href="#logo"></use>
                    </svg>
                </a>
            </div>

            <div class="col">
                <form action="{{ route('app.search') }}" class="search d-flex align-items-center">
                    <button class="btn btn-search material-icons mr-4">search</button>
                    <input type="text" name="q" autocomplete="none" class="form-control form-control--global-search"
                           placeholder="{{ trans('pages.catalog.search.placeholder') }}" required>
                </form>
            </div>

            <div class="col-auto">
                <div class="locale-selector  align-items-center">
                    @foreach(config('app.locales') as $locale)
                        @if (app()->getLocale() === $locale)
                            <span class="locale-selector__item is-active">{{ $locale }}</span>
                        @else
                            <a href="{{ route('app.locale', [$locale]) }}"
                               class="locale-selector__item">{{ $locale }}</a>
                        @endif
                    @endforeach
                    <a href="#search" class="material-icons nav-link nav-search-icon" data-search>search</a>
                </div>
            </div>

            <div class="col-auto">
                <div class="burger-menu d-flex flex-column justify-content-center align-items-center position-relative">
                    <div class="line line--top"></div>
                    <div class="line line--middle"></div>
                    <div class="line line--bottom"></div>
                    <div class="line line-close line--left"></div>
                    <div class="line line-close line--right"></div>
                </div>
            </div>
        </div>


        {{--<div class="header-item d-flex align-items-center">--}}
            {{--<div class="logo position-relative">--}}
                {{--<a href="{{ url('/') }}"--}}
                   {{--class="logo-link d-flex justify-content-center align-items-center position-absolute">--}}
                    {{--<svg width="100" height="100">--}}
                        {{--<use xlink:href="#logo"></use>--}}
                    {{--</svg>--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="search d-none d-sm-flex align-items-center">--}}
                {{--<form id="form-search" class="form form--search" action="{{ route('app.search') }}" method="get">--}}
                    {{--<input class="form-control" type="search" name="search" placeholder="Поиск...">--}}
                    {{--<div class="search-btn position-absolute">--}}
                        {{--<button class="btn btn-search material-icons">search</button>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="nav">--}}
            {{--<form action="{{ route('app.search') }}" class="search">--}}
                {{--<button class="btn btn-search material-icons">search</button>--}}
                {{--<input type="text" name="q" autocomplete="none" class="form-control form-control--global-search"--}}
                       {{--placeholder="{{ trans('pages.catalog.search.placeholder') }}" required>--}}
            {{--</form>--}}
        {{--</div>--}}
        {{--<div class="locale-selector justify-content-end mt-1 mt-lg-0 pr-xl-5">--}}
            {{--@foreach(config('app.locales') as $locale)--}}
                {{--@if (app()->getLocale() === $locale)--}}
                    {{--<span class="locale-selector__item is-active">{{ $locale }}</span>--}}
                {{--@else--}}
                    {{--<a href="{{ route('app.locale', [$locale]) }}"--}}
                       {{--class="locale-selector__item">{{ $locale }}</a>--}}
                {{--@endif--}}
            {{--@endforeach--}}
            {{--<a href="#search" class="material-icons nav-link nav-search-icon d-none d-lg-flex" data-search>search</a>--}}
        {{--</div>--}}

        {{--<div class="burger-menu d-flex flex-column justify-content-center align-items-center position-relative">--}}
            {{--<div class="line line--top"></div>--}}
            {{--<div class="line line--middle"></div>--}}
            {{--<div class="line line--bottom"></div>--}}
            {{--<div class="line line-close line--left"></div>--}}
            {{--<div class="line line-close line--right"></div>--}}
        {{--</div>--}}
        <div class="menu">
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
</header>
