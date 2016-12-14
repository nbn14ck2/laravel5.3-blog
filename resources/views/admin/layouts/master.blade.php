<!DOCTYPE html>
<html lang="en">
<!-- Head -->
@include('admin.partials.head')

<body>
    <div id="app">
        <!-- Navigation -->
        @include('admin.partials.nav')

        <div id="wrapper">

            @include('admin.partials.aside')

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                         @include('admin.partials.status')
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->
        <!-- Content -->   
    </div>

    @include('admin/partials.scripts')
</body>
</html>
