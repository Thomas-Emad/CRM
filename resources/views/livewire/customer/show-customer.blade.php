<div>
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-medium fs-24 mb-0">Show Details</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">CRM</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('source.index') }}">customer</a></li>

                    <li class="breadcrumb-item active d-inline-flex" aria-current="page">
                        Show Details
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->
    <div class="border p-2 row">
        <div class="col-12 col-md-7 p-2">
            <div class="p-2 shadow-sm border">
                <h2 class="fs-4">Details About customer</h2>
                <div class="row">
                    <div class="col-12 col-md-6 p-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" class="form-control read-only"
                            value="{{ $customer->name }}" disabled placeholder="Please Write name">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="status_id" class="form-label">Status</label>
                        <input type="text" id="status_id" class="form-control read-only"
                            value="{{ $customer->status->name ?? 'N/A' }}" disabled placeholder="Please select status">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="source_id" class="form-label">Source</label>
                        <input type="text" id="source_id" class="form-control read-only"
                            value="{{ $customer->source->name ?? 'N/A' }}" disabled placeholder="Please select source">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="assigned_id" class="form-label">Assigned</label>
                        <input type="text" id="assigned_id" class="form-control read-only"
                            value="{{ $customer->assigned->name ?? 'N/A' }}" disabled placeholder="Please assign user">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="tags" class="form-label">Tags</label>
                        <input type="text" id="tags" class="form-control read-only"
                            value="{{ $customer->tags ?? 'N/A' }}" disabled placeholder="Please enter tags">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" class="form-control read-only"
                            value="{{ $customer->address ?? 'N/A' }}" disabled placeholder="Please enter address">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" id="position" class="form-control read-only"
                            value="{{ $customer->position }}" disabled placeholder="Please enter position">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="city" class="form-label">City</label>
                        <input type="text" id="city" class="form-control read-only"
                            value="{{ $customer->city ?? 'N/A' }}" disabled placeholder="Please enter city">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control read-only"
                            value="{{ $customer->email ?? 'N/A' }}" disabled placeholder="Please enter email">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="company" class="form-label">Company</label>
                        <input type="text" id="company" class="form-control read-only"
                            value="{{ $customer->company ?? 'N/A' }}" disabled placeholder="Please enter company">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="group_id" class="form-label">Group</label>
                        <input type="text" id="group_id" class="form-control read-only"
                            value="{{ $customer->group->name ?? 'N/A' }}" disabled placeholder="Please select group">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="website" class="form-label">Website</label>
                        <input type="url" id="website" class="form-control read-only"
                            value="{{ $customer->website ?? 'N/A' }}" disabled
                            placeholder="Please enter website URL">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="country_id" class="form-label">Country</label>
                        <input type="text" id="country_id" class="form-control read-only"
                            value="{{ $customer->country->name ?? 'N/A' }}" disabled
                            placeholder="Please select country">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" id="phone" class="form-control read-only"
                            value="{{ $customer->phone ?? 'N/A' }}" disabled placeholder="Please enter phone number">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="zipCode" class="form-label">Zip Code</label>
                        <input type="text" id="zipCode" class="form-control read-only"
                            value="{{ $customer->zip_code ?? 'N/A' }}" disabled placeholder="Please enter zip code">
                    </div>

                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>

                        <textarea class="form-control" id="text-area3" rows="3" disabled placeholder="Please Write Description">{{ $customer->description ?? 'N/A' }}</textarea>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 p-2">
            <div class="p-2 shadow-sm border">
                <h2 class="fs-4">Contact information</h2>
                <div class="row">
                    <div class="col-12 col-md-6 p-2">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" class="form-control read-only"
                            value="{{ $customer->address ?? 'N/A' }}" disabled placeholder="Please enter address">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="city" class="form-label">City</label>
                        <input type="text" id="city" class="form-control read-only"
                            value="{{ $customer->city ?? 'N/A' }}" disabled placeholder="Please enter city">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control read-only"
                            value="{{ $customer->email ?? 'N/A' }}" disabled placeholder="Please enter email">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" id="phone" class="form-control read-only"
                            value="{{ $customer->phone ?? 'N/A' }}" disabled placeholder="Please enter phone number">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="zipCode" class="form-label">Zip Code</label>
                        <input type="text" id="zipCode" class="form-control read-only"
                            value="{{ $customer->zip_code ?? 'N/A' }}" disabled placeholder="Please enter zip code">
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>
