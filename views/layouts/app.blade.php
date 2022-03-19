<!DOCTYPE html>
@include('elements.base')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', setting('description', ''))">
    <meta name="theme-color" content="#3490DC">
    <meta name="author" content="Azuriom">

    <meta property="og:title" content="@yield('title')">
    <meta property="og:type" content="@yield('type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ favicon() }}">
    <meta property="og:description" content="@yield('description', setting('description', ''))">
    <meta property="og:site_name" content="{{ site_name() }}">
    @stack('meta')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ site_name() }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ favicon() }}">

    <!-- Scripts -->
    <script src="{{ theme_asset('vendor/jquery/jquery.min.js') }}" defer></script>
    <script src="{{ theme_asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('vendor/axios/axios.min.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Page level scripts -->
    @stack('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ theme_asset('vendor/argon/css/argon-design-system.min.css') }}" rel="stylesheet">
    <link href="{{ theme_asset('css/argon.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body>
<div id="app">
    <header>
        @include('elements.navbar')
    </header>

    <main>
        <div class="container">
            @include('elements.session-alerts')
        </div>

        @yield('content')
    </main>
</div>

<footer class="footer">
  <div class="container">
    <div class="row row-grid align-items-center mb-5">
      <div class="col-lg-6">
        <h3 class="text-primary font-weight-light mb-2">{!! theme_config('footer_title') !!}</h3>
        <h4 class="mb-0 font-weight-light">{!! theme_config('footer_description') !!}</h4>
      </div>
      <div class="col-lg-6 text-lg-center btn-wrapper">
          @foreach(social_links() as $link)
              <a href="{{ $link->value }}" title="{{ $link->title }}" target="_blank" rel="noopener noreferrer" class="btn btn-icon-only rounded-circle bg-white">
                  <span class="btn-inner--icon"><i class="{{ $link->icon }} fa-lg" style="color: {{ $link->color }}"></i></span>
              </a>
          @endforeach
      </div>
    </div>
    <hr>
    <div class="row align-items-center justify-content-md-between">
      <div class="col-md-6">
        <div class="copyright">
          {{ setting('copyright') }} | @lang('messages.copyright')
        </div>
      </div>
      <div class="col-md-6">
        <ul class="nav nav-footer justify-content-end">
            @foreach(theme_config('footer_links') ?? [] as $link)
                <li class="nav-item">
                    <a href="{{ $link['value'] }}" class="nav-link" target="_blank">{{ $link['name'] }}</a>
                </li>
            @endforeach
        </ul>
      </div>
    </div>
  </div>
</footer>

@stack('footer-scripts')

</body>
</html>
