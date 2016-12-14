<!DOCTYPE html>
<html lang="en">
<!-- Head -->
@include('admin.partials.head')

<body>
    <div id="app">
        <!-- Navigation -->
        @include('admin.partials.nav')

        <!-- Content -->   
        @yield('content')
    </div>
    @include('admin/partials.scripts')
</body>
</html>
