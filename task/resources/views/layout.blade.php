
    @include('layouts.header')
    @stack('custom-css')
     @yield('content')
    
    @include('layouts.footer')
    @stack('custom-scripts')
    
