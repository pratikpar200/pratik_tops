@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="admin-main-content flex-grow-1 d-flex flex-column min-vh-100" id="adminMainContent">
    <div class="content-wrapper p-3 p-md-4 pt-5 mt-4 flex-grow-1">
        @yield('main_container')
    </div>

@include('admin.layout.footer')
