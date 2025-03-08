<div x-data="{ id: null, title: null }">
    <x-page-header title="Show Lead">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
        <li class="breadcrumb-item"><a href="{{ route('leads.index') }}" wire:navigate>Lead</a></li>
    </x-page-header>

    <div class="border p-2 row">
        <div class="col-12 col-xl-7 p-2">
            <div class="p-2 shadow-sm border">
                <h2 class="fs-4">Details About Lead</h2>
                <div class="row">
                    <div class="col-12 col-md-6 p-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" class="form-control read-only" value="{{ $lead->name }}"
                            disabled placeholder="Please Write name">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="status_id" class="form-label">Status</label>
                        <input type="text" id="status_id" class="form-control read-only"
                            value="{{ $lead->status->name ?? 'N/A' }}" disabled placeholder="Please select status">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="source_id" class="form-label">Source</label>
                        <input type="text" id="source_id" class="form-control read-only"
                            value="{{ $lead->source->name ?? 'N/A' }}" disabled placeholder="Please select source">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="assigned_id" class="form-label">Assigned</label>
                        <input type="text" id="assigned_id" class="form-control read-only"
                            value="{{ $lead->assigned->name ?? 'N/A' }}" disabled placeholder="Please assign user">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="tags" class="form-label">Tags</label>
                        <input type="text" id="tags" class="form-control read-only"
                            value="{{ $lead->tags ?? 'N/A' }}" disabled placeholder="Please enter tags">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" class="form-control read-only"
                            value="{{ $lead->address ?? 'N/A' }}" disabled placeholder="Please enter address">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" id="position" class="form-control read-only"
                            value="{{ $lead->position }}" disabled placeholder="Please enter position">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="city" class="form-label">City</label>
                        <input type="text" id="city" class="form-control read-only"
                            value="{{ $lead->city ?? 'N/A' }}" disabled placeholder="Please enter city">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control read-only"
                            value="{{ $lead->email ?? 'N/A' }}" disabled placeholder="Please enter email">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="company" class="form-label">Company</label>
                        <input type="text" id="company" class="form-control read-only"
                            value="{{ $lead->company ?? 'N/A' }}" disabled placeholder="Please enter company">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="group_id" class="form-label">Group</label>
                        <input type="text" id="group_id" class="form-control read-only"
                            value="{{ $lead->group->name ?? 'N/A' }}" disabled placeholder="Please select group">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="website" class="form-label">Website</label>
                        <input type="url" id="website" class="form-control read-only"
                            value="{{ $lead->website ?? 'N/A' }}" disabled placeholder="Please enter website URL">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="country_id" class="form-label">Country</label>
                        <input type="text" id="country_id" class="form-control read-only"
                            value="{{ $lead->country->name ?? 'N/A' }}" disabled placeholder="Please select country">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" id="phone" class="form-control read-only"
                            value="{{ $lead->phone ?? 'N/A' }}" disabled placeholder="Please enter phone number">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="zipCode" class="form-label">Zip Code</label>
                        <input type="text" id="zipCode" class="form-control read-only"
                            value="{{ $lead->zip_code ?? 'N/A' }}" disabled placeholder="Please enter zip code">
                    </div>

                    <div class="col-12 col-md-6 p-2">
                        <label for="leadValue" class="form-label">Lead Value</label>
                        <input type="text" id="leadValue" class="form-control read-only"
                            value="{{ $lead->lead_value ?? 'N/A' }}" disabled placeholder="Please enter lead value">
                    </div>

                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>

                        <textarea class="form-control" id="text-area3" rows="3" disabled placeholder="Please Write Description">{{ $lead->description ?? 'N/A' }}</textarea>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12 col-xl-5 p-2">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Interactives
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <a href="{{ route('leads.interactive', ['id' => $lead->id, 'type' => 'create']) }}"
                            wire:navigate class="btn btn-primary">
                            <i class="ti ti-plus "></i>
                        </a>
                        <button type="button" class="btn bg-primary-transparent" data-bs-toggle="modal"
                            data-bs-target="#ConvertToCustomer">
                            <i class="ti ti-exchange  text-text-primary-emphasis"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled timeline-widget timeline-2 mb-0 my-3 overflow-x-auto"
                        style="max-height: 500px">
                        @forelse ($lead->interactives as $interactive)
                            <li class="timeline-widget-list" wire:key="interactive-{{ $interactive->id }}">
                                <div class="d-flex align-items-top">
                                    <div class="me-5 text-center">
                                        <span
                                            class="d-block fs-14 fw-semibold">{{ $interactive->created_at->format('d') }}</span>
                                        <span
                                            class="d-block fs-12 text-muted">{{ $interactive->created_at->format('y-d') }}</span>
                                    </div>
                                    <div
                                        class="d-flex flex-wrap flex-fill align-items-center justify-content-between gap-2">
                                        <div>
                                            <p class="mb-1 text-truncate timeline-widget-content text-wrap">
                                                {{ str($interactive->title)->limit(30) . ' - ' . $interactive->type }}
                                            </p>
                                            <p class="mb-0 fs-12 lh-1 text-muted">
                                                {{ $interactive->created_at->format('h:iA') }}
                                                <span class="badge bg-primary text-white ms-2"
                                                    style="background-color: {{ $interactive->status->color }} !important;">
                                                    {{ $interactive->status->name }}
                                                </span>

                                            </p>
                                        </div>
                                        <div>
                                            <a class="btn bg-primary-transparent" wire:navigate
                                                href="{{ route('leads.interactive', ['id' => $lead->id, 'type' => 'update', 'interactive' => $interactive->id]) }}">
                                                <i class="ti ti-pencil fs-4 text-primary"></i>
                                            </a>
                                            <button type="button" class="btn bg-danger-transparent"
                                                data-bs-toggle="modal" data-bs-target="#DeleteLeadModal"
                                                x-on:click="id = {{ $interactive->id }}; title = '{{ $interactive->title }}'">
                                                <i class="ti ti-trash fs-4 text-danger"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li>
                                <p class="text-secondary-emphasis  fst-italic text-center">There is no Interactive here
                                </p>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Start::ConvertToCustomer -->
    <x-modal id="ConvertToCustomer">
        <x-slot:title>
            <i class="ti ti-exchange  text-text-primary-emphasis"></i>
            <span>
                Are your sure want convert this Lead to Customers?!
            </span>
        </x-slot:title>
        <x-slot:content>
            <div>
                <label for="lead-title" class="form-label">Lead Title</label>
                <input type="text" id="lead-title" class="form-control disabled"
                    value="{{ $lead?->name ?? 'N/A' }}" disabled placeholder="Enter Lead Title">
            </div>
            <x-select-form id="lead-title" name="Status" :items="$statuses" wireModel="leadForm.currentStatus"
                placeholder="Please Select" />
        </x-slot:content>
        <x-slot:footer>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success"
                wire:click="convertToCustomer({{ $lead->id }})">Convert</button>
        </x-slot:footer>
    </x-modal>
    <!-- End::ConvertToCustomer -->

    <!-- Start::delete-lead -->
    <x-modal id="DeleteLeadModal">
        <x-slot:title>
            <i class="ti ti-trash text-danger me-1"></i>
            <span>
                Are you sure you want to delete this Interactive?!
            </span>
        </x-slot:title>
        <x-slot:content>
            <div>
                <label for="interactiveForm-name" class="form-label">Interative Title</label>
                <input type="text" id="interactiveForm-title" class="form-control disabled" x-model="title"
                    disabled placeholder="Enter interactive Name">
            </div>
        </x-slot:content>
        <x-slot:footer>
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" wire:click="deleteInteractive(id)">Delete</button>
        </x-slot:footer>
    </x-modal>
    <!-- End::delete-lead -->
</div>
