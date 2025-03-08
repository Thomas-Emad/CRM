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
                        <div class="col-12 p-2">
                            <x-input-form type="text" id="name-input" name="Name" wireModel="customer.name"
                                placeholder="Please Write name" />
                        </div>
                        <div class="col-12 col-md-4 p-2">
                            <x-input-form type="text" id="phone-input" name="Phone" wireModel="customer.phone"
                                placeholder="Please Write phone" />
                        </div>
                        <div class="col-12 col-md-4  p-2">
                            <x-input-form type="email" id="email-input" name="Email" wireModel="customer.email"
                                placeholder="Please Write email" />
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <x-input-form type="text" id="company-input" name="Company" wireModel="customer.company"
                                placeholder="Please Write company" />
                        </div>
                        <div class="col-12 col-md-4 p-2">
                            <x-input-form type="text" id="vat-number-input" name="VAT Number"
                                wireModel="customer.vat_number" placeholder="Please Write VAT Number" />
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <x-input-form type="text" id="website" name="Website" wireModel="customer.website"
                                placeholder="Please Write website" />
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <x-select-form id="group" name="Group" wireModel="customer.group_id" :items="$groups"
                                placeholder="Please Select Group" />
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <x-select-form id="currency" name="Currency" wireModel="customer.currency_id"
                                :items="$currencies" placeholder="Please Select Currency" />
                        </div>
                        <div class="col-12 col-md-4 p-2">
                            <x-input-form type="text" id="address" name="Address" wireModel="customer.address"
                                placeholder="Please Write address" />
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <x-select-form id="country" name="Country" wireModel="customer.country_id"
                                :items="$countries" placeholder="Please Select Country" />
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <x-input-form type="text" id="city" name="City" wireModel="customer.city"
                                placeholder="Please Write city" />
                        </div>
                        <div class=" col-12 col-md-4 p-2">
                            <x-input-form type="text" id="zip_code" name="Zip Code" wireModel="customer.zip_code"
                                placeholder="Please Write Zip Code" />
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
