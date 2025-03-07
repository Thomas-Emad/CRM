<div>
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-medium fs-24 mb-0">Status</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">CRM</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('statuses.index') }}">Status</a></li>

                    <li class="breadcrumb-item active d-inline-flex" aria-current="page"
                        x-text="$wire.type == 'create' ? 'Add New Status' : 'Update Status'"></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->
    <form class="card border p-2">
        <div>
            <label for="status-name" class="form-label">Name Status</label>
            <input type="text" id="status-title" class="form-control" wire:model="name"
                placeholder="Enter Status Name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-2 mt-3">
            <label class="form-label" for="status-color">Type Color</label>
            <input class="form-control form-input-color" id="status-color" wire:model="color" type="color"
                value="#136bd0">
        </div>
        @error('color')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        <div class="mt-3 d-flex justify-content-end gap-2">
            <a class="btn btn-secondary" href="{{ route('statuses.index') }}">Close</a>
            @if ($type == 'create')
                <button type="button" class="btn btn-primary" wire:click="save">Create</button>
            @else
                <button type="button" class="btn btn-primary" wire:click="update">Update</button>
            @endif
        </div>
    </form>
</div>
