<div>
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-medium fs-24 mb-0">group</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">CRM</a></li>

                    <li class="breadcrumb-item active d-inline-flex" aria-current="page">group</li>
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
                href="{{ route('groups.create') }}">
                <i class="ti ti-plus fs-5"></i>
                <span>New group</span>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($groups as $group)
                        <tr>
                            <th scope="row">{{ $group->id }}</th>
                            <td>
                                <span>{{ str($group->name)->limit(10) }}</span>
                            </td>
                            <td>
                                <span data-bs-toggle="tooltip" data-bs-custom-class="tooltip-primary"
                                    data-bs-placement="top"
                                    title="{{ $group->description }}">{{ str($group->description)->limit(10) ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <div>
                                    <a class="btn " href="{{ route('groups.edit', ['group' => $group->id]) }}">
                                        <i class="ti ti-pencil fs-4 text-primary"></i>
                                    </a>
                                    <button type="button" class="btn " data-bs-toggle="modal"
                                        data-bs-target="#DeleteGroupModal" wire:click="show({{ $group->id }})">
                                        <i class="ti ti-trash fs-4 text-danger"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No group Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{--
            <div class="p-2">
                {{ $groups->links() }}
            </div> --}}
        </div>
    </div>

    <!-- Start::delete-group -->
    <div class="modal fade" id="DeleteGroupModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="DeleteGroupModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="DeleteGroupModalLabel">
                        <i class="ti ti-trash text-danger me-1"></i>
                        <span>
                            Are you sure you want to delete this group?!
                        </span>
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <label for="group-name" class="form-label">Name group</label>
                        <input type="text" id="group-title" class="form-control disabled" wire:model="groupName"
                            disabled placeholder="Enter group Name">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" wire:click="delete">Delete</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End::delete-group -->
</div>
