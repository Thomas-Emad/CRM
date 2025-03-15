<div>
    <x-page-header title="{{ $type == 'create' ? 'Add New Customer' : 'Update Customer' }}">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
        <li class="breadcrumb-item"><a href="{{ route('customers.index') }}" wire:navigate>Customer</a></li>
    </x-page-header>

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
                        <h5>- Main Information</h5>
                        <div class="col-12 p-2">
                            <x-input-form type="text" id="name-input" name="Name" wireModel="customer.name"
                                placeholder="Please Write name" />
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <x-input-form type="text" id="company" name="Company" wireModel="customer.company"
                                placeholder="Please Write company" />
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <x-input-form type="text" id="address" name="Address" wireModel="customer.address"
                                placeholder="Please Write Address" />
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <x-input-form type="text" id="city" name="City" wireModel="customer.city"
                                placeholder="Please Write city" />
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <x-select-form id="country" name="Country" :items="$countries"
                                wireModel="customer.country_id" placeholder="Please Select Country" />
                        </div>

                        <hr>
                        <h5>- Person Contact</h5>

                        <div class=" col-12 col-md-4 p-2">
                            <x-input-form type="text" id="person_name" name="Person Name"
                                wireModel="customer.person_name" placeholder="Please Write Person Name" />
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <x-input-form type="text" id="person_phone" name="Person Phone"
                                wireModel="customer.person_phone" placeholder="Please Write Person Phone" />
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <x-input-form type="email" id="person_email" name="Person Email"
                                wireModel="customer.person_email" placeholder="Please Write Person Email" />
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <x-input-form type="text" id="person_position" name="Person Position"
                                wireModel="customer.person_position" placeholder="Please Write Person Position" />
                        </div>

                        <hr>
                        <h5>- Customer Source</h5>
                        <div class=" col-12 col-md-4 p-2">
                            <x-select-form id="source" name="Source" :items="$sources"
                                wireModel="customer.source_id" placeholder="Please Select Source" />
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <x-input-form type="date" id="date_acquired" name="Date Acquired"
                                wireModel="customer.date_acquired" placeholder="Please Write Date Acquired" />
                        </div>
                        <div class="col-12 col-md-4 p-2">
                            <x-select-form id="type" name="Customer Type" :items="$types"
                                wireModel="customer.lead_type_id" placeholder="Please Select Customer Type" />
                        </div>
                        <hr>
                        <h5>- Deal Type</h5>

                        <div class=" col-12 col-md-4 p-2">
                            <x-select-form id="status" name="Status" :items="$statuses"
                                wireModel="customer.status_id" placeholder="Please Select Status" />
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <x-select-form id="section" name="Section" :items="$sections"
                                wireModel="customer.section" placeholder="Please Select Section" />
                        </div>
                        <div class="col-12 col-md-4 p-2">
                            <x-select-form id="unit" name="Lead Unit" :items="$units"
                                wireModel="customer.lead_unit_id" placeholder="Please Select Lead Unit" />
                        </div>
                        <div class="col-12 col-md-6 p-2">
                            <x-select-form id="assigned" name="Team" :items="$teams"
                                wireModel="customer.team_id" :live="true" placeholder="Please Select Team" />
                        </div>
                        <div class="col-12 col-md-6 p-2">
                            <x-select-form id="assigned" name="Assigned" :items="$employees"
                                wireModel="customer.assigned_id" placeholder="Please Select Assigned" />
                        </div>

                        <hr>
                        <h5>- Internal Notes</h5>
                        <div class="col-12 col-md-4 p-2">
                            <x-select-form id="priority" name="Priority" :items="$priorities"
                                wireModel="customer.priority" placeholder="Please Select Priority" />
                        </div>
                        <div class="col-12 p-2">
                            <x-textarea-form id="project_brief" name="Project Brief"
                                wireModel="customer.project_brief" placeholder="Please Write Project Brief" />
                        </div>

                    </div>
                </div>
                <div class="tab-pane" id="billing-justified" role="tabpanel">
                    <div class="row">
                        <div class="col-12 p-2">
                            <x-select-form id="billing_country" name="Country"
                                wireModel="customer.billing_country_id" :items="$countries"
                                placeholder="Please Select Country" />
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <x-input-form type="text" id="street" name="Street"
                                wireModel="customer.billing_street" placeholder="Please Write Street" />
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <x-input-form type="text" id="billing_city" name="City"
                                wireModel="customer.billing_city" placeholder="Please Write city" />
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <x-input-form type="text" id="zip_code" name="Zip Code"
                                wireModel="customer.billing_zip_code" placeholder="Please Write Zip Code" />
                        </div>
                    </div>
                </div>
            </div>

            <x-buttons-operation type="{{ $type }}" routeCancel="{{ route('customers.index') }}"
                wireSave="save" wireUpdate="update" />
        </div>
    </div>
</div>
