
    @include('admin.layouts.header')
    <div class="container-fluid">
        @yield('content')
    </div>
    <div class="modalRent">
        @yield('modalRent')
    </div>
    <div class="modalUndo">
        @yield('modalUndo')
    </div>
    
    @include('admin.layouts.footer')
