@include('layouts.head')
@livewireStyles

</head>

<body>

    {{-- @include('layouts.loader') --}}
    @include('layouts.switcher')


    <div class="page">
        @include('layouts.header')

        @persist('player')
            @include('layouts.sidebar')
        @endpersist

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


    @livewireScripts


    @include('layouts.commonjs')

    @include('layouts.custom_switcherjs')
    <!-- Custom JS -->
    <script src="{{ asset('assets/js/custom.js') }}" data-navigate-once></script>

    @yield('scripts')
</body>

</html>
