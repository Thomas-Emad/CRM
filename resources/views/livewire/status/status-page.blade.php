<div x-data="{ deleteId: null, deleteTitle: null }">

    <x-page-header title="Statuses">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
    </x-page-header>

    <div class="border p-2">
        <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
            <div>
                <input type="text" class="form-control " wire:model.live="search" placeholder="Saerch...">
            </div>
            <a class="btn btn-primary btn-wave d-inline-flex align-items-center gap-2 ms-auto text-nowrap"
                href="{{ route('statuses.create') }}" wire:navigate>
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
                                    <a class="btn " href="{{ route('statuses.edit', ['status' => $status->id]) }}"
                                        wire:navigate>
                                        <i class="ti ti-pencil fs-4 text-primary"></i>
                                    </a>
                                    <button type="button" class="btn " data-bs-toggle="modal"
                                        data-bs-target="#deleteStatusModal"
                                        x-on:click="deleteId = {{ $status->id }}; deleteTitle = '{{ $status->name }}'">
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

            <div class="d-flex justify-content-end mt-3">
                {{ $statuses->links() }}
            </div>
        </div>
    </div>

    <!-- Start::delete-status -->
    <x-modal id="deleteStatusModal">
        <x-slot:title>
            <i class="ti ti-trash text-danger me-1"></i>
            <span>
                Are you sure you want to delete this status?!
            </span>
        </x-slot:title>
        <x-slot:content>
            <div>
                <label for="status-name" class="form-label">Name Status</label>
                <input type="text" id="status-title" class="form-control disabled" x-model="deleteTitle" disabled
                    placeholder="Enter Status Name">
            </div>

        </x-slot:content>
        <x-slot:footer>
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" wire:click="delete(deleteId)">Delete</button>
        </x-slot:footer>
    </x-modal>
    <!-- End::delete-status -->
</div>
