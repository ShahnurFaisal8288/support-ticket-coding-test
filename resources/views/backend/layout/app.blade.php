@include('backend.partials.start')
@stack('css')
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
    @include('backend.partials.nav')
    @include('backend.partials.sidebar')
    @yield('content');
</div>
@include('backend.partials.end')
@stack('js')