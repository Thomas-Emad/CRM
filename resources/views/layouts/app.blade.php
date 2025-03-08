@include('layouts.head')
@livewireStyles

</head>

<body>

    {{-- @include('layouts.loader') --}}
    @include('layouts.switcher')


    <div class="page">
        @include('layouts.header')
        @include('layouts.sidebar')

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!-- End::app-content -->

        @include('layouts.headersearch_modal')
        @include('layouts.footer')

    </div>

    @include('layouts.commonjs')

    @include('layouts.custom_switcherjs')
    @yield('scripts')
    @livewireScripts


    <!-- Custom JS -->
    <script src="{{ asset('assets/js/custom.js') }}" data-navigate-once></script>
</body>

</html>
