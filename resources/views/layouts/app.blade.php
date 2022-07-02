<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body>
@include('includes.for_styles')
@include('includes.navbar')
<div class="container-fluid h-100 p-0">
    <div style="min-height: 100%" class="flex-row d-flex align-items-stretch m-0">
        @include('includes.sidebar')
        <div class="col-10 main">
            @yield('content')
        </div>
    </div>
</div>
@include('includes.script')
</body>
</html>
