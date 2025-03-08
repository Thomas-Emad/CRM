@props(['title' => ''])
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <h1 class="page-title fw-medium fs-24 mb-0">
        {{ $title }}
    </h1>
    <div class="ms-md-1 ms-0">
        <nav>
            <ol class="breadcrumb mb-0">
                {{ $slot }}
                <li class="breadcrumb-item active d-inline-flex" aria-current="page">
                    {{ $title }}
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header Close -->
