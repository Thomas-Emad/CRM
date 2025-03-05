<div>
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-medium fs-24 mb-0"
            x-text="$wire.type == 'create' ? 'Add New Interactive' : 'Update Interactive'"></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">CRM</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('source.index') }}">interactiveForm</a></li>

                    <li class="breadcrumb-item active d-inline-flex" aria-current="page"
                        x-text="$wire.type == 'create' ? 'Add New Interactive' : 'Update Interactive'">
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->
    <div class=" border p-2 row">
        <input type="hidden" name="lead_id" wire:model="interactiveForm.lead_id">
        <div class=" col-12 col-md-6 p-2">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" aria-label="Please Select" id="status"
                wire:model="interactiveForm.status_id">
                <option selected>Please Select
                </option>
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" wire:key="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
            </select>
            @error('interactiveForm.status_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class=" col-12 col-md-6 p-2">
            <label for="status" class="form-label">Type</label>
            <select class="form-select" aria-label="Please Select" id="type" wire:model="interactiveForm.type">
                <option selected>Please Select
                </option>
                <option value="message">Message</option>
                <option value="call">Call</option>
            </select>

            @error('interactiveForm.status_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12 p-2">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" class="form-control" wire:model="interactiveForm.title"
                placeholder="Please Write title">
            @error('interactiveForm.title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-12 p-2">
            <label for="content" class="form-label">content</label>
            <textarea class="form-control" id="text-area3" rows="3" wire:model="interactiveForm.content"
                placeholder="Please Write content"></textarea>

            @error('interactiveForm.content')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-12 p-2 d-flex justify-content-end gap-2">
            @if ($type == 'create')
                <button type="submit" class="btn btn-primary btn-lg" wire:click="save">Save</button>
            @else
                <button type="submit" class="btn btn-primary btn-lg" wire:click="update">Update</button>
            @endif
            <a type="submit" class="btn btn-danger btn-lg"
                href="{{ route('lead.show', ['id' => $this->id]) }}">Cancel</a>
        </div>
    </div>
</div>
