<!doctype html>
<html class="no-js" lang="">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Bung Fashion">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('assets/images/admin.jpg') }}" type="image/x-icon">

    @stack('before-stayle')
        @include('includes._stayle')
    @stack('after-stayle')

</head>

<body>

    <!-- Left Panel -->
    @include('layouts._sidebar')
    <!-- /#Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @include('layouts._navbar')
        <!-- #/header-->

        <!-- Content -->
        @yield('content')
        <!-- Content -->

        <div class="clearfix"></div>
    </div>
    <!-- /#right-panel -->

</body>

    @stack('before-script')
        @include('includes._script')
    @stack('after-script')

</html>
