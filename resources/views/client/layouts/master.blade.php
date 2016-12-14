<!DOCTYPE html>
<html lang="en">

@include('client.partials.head')

<body>   
    @include('client.partials.nav')
    @include('admin.partials.status')
    @section('header')
        @include('client.partials.header')
    @show

    <section id="body_content" class="col-sm-9">
        @yield('content')
    </section>

    @include('client.partials.aside')

    <div class="clearfix"></div>

    @include('client.partials.footer')

    @include('client.partials.scripts')
</body>
</html>
