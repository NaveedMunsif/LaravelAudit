{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--@include('includes.head')--}}
{{--</head>--}}
{{--<body>--}}
{{--@include('includes.navbar')--}}
{{--<div class="container-fluid h-100 p-0">--}}
{{--    <div style="min-height: 100%" class="flex-row d-flex align-items-stretch m-0">--}}
{{--    @include('includes.sidebar')--}}
{{--        <div class="main">--}}

{{--            @yield('content')--}}
{{--            @include('pages.auditRisks')--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}
{{--@include('includes.script')--}}
{{--</body>--}}
{{--</html>--}}
    <!doctype html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
@include('includes.navbar')
<div class="container-fluid h-100 p-0">
    <div style="min-height: 100%" class="flex-row d-flex align-items-stretch m-0">
        @include('includes.sidebar')
        <div class="main">
            @yield('content')
        </div>

    </div>
</div>
@include('includes.script')
</body>
</html>
