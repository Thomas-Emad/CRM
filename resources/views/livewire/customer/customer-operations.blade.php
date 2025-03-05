<div>
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-medium fs-24 mb-0"
            x-text="$wire.type == 'create' ? 'Add New Customer' : 'Update Customer'"></h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">CRM</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('source.index') }}">Customer</a></li>

                    <li class="breadcrumb-item active d-inline-flex" aria-current="page"
                        x-text="$wire.type == 'create' ? 'Add New Customer' : 'Update Customer'">
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->
    <div class="border p-2">
        <div class="card-body">
            <ul class="nav nav-tabs mb-3 nav-justified nav-style-1 d-sm-flex d-block" role="tablist">
                <li class="nav-item active">
                    <a class="nav-link active" data-bs-toggle="tab" role="tab" href="#details-justified"
                        aria-selected="false">Customer Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" role="tab" href="#billing-justified"
                        aria-selected="false">Billing Address</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="details-justified" role="tabpanel">
                    <div class="row">
                        <div class=" col-12 p-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" wire:model="customer.name"
                                placeholder="Please Write name">
                            @error('customer.name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" id="phone" class="form-control" wire:model="customer.phone"
                                placeholder="Please Write phone">
                            @error('customer.phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4  p-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" class="form-control" wire:model="customer.email"
                                placeholder="Please Write email">
                            @error('customer.email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <label for="company" class="form-label">Company</label>
                            <input type="text" id="company" class="form-control" wire:model="customer.company"
                                placeholder="Please Write company">
                            @error('customer.company')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <label for="vat_number" class="form-label">VAT Number</label>
                            <input type="text" id="vat_number" class="form-control" wire:model="customer.vat_number"
                                placeholder="Please Write VAT Number">
                            @error('customer.vat_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <label for="website" class="form-label">Website</label>
                            <input type="text" id="website" class="form-control" wire:model="customer.website"
                                placeholder="Please Write website">
                            @error('customer.website')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <label for="group" class="form-label">Group</label>
                            <select class="form-select" aria-label="Please Select" id="group"
                                wire:model="customer.group_id">
                                <option selected>Please Select
                                </option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}" wire:key="{{ $group->id }}">
                                        {{ $group->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('customer.group_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <label for="Currency" class="form-label">Currency</label>
                            <select class="form-select" aria-label="Please Select" id="Currency"
                                wire:model="customer.currency_id">
                                <option selected>Please Select
                                </option>
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency->id }}" wire:key="currency-{{ $currency->id }}">
                                        {{ $currency->name . ' / ' . $currency->code }}
                                    </option>
                                @endforeach
                            </select>
                            @error('customer.currency_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4 p-2">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" id="address" class="form-control" wire:model="customer.address"
                                placeholder="Please Write address">
                            @error('customer.address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class=" col-12 col-md-4 p-2">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" aria-label="Please Select" id="country"
                                wire:model="customer.country_id">
                                <option selected>Please Select
                                </option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" wire:key="{{ $country->id }}">
                                        {{ $country->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('customer.country_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <label for="city" class="form-label">City</label>
                            <input type="text" id="city" class="form-control" wire:model="customer.city"
                                placeholder="Please Write city">
                            @error('customer.city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <label for="zip_code" class="form-label">Zip Code</label>
                            <input type="text" id="zip_code" class="form-control" wire:model="customer.zip_code"
                                placeholder="Please Write Zip Code">
                            @error('customer.zip_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="billing-justified" role="tabpanel">
                    <div class="row">
                        <div class="col-12 p-2">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" aria-label="Please Select" id="country"
                                wire:model="customer.billing_country_id">
                                <option selected>Please Select
                                </option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" wire:key="{{ $country->id }}">
                                        {{ $country->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('customer.billing_country_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <label for="street" class="form-label">Street</label>
                            <input type="text" id="street" class="form-control"
                                wire:model="customer.billing_street" placeholder="Please Write Street">
                            @error('customer.billing_street')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <label for="billing_city" class="form-label">City</label>
                            <input type="text" id="billing_city" class="form-control"
                                wire:model="customer.billing_city" placeholder="Please Write city">
                            @error('customer.billing_city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <label for="zip_code" class="form-label">Zip Code</label>
                            <input type="text" id="zip_code" class="form-control"
                                wire:model="customer.billing_zip_code" placeholder="Please Write Zip Code">
                            @error('customer.billing_zip_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-end gap-2">
                <a class="btn btn-secondary" href="{{ route('group.index') }}">Close</a>
                @if ($type == 'create')
                    <button type="button" class="btn btn-success" wire:click="save">Create</button>
                @else
                    <button type="button" class="btn btn-success" wire:click="update">Update</button>
                @endif
            </div>
        </div>
    </div>
</div>
