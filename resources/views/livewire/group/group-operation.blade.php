<div>
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-medium fs-24 mb-0">Group</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">CRM</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('group.index') }}">group</a></li>

                    <li class="breadcrumb-item active d-inline-flex" aria-current="page"
                        x-text=" $wire.type == 'create' ? 'Add New group' : 'Update Group' "></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->
    <form class="card border p-2">
        <div class="mb-2">
            <label for="group-name" class="form-label">Name group</label>
            <input type="text" id="group-title" class="form-control" wire:model="groupForm.name"
                placeholder="Enter group Name">
            @error('groupForm.name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="group-description" class="form-label">
                description
            </label>
            <textarea class="form-control " id="group-description" rows="3" wire:model="groupForm.description"
                placeholder="Enter description group"></textarea>
            @error('groupForm.description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mt-3 d-flex justify-content-end gap-2">
            <a class="btn btn-secondary" href="{{ route('group.index') }}">Close</a>
            @if ($type == 'create')
                <button type="button" class="btn btn-primary" wire:click="save">Create</button>
            @else
                <button type="button" class="btn btn-primary" wire:click="update">Update</button>
            @endif
        </div>
    </form>
</div>
