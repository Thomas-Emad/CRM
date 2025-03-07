<div>
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-medium fs-24 mb-0">Source</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">CRM</a></li>

                    <li class="breadcrumb-item active d-inline-flex" aria-current="page">Source</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->
    <div class="border p-2">
        <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
            <div>
                <input type="text" class="form-control " wire:model.live="search" placeholder="Saerch...">
            </div>
            <a class="btn btn-primary btn-wave d-inline-flex align-items-center gap-2 ms-auto"
                href="{{ route('sources.create') }}">
                <i class="ti ti-plus fs-5"></i>
                <span>New Source</span>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Website</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sources as $source)
                        <tr>
                            <th scope="row">{{ $source->id }}</th>
                            <td>
                                <span>{{ str($source->name)->limit(10) }}</span>
                            </td>
                            <td>
                                <span data-bs-toggle="tooltip" data-bs-custom-class="tooltip-primary"
                                    data-bs-placement="top"
                                    title="{{ $source->description }}">{{ str($source->description)->limit(10) ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span data-bs-toggle="tooltip" data-bs-custom-class="tooltip-primary"
                                    data-bs-placement="top" title="{{ $source->website }}">
                                    <a href="{{ $source->website }}" class="text-primary"
                                        target="_blank">{{ str($source->website)->limit(20) }}</a>
                                </span>
                            </td>
                            <td>
                                <div>
                                    <a class="btn " href="{{ route('sources.edit', ['source' => $source->id]) }}">
                                        <i class="ti ti-pencil fs-4 text-primary"></i>
                                    </a>
                                    <button type="button" class="btn " data-bs-toggle="modal"
                                        data-bs-target="#deleteSourceModal" wire:click="show({{ $source->id }})">
                                        <i class="ti ti-trash fs-4 text-danger"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No Source Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- <div class="p-2">
                {{ $sources->links() }}
            </div> --}}
        </div>
    </div>

    <!-- Start::delete-Source -->
    <div class="modal fade" id="deleteSourceModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="deleteSourceModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="deleteSourceModalLabel">
                        <i class="ti ti-trash text-danger me-1"></i>
                        <span>
                            Are you sure you want to delete this Source?!
                        </span>
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <label for="Source-name" class="form-label">Name Source</label>
                        <input type="text" id="Source-title" class="form-control disabled" wire:model="name" disabled
                            placeholder="Enter Source Name">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" wire:click="delete">Delete</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End::delete-Source -->
</div>
