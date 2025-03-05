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
    <div class="border p-2">

        <div class="card-body">
            <ul class="nav nav-pills mb-3 nav-justified tab-style-5 d-sm-flex d-block" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-details-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-details"
                        aria-selected="true">Details</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">Contacts</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-billing-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-billing" type="button" role="tab" aria-controls="pills-billing"
                        aria-selected="false">Billing</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane show active text-muted" id="pills-details" role="tabpanel"
                    aria-labelledby="pills-details-tab" tabindex="0">
                    <div class="row">
                        <div class="col-12 col-md-6 p-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control read-only"
                                value="{{ $customer->name }}" disabled placeholder="Please Write name">
                        </div>
                        <div class="col-12 col-md-6 p-2">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" id="position" class="form-control read-only"
                                value="{{ $customer->position }}" disabled placeholder="Please enter position">
                        </div>

                        <div class="col-12 col-md-6 p-2">
                            <label for="company" class="form-label">Company</label>
                            <input type="text" id="company" class="form-control read-only"
                                value="{{ $customer->company ?? 'N/A' }}" disabled placeholder="Please enter company">
                        </div>
                        <div class="col-12 col-md-6 p-2">
                            <label for="group_id" class="form-label">Group</label>
                            <input type="text" id="group_id" class="form-control read-only"
                                value="{{ $customer->group->name ?? 'N/A' }}" disabled
                                placeholder="Please select group">
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
                            <label for="tags" class="form-label">Tags</label>
                            <input type="text" id="tags" class="form-control read-only"
                                value="{{ $customer->tags ?? 'N/A' }}" disabled placeholder="Please enter tags">
                        </div>

                        <div class="col-12 col-md-6 p-2">
                            <label for="status_id" class="form-label">Status</label>
                            <input type="text" id="status_id" class="form-control read-only"
                                value="{{ $customer->status->name ?? 'N/A' }}" disabled
                                placeholder="Please select status">
                        </div>

                        <div class="col-12 col-md-6 p-2">
                            <label for="source_id" class="form-label">Source</label>
                            <input type="text" id="source_id" class="form-control read-only"
                                value="{{ $customer->source->name ?? 'N/A' }}" disabled
                                placeholder="Please select source">
                        </div>

                        <div class="col-12 col-md-6 p-2">
                            <label for="assigned_id" class="form-label">Assigned</label>
                            <input type="text" id="assigned_id" class="form-control read-only"
                                value="{{ $customer->assigned->name ?? 'N/A' }}" disabled
                                placeholder="Please assign user">
                        </div>
                        <div class="col-12 col-md-6 p-2">
                            <label for="vat_number" class="form-label">VAT Number</label>
                            <input type="text" id="vat_number" class="form-control read-only"
                                value="{{ $customer->vat_number ?? 'N/A' }}" disabled
                                placeholder="Please VAT Number">
                        </div>

                        <div class="col-12 col-md-6 p-2">
                            <label for="currency" class="form-label">Currency</label>
                            <input type="text" id="currency" class="form-control read-only"
                                value="{{ $customer->currency->name ?? 'N/A' }}" disabled
                                placeholder="Please Currency">
                        </div>

                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>

                            <textarea class="form-control" id="text-area3" rows="3" disabled placeholder="Please Write Description">{{ $customer->description ?? 'N/A' }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="tab-pane text-muted" id="pills-contact" role="tabpanel"
                    aria-labelledby="pills-contact-tab" tabindex="0">
                    <div class="row">
                        <div class="col-12 col-md-6 p-2">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" id="address" class="form-control read-only"
                                value="{{ $customer->address ?? 'N/A' }}" disabled
                                placeholder="Please enter address">
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
                                value="{{ $customer->phone ?? 'N/A' }}" disabled
                                placeholder="Please enter phone number">
                        </div>

                        <div class="col-12 col-md-6 p-2">
                            <label for="zipCode" class="form-label">Zip Code</label>
                            <input type="text" id="zipCode" class="form-control read-only"
                                value="{{ $customer->zip_code ?? 'N/A' }}" disabled
                                placeholder="Please enter zip code">
                        </div>
                    </div>
                </div>
                <div class="tab-pane text-muted" id="pills-billing" role="tabpanel"
                    aria-labelledby="pills-billing-tab" tabindex="0">
                    <div class="row">
                        @foreach ($customer->billings as $key => $billing)
                            <div class="row mb-2">
                                <h2 class="fs-4">Billing Address ({{ $key + 1 }})</h2>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="street" class="form-label">Street</label>
                                    <input type="text" id="street" class="form-control read-only"
                                        value="{{ $billing->street ?? 'N/A' }}" disabled
                                        placeholder="Please enter street">
                                </div>

                                <div class="col-12 col-md-6 p-2">
                                    <label for="city" class="form-label">Country</label>
                                    <input type="text" id="city" class="form-control read-only"
                                        value="{{ $billing->country->name ?? 'N/A' }}" disabled
                                        placeholder="Please enter city">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" id="city" class="form-control read-only"
                                        value="{{ $billing->city ?? 'N/A' }}" disabled
                                        placeholder="Please enter city">
                                </div>

                                <div class="col-12 col-md-6 p-2">
                                    <label for="zipCode" class="form-label">Zip Code</label>
                                    <input type="text" id="zipCode" class="form-control read-only"
                                        value="{{ $billing->zip_code ?? 'N/A' }}" disabled
                                        placeholder="Please enter zip code">
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
