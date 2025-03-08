<div>

    <x-page-header title="Sources">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">CRM</a></li>
    </x-page-header>

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
        </div>
    </div>

    <!-- Start::delete-Source -->
    <x-modal id="deleteStatusModal">
        <x-slot:title>
            <i class="ti ti-trash text-danger me-1"></i>
            <span>
                Are you sure you want to delete this Source?!
            </span>
        </x-slot:title>
        <x-slot:content>
            <div>
                <label for="Source-name" class="form-label">Name Source</label>
                <input type="text" id="Source-title" class="form-control disabled" wire:model="sourceName" disabled
                    placeholder="Enter Source Name">
            </div>
        </x-slot:content>
        <x-slot:footer>
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" wire:click="delete">Delete</button>
        </x-slot:footer>
    </x-modal>
    <!-- End::delete-Source -->
</div>
