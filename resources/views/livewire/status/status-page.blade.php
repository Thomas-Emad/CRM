<div>
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-medium fs-24 mb-0">Status</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">CRM</a></li>

                    <li class="breadcrumb-item active d-inline-flex" aria-current="page">Status</li>
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
            <a class="btn btn-primary btn-wave inline-flex align-items-center gap-2 ms-auto"
                href="{{ route('statuses.create') }}">
                <i class="ti ti-plus fs-5"></i>
                <span>New Status</span>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Color</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($statuses as $status)
                        <tr>
                            <th scope="row">{{ $status->id }}</th>
                            <td>
                                <span>{{ str($status->name) }}</span>
                            </td>
                            <td>
                                <span class="badge bg-success text-white"
                                    style="background-color: {{ $status->color }} !important;">
                                    {{ $status->color }}
                                </span>
                            </td>
                            <td>
                                <div>
                                    <a class="btn " href="{{ route('statuses.edit', ['status' => $status->id]) }}">
                                        <i class="ti ti-pencil fs-4 text-primary"></i>
                                    </a>
                                    <button type="button" class="btn " data-bs-toggle="modal"
                                        data-bs-target="#deleteStatusModal" wire:click="show({{ $status->id }})">
                                        <i class="ti ti-trash fs-4 text-danger"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No Status Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- <div class="p-2">
                {{ $statuses->links() }}
            </div> --}}
        </div>
    </div>

    <!-- Start::delete-status -->
    <div class="modal fade" id="deleteStatusModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="deleteStatusModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="deleteStatusModalLabel">
                        <i class="ti ti-trash text-danger me-1"></i>
                        <span>
                            Are you sure you want to delete this status?!
                        </span>
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <label for="status-name" class="form-label">Name Status</label>
                        <input type="text" id="status-title" class="form-control disabled" wire:model="statusName"
                            disabled placeholder="Enter Status Name">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" wire:click="delete">Delete</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End::delete-status -->
</div>
