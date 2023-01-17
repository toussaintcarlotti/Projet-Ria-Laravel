<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projet RIA Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ Storage::disk('public')->url('logo/favicon.ico') }}">

    <!-- plugin css -->
    <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet"/>

    <!-- end plugin css -->

    @stack('plugin-styles')

    <!-- common css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
    <!-- end common css -->

    @stack('style')
</head>
<body data-base-url="{{url('/')}}">

<script src="{{ asset('assets/js/spinner.js') }}"></script>

<div class="main-wrapper" id="app">
    @include('layout.sidebar')
    <div class="page-wrapper">
        @include('layout.header')
        <div class="page-content">
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            @if (session('success'))
                <script>
                    setTimeout(() => {
                        showSwal('mixin', "{{ session('success') }}")
                    }, 200)
                </script>
            @endif
            @yield('content')
        </div>
        @include('layout.footer')
    </div>
</div>

<!-- base js -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- end base js -->

<!-- plugin js -->
@stack('plugin-scripts')
<!-- end plugin js -->

<!-- common js -->
<script src="{{ asset('assets/js/template.js') }}"></script>
<!-- end common js -->

@stack('custom-scripts')
</body>
</html>
