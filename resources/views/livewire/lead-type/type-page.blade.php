<div x-data="{ id: null, title: null }">
    <x-page-header title="Types">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
    </x-page-header>

    <div class="border p-2">
        <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
            <div>
                <input type="text" class="form-control " wire:model.live="search" placeholder="Saerch...">
            </div>
            <a class="btn btn-primary btn-wave d-inline-flex align-items-center gap-2 ms-auto text-nowrap"
                href="{{ route('lead-types.create') }}" wire:navigate>
                <i class="ti ti-plus fs-5"></i>
                <span>New type</span>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($types as $type)
                        <tr>
                            <th scope="row">{{ $type->id }}</th>
                            <td>
                                <span>{{ str($type->name)->limit(10) }}</span>
                            </td>
                            <td>
                                <div>
                                    <a class="btn " href="{{ route('lead-types.edit', ['lead_type' => $type->id]) }}"
                                        wire:navigate>
                                        <i class="ti ti-pencil fs-4 text-primary"></i>
                                    </a>
                                    <button type="button" class="btn " data-bs-toggle="modal"
                                        data-bs-target="#DeleteGroupModal"
                                        x-on:click="id = {{ $type->id }}; title = '{{ $type->name }}' ">
                                        <i class="ti ti-trash fs-4 text-danger"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No type Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-end mt-3">
                {{ $types->links() }}
            </div>
        </div>
    </div>

    <!-- Start::delete-type -->
    <x-modal id="DeleteGroupModal">
        <x-slot:title>
            <i class="ti ti-trash text-danger me-1"></i>
            <span>
                Are you sure you want to delete this type?!
            </span>
        </x-slot:title>
        <x-slot:content>
            <div>
                <label for="type-name" class="form-label">Name type</label>
                <input type="text" id="type-title" class="form-control disabled" x-model="title" disabled
                    placeholder="Enter type Name">
            </div>
        </x-slot:content>
        <x-slot:footer>
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" wire:click="delete(id)">Delete</button>
        </x-slot:footer>
    </x-modal>
    <!-- End::delete-type -->
</div>
