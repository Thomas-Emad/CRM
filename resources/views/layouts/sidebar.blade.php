<!-- Start::app-sidebar -->
<aside class="app-sidebar" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="index.html" class="header-logo">
            <img src="{{ asset('assets/img/brand-logos/desktop-logo.png') }}" alt="logo"
                class="main-logo desktop-logo">
            <img src="{{ asset('assets/img/brand-logos/toggle-logo.png') }}" alt="logo" class="main-logo toggle-logo">
            <img src="{{ asset('assets/img/brand-logos/desktop-dark.png') }}" alt="logo"
                class="main-logo desktop-dark">
            <img src="{{ asset('assets/img/brand-logos/toggle-dark.png') }}" alt="logo"
                class="main-logo toggle-dark">
            <img src="{{ asset('assets/img/brand-logos/desktop-white.png') }}" alt="logo" class="desktop-white">
            <img src="{{ asset('assets/img/brand-logos/toggle-white.png') }}" alt="logo" class="toggle-white">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar " id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg></div>
            <ul class="main-menu">

                <!-- End::slide -->

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Menu</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide">
                    <a href="{{ route('home') }}" class="side-menu__item">
                        <i class="ri-home-8-line side-menu__icon"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                <!-- Start::slide -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="ri-inbox-line side-menu__icon"></i>
                        <span class="side-menu__label">CRM</span>
                        <i class="ri ri-arrow-right-s-line side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        @can(\App\Enums\PermissionEnum::CRM_ACTIVIY_SHOW)
                            <li class="slide"><a href="{{ route('leads.activities.calls.index') }}" class="side-menu__item"
                                    wire:current="active" wire:navigate>Calls</a></li>
                        @endcan
                        @can(\App\Enums\PermissionEnum::CRM_LEAD)
                            <li class="slide"><a href="{{ route('leads.index') }}" class="side-menu__item"
                                    wire:current="active" wire:navigate>Leads</a></li>
                        @endcan
                        @can(\App\Enums\PermissionEnum::CRM_CUSTOMER)
                            <li class="slide"><a href="{{ route('customers.index') }}" wire:navigate wire:current="active"
                                    class="side-menu__item">Customers</a>
                            </li>
                        @endcan
                        <li class="slide has-sub"><a href="javascript:void(0);" class="side-menu__item">Control Menu<i
                                    class="ri ri-arrow-right-s-line side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                @can(\App\Enums\PermissionEnum::CRM_STATUS)
                                    <li class="slide">
                                        <a href="{{ route('statuses.index') }}" class="side-menu__item "
                                            wire:current="active" wire:navigate>Status</a>
                                    </li>
                                @endcan
                                @can(\App\Enums\PermissionEnum::CRM_SOURCE)
                                    <li class="slide"><a href="{{ route('sources.index') }}" class="side-menu__item "
                                            wire:current="active" wire:navigate>Source</a>
                                    </li>
                                @endcan
                                @can(\App\Enums\PermissionEnum::CRM_GROUP)
                                    <li class="slide"><a href="{{ route('groups.index') }}" class="side-menu__item"
                                            wire:current="active" wire:navigate>Group</a>
                                    </li>
                                @endcan
                                @can(\App\Enums\PermissionEnum::CRM_TEAM)
                                    <li class="slide"><a href="{{ route('teams.index') }}" class="side-menu__item"
                                            wire:current="active" wire:navigate>Teams</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
<!-- End::app-sidebar -->
