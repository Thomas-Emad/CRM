<div>
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-medium fs-24 mb-0" x-text="$wire.type == 'create' ? 'Add New Lead' : 'Update Lead'">New
            Lead</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">CRM</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('source.index') }}">Lead</a></li>

                    <li class="breadcrumb-item active d-inline-flex" aria-current="page"
                        x-text="$wire.type == 'create' ? 'Add New Lead' : 'Update Lead'">
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->
    <div class=" border p-2 row">
        <div class=" col-12 col-md-4 p-2">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" aria-label="Please Select" id="status" wire:model="lead.status_id">
                <option selected>Please Select
                </option>
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" wire:key="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
            </select>
            @error('lead.status_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class=" col-12 col-md-4 p-2">
            <label for="source" class="form-label">Source</label>
            <select class="form-select" aria-label="Please Select" id="source" wire:model="lead.source_id">
                <option selected>Please Select
                </option>
                @foreach ($sources as $source)
                    <option value="{{ $source->id }}" wire:key="{{ $source->id }}">{{ $source->name }}</option>
                @endforeach
            </select>
            @error('lead.source_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class=" col-12 col-md-4 p-2">
            <label for="assigned" class="form-label">Assigned</label>
            <select class="form-select" aria-label="Please Select" id="assigned" wire:model="lead.assigned_id">
                <option selected>Please Select
                </option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" wire:key="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('lead.assigned_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12">
            <label for="tags" class="form-label">Tags</label>
            <input type="text" id="tags" class="form-control" wire:model="lead.tags"
                placeholder="Please Write Tags">
            @error('lead.tags')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class=" col-12 col-md-4 p-2">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" class="form-control" wire:model="lead.name"
                placeholder="Please Write name">
            @error('lead.name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class=" col-12 col-md-4 p-2">
            <label for="address" class="form-label">Address</label>
            <input type="text" id="address" class="form-control" wire:model="lead.address"
                placeholder="Please Write Address">
            @error('lead.address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class=" col-12 col-md-4 p-2">
            <label for="position" class="form-label">Position</label>
            <input type="text" id="position" class="form-control" wire:model="lead.position"
                placeholder="Please Write position">
            @error('lead.position')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class=" col-12 col-md-4 p-2">
            <label for="city" class="form-label">City</label>
            <input type="text" id="city" class="form-control" wire:model="lead.city"
                placeholder="Please Write city">
            @error('lead.city')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class=" col-12 col-md-4 p-2">
            <label for="email" class="form-label">Email</label>
            <input type="text" id="email" class="form-control" wire:model="lead.email"
                placeholder="Please Write email">
            @error('lead.email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class=" col-12 col-md-4 p-2">
            <label for="company" class="form-label">Company</label>
            <input type="text" id="company" class="form-control" wire:model="lead.company"
                placeholder="Please Write company">
            @error('lead.company')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class=" col-12 col-md-4 p-2">
            <label for="group" class="form-label">Group</label>
            <select class="form-select" aria-label="Please Select" id="group" wire:model="lead.group_id">
                <option selected>Please Select
                </option>
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}" wire:key="{{ $group->id }}"> {{ $group->name }}
                    </option>
                @endforeach
            </select>
            @error('lead.group_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class=" col-12 col-md-4 p-2">
            <label for="website" class="form-label">Website</label>
            <input type="text" id="website" class="form-control" wire:model="lead.website"
                placeholder="Please Write website">
            @error('lead.website')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class=" col-12 col-md-4 p-2">
            <label for="country" class="form-label">Country</label>
            <select class="form-select" aria-label="Please Select" id="country" wire:model="lead.country_id">
                <option selected>Please Select
                </option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" wire:key="{{ $country->id }}">{{ $country->name }}
                    </option>
                @endforeach
            </select>
            @error('lead.country_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class=" col-12 col-md-4 p-2">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" id="phone" class="form-control" wire:model="lead.phone"
                placeholder="Please Write phone">
            @error('lead.phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class=" col-12 col-md-4 p-2">
            <label for="zipCode" class="form-label">Zip Code</label>
            <input type="text" id="zipCode" class="form-control" wire:model="lead.zipCode"
                placeholder="Please Write Zip Code">
            @error('lead.zipCode')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class=" col-12 col-md-4 p-2">
            <label for="leadValue" class="form-label">Lead Value</label>
            <input type="number" id="leadValue" class="form-control" wire:model="lead.leadValue"
                placeholder="$0.0">
            @error('lead.leadValue')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-12 p-2">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="text-area3" rows="3" wire:model="lead.description"
                placeholder="Please Write Description"></textarea>

            @error('lead.description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-12 p-2 d-flex justify-content-end gap-2">
            @if ($type == 'create')
                <button type="submit" class="btn btn-primary btn-lg" wire:click="save"
                    x-show="$wire.type == 'create">Save</button>
            @else
                <button type="submit" class="btn btn-primary btn-lg" wire:click="update"
                    x-show="$wire.type == 'update">Update</button>
            @endif
            <a type="submit" class="btn btn-danger btn-lg" href="{{ route('lead.index') }}">Cancel</a>
        </div>
    </div>
</div>
