<div x-data="{ id: null, title: null, idNote: null, contentNote: null }">
    <x-page-header title="{{ $sourcePage == 'lead' ? 'Show Lead' : 'Show Customer' }}">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
        @if ($sourcePage == 'lead')
            <li class="breadcrumb-item"><a href="{{ route('leads.index') }}" wire:navigate>Leads</a></li>
        @else
            <li class="breadcrumb-item"><a href="{{ route('customers.index') }}" wire:navigate>Customers</a></li>
        @endif
    </x-page-header>

    <div class="border p-2 row">
        <div class="col-12 col-md-7 p-2">
            <div class="shadow-sm border">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center p-4">
                        <h2 class="fs-4"
                            x-text="$wire.sourcePage == 'lead' ? 'Details About Lead' : 'Details About Customer'"></h2>
                        @if ($sourcePage == 'lead')
                            <button type="button" class="btn bg-primary-transparent" data-bs-toggle="modal"
                                data-bs-target="#ConvertToCustomer">
                                <i class="ti ti-exchange  text-text-primary-emphasis"></i>
                            </button>
                        @endif
                    </div>
                    <ul class="nav nav-tabs tab-style-2 nav-justified mb-3 d-sm-flex d-block" id="myTab1"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="information-tab" data-bs-toggle="tab"
                                data-bs-target="#information-tab-pane" type="button" role="tab"
                                aria-controls="home-tab-pane" aria-selected="true"><i
                                    class="ri-gift-line me-1 align-middle"></i>Main Information</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="contact-tab" data-bs-toggle="tab"
                                data-bs-target="#contact-tab-pane" type="button" role="tab"
                                aria-controls="profile-tab-pane" aria-selected="false"><i
                                    class="ri-check-double-line me-1 align-middle"></i>Person Contact</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="lead-source-tab" data-bs-toggle="tab"
                                data-bs-target="#lead-source-tab-pane" type="button" role="tab"
                                aria-controls="contact-tab-pane" aria-selected="false"><i
                                    class="ri-shopping-bag-3-line me-1 align-middle"></i>Lead Source</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="deal-type-tab" data-bs-toggle="tab"
                                data-bs-target="#deal-type-tab-pane" type="button" role="tab"
                                aria-selected="false"><i class="ri-truck-line me-1 align-middle"></i>Deal Type</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="internal-note-tab" data-bs-toggle="tab"
                                data-bs-target="#internal-note-tab-pane" type="button" role="tab"
                                aria-selected="false"><i class="ri-truck-line me-1 align-middle"></i>Internal
                                Notes</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade text-muted" id="information-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                            <ul class="row">
                                <div class="col-12 col-md-6 p-2">
                                    <label for="name" class="form-label">Lead Name</label>
                                    <input type="text" id="name" class="form-control read-only"
                                        value="{{ $lead->name }}" disabled placeholder="Please Write name">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="company" class="form-label">Company</label>
                                    <input type="text" id="company" class="form-control read-only"
                                        value="{{ $lead->company ?? 'N/A' }}" disabled
                                        placeholder="Please enter company">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="parent_account" class="form-label">Parent Account</label>
                                    <input type="text" id="parent_account" class="form-control read-only"
                                        value="{{ $lead->parent_account ?? 'N/A' }}" disabled
                                        placeholder="Please enter company">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="contractor" class="form-label">Contractor</label>
                                    <input type="text" id="contractor" class="form-control read-only"
                                        value="{{ $lead->contractor ?? 'N/A' }}" disabled
                                        placeholder="Please enter company">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="developer" class="form-label">Developer</label>
                                    <input type="text" id="developer" class="form-control read-only"
                                        value="{{ $lead->developer ?? 'N/A' }}" disabled
                                        placeholder="Please enter company">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="consultant" class="form-label">Consultant</label>
                                    <input type="text" id="consultant" class="form-control read-only"
                                        value="{{ $lead->consultant ?? 'N/A' }}" disabled
                                        placeholder="Please enter company">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="investor" class="form-label">Investor/Owner</label>
                                    <input type="text" id="investor" class="form-control read-only"
                                        value="{{ $lead->investor ?? 'N/A' }}" disabled
                                        placeholder="Please enter company">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="architect" class="form-label">Architect</label>
                                    <input type="text" id="architect" class="form-control read-only"
                                        value="{{ $lead->architect ?? 'N/A' }}" disabled
                                        placeholder="Please enter company">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="industry" class="form-label">Industry</label>
                                    <input type="text" id="industry" class="form-control read-only"
                                        value="{{ $lead->industry ?? 'N/A' }}" disabled
                                        placeholder="Please enter company">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" id="address" class="form-control read-only"
                                        value="{{ $lead->address ?? 'N/A' }}" disabled
                                        placeholder="Please enter company">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" id="city" class="form-control read-only"
                                        value="{{ $lead->city ?? 'N/A' }}" disabled
                                        placeholder="Please enter company">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="country_id" class="form-label">Country</label>
                                    <input type="text" id="country_id" class="form-control read-only"
                                        value="{{ $lead->country->name ?? 'N/A' }}" disabled
                                        placeholder="Please select country">
                                </div>
                            </ul>
                        </div>
                        <div class="tab-pane fade show active text-muted" id="contact-tab-pane" role="tabpanel"
                            aria-labelledby="profile-tab" tabindex="0">
                            <ul class="row">

                                <div class="col-12 col-md-6 p-2">
                                    <label for="person_name" class="form-label">Person Name</label>
                                    <input type="text" id="person_name" class="form-control read-only"
                                        value="{{ $lead->person_name ?? 'N/A' }}" disabled
                                        placeholder="Please select country">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="person_phone" class="form-label">Person Phone</label>
                                    <input type="text" id="person_phone" class="form-control read-only"
                                        value="{{ $lead->person_phone ?? 'N/A' }}" disabled
                                        placeholder="Please select country">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="person_email" class="form-label">Person Email</label>
                                    <input type="text" id="person_email" class="form-control read-only"
                                        value="{{ $lead->person_email ?? 'N/A' }}" disabled
                                        placeholder="Please select country">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="person_position" class="form-label">Person Position</label>
                                    <input type="text" id="person_position" class="form-control read-only"
                                        value="{{ $lead->person_position ?? 'N/A' }}" disabled
                                        placeholder="Please select country">
                                </div>
                            </ul>
                        </div>
                        <div class="tab-pane fade text-muted" id="lead-source-tab-pane" role="tabpanel"
                            aria-labelledby="contact-tab" tabindex="0">
                            <ul class="row">
                                <div class="col-12 col-md-6 p-2">
                                    <label for="Source" class="form-label">Source</label>
                                    <input type="text" id="Source" class="form-control read-only"
                                        value="{{ $lead->source->name ?? 'N/A' }}" disabled
                                        placeholder="Please select Source">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="date_acquired" class="form-label">Date Acquired</label>
                                    <input type="text" id="date_acquired" class="form-control read-only"
                                        value="{{ $lead->date_acquired->format('Y-m-d') ?? 'N/A' }}" disabled
                                        placeholder="Please select Date Acquired">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="lead_type" class="form-label">Lead Type</label>
                                    <input type="text" id="lead_type" class="form-control read-only"
                                        value="{{ $lead->type->name ?? 'N/A' }}" disabled
                                        placeholder="Please select Lead Type">
                                </div>
                            </ul>
                        </div>
                        <div class="tab-pane fade text-muted" id="deal-type-tab-pane" role="tabpanel"
                            tabindex="0">
                            <ul class="row">
                                <div class="col-12 col-md-6 p-2">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="text" id="status" class="form-control read-only"
                                        value="{{ $lead->status->name ?? 'N/A' }}" disabled
                                        placeholder="Please select status">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="section" class="form-label">Section</label>
                                    <input type="text" id="section" class="form-control read-only"
                                        value="{{ $lead->section ?? 'N/A' }}" disabled
                                        placeholder="Please select status">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="unit" class="form-label">Lead Unit</label>
                                    <input type="text" id="unit" class="form-control read-only"
                                        value="{{ $lead->unit->name ?? 'N/A' }}" disabled
                                        placeholder="Please select status">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="team" class="form-label">Team</label>
                                    <input type="text" id="team" class="form-control read-only"
                                        value="{{ $lead->team->name ?? 'N/A' }}" disabled
                                        placeholder="Please select status">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="assigned" class="form-label">Assigned</label>
                                    <input type="text" id="assigned" class="form-control read-only"
                                        value="{{ $lead->assigned->name ?? 'N/A' }}" disabled
                                        placeholder="Please select status">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="lead_value" class="form-label">Estimated Budget Range</label>
                                    <input type="text" id="lead_value" class="form-control read-only"
                                        value="{{ $lead->lead_value ?? 'N/A' }}" disabled
                                        placeholder="Please select status">
                                </div>
                            </ul>
                        </div>
                        <div class="tab-pane fade text-muted" id="internal-note-tab-pane" role="tabpanel"
                            tabindex="0">
                            <ul class="row">
                                <div class="col-12 col-md-6 p-2">
                                    <label for="priority" class="form-label">Priority</label>
                                    <input type="text" id="priority" class="form-control read-only"
                                        value="{{ $lead->priority->label() ?? 'N/A' }}" disabled
                                        placeholder="Please select priority">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="decision_makers" class="form-label">Decision Makers</label>
                                    <input type="text" id="decision_makers" class="form-control read-only"
                                        value="{{ $lead->decision_makers ?? 'N/A' }}" disabled
                                        placeholder="Please select decision_makers">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="next_step" class="form-label">Next Step</label>
                                    <input type="text" id="next_step" class="form-control read-only"
                                        value="{{ $lead->next_step ?? 'N/A' }}" disabled
                                        placeholder="Please select next_step">
                                </div>
                                <div class="col-12 col-md-6 p-2">
                                    <label for="next_step_date" class="form-label">Next Step Date</label>
                                    <input type="text" id="next_step_date" class="form-control read-only"
                                        value="{{ $lead->next_step_date?->format('Y-m-d') ?? 'N/A' }}" disabled
                                        placeholder="Please select Next Step Date">
                                </div>

                                <div class="col-12">
                                    <label for="description" class="form-label">Step Description</label>
                                    <textarea class="form-control" id="text-area3" rows="3" disabled placeholder="Please Write Description">{{ $lead->step_description ?? 'N/A' }}</textarea>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 p-2">
            <div class="p-4 shadow-sm border">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="fs-5">Notes</h3>
                    @can(\App\Enums\PermissionEnum::CRM_ACTIVIY_NOTE->value)
                        <button type="button" class="btn bg-success-transparent" data-bs-toggle="modal"
                            data-bs-target="#AddNoteModal">
                            <i class="ti ti-plus text-primary-emphasis"></i>
                        </button>
                    @endcan
                </div>
                <div>
                    <x-table>
                        <x-slot:thead>
                            <th scope="col">S.No</th>
                            <th scope="col">Creator</th>
                            <th scope="col">Content</th>
                            <th scope="col">Since</th>
                            <th scope="col">Action</th>
                        </x-slot:thead>
                        <x-slot:tbody>
                            @forelse ($lead->allNotes as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->creator->name ?? 'N/A' }}</td>
                                    <td title="{{ $item->content }}">
                                        {{ str($item->content)->limit(20) ?? 'N/A' }}</td>
                                    <td>{{ $item->created_at->since() }}</td>
                                    <td>
                                        @can(\App\Enums\PermissionEnum::CRM_ACTIVIY_NOTE->value)
                                            <button type="button" class="btn btn-outline-danger btn-wave  btn"
                                                data-bs-toggle="modal" data-bs-target="#DeleteNoteModal"
                                                x-on:click="idNote = {{ $item->id }}; contentNote = '{{ $item->content }}';">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <p class="text-center">No Note found for this lead</p>
                                    </td>
                                </tr>
                            @endforelse
                        </x-slot:tbody>
                    </x-table>
                </div>
            </div>
        </div>
        <div class="col-12 mt-4">
            <div class="card p-2 custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Activities
                    </div>
                    @can(\App\Enums\PermissionEnum::CRM_ACTIVIY_OPERATION->value)
                        <div class="d-flex gap-2 align-items-center">
                            <button type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                class="btn btn-primary">
                                <i class="ti ti-plus "></i>
                                <span>
                                    Add New Activity
                                </span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:void(0);" wire:navigate>Task</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('leads.activities.meetings.create', $lead->id) }}"
                                        wire:navigate>Meeting</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('leads.activities.calls.create', $lead->id) }}"
                                        wire:navigate>Call</a></li>
                            </ul>
                        </div>
                    @endcan

                </div>
                <div class="card-body">
                    <ul class="nav nav-pills mb-3 nav-justified tab-style-5 d-sm-flex d-block" id="tab"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="calls-tab" data-bs-toggle="pill"
                                data-bs-target="#calls" type="button" role="tab" aria-controls="calls"
                                aria-selected="true">Calls</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="meetings-tab" data-bs-toggle="pill"
                                data-bs-target="#meetings" type="button" role="tab" aria-controls="meetings"
                                aria-selected="false">Meetings</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tasks-tab" data-bs-toggle="pill" data-bs-target="#tasks"
                                type="button" role="tab" aria-controls="tasks"
                                aria-selected="false">Tasks</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="tabContent">
                        <div class="tab-pane show active" id="calls" role="tabpanel" aria-labelledby="calls-tab"
                            tabindex="0">
                            <x-table>
                                <x-slot:thead>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Assigned</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Notes</th>
                                    <th scope="col">Call Date</th>
                                    <th scope="col">Action</th>
                                </x-slot:thead>

                                <x-slot:tbody>
                                    @forelse ($activities->where('type', App\Enums\ActivityTypeEnum::Calls->value) as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->title ?? 'N/A' }}</td>
                                            <td>{{ $item->assigned->name ?? 'N/A' }}</td>
                                            <td>{{ $item->title ?? 'N/A' }}</td>
                                            <td title="{{ $item->notes }}">
                                                {{ str($item->notes)->limit(20) ?? 'N/A' }}</td>
                                            <td>{{ $item->activityable->call_date ?? 'N/A' }}</td>
                                            <td>
                                                @can(\App\Enums\PermissionEnum::CRM_ACTIVIY_SHOW->value)
                                                    <a class="btn "
                                                        href="{{ route('leads.activities.calls.show', ['lead' => $lead->id, 'activity' => $item->id]) }}"
                                                        wire:navigate>
                                                        <i class="ti ti-eye fs-4 text-primary"></i>
                                                    </a>
                                                @endcan
                                                @can(\App\Enums\PermissionEnum::CRM_ACTIVIY_OPERATION->value)
                                                    <a class="btn "
                                                        href="{{ route('leads.activities.calls.edit', ['lead' => $lead->id, 'activity' => $item->id]) }}"
                                                        wire:navigate>
                                                        <i class="ti ti-pencil fs-4 text-primary"></i>
                                                    </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">
                                                <p class="text-center">No call found for this lead</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </x-slot:tbody>
                            </x-table>
                        </div>
                        <div class="tab-pane text-muted" id="meetings" role="tabpanel"
                            aria-labelledby="meetings-tab" tabindex="0">
                            <x-table>
                                <x-slot:thead>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Assigned</th>
                                    <th scope="col">Notes</th>
                                    <th scope="col">Start</th>
                                    <th scope="col">End</th>
                                    <th scope="col">Type Meeting</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Since</th>
                                    <th scope="col">Action</th>
                                </x-slot:thead>

                                <x-slot:tbody>
                                    @forelse ($activities->where('type', App\Enums\ActivityTypeEnum::Meetings->value) as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->title ?? 'N/A' }}</td>
                                            <td>{{ $item->assigned->name ?? 'N/A' }}</td>
                                            <td title="{{ $item->notes }}">
                                                {{ str($item->notes)->limit(20) ?? 'N/A' }}</td>
                                            <td>{{ $item->activityable->start ?? 'N/A' }}</td>
                                            <td>{{ $item->activityable->end ?? 'N/A' }}</td>
                                            <td>{{ $item->activityable->online ?? 'N/A' }}</td>
                                            <td>{{ $item->activityable->location ?? 'N/A' }}</td>
                                            <td>
                                                <a href="{{ $item->activityable->link ?? '#' }}" target="_blank"
                                                    class="text-primary" rel="noopener noreferrer">
                                                    {{ str($item->activityable->link)->limit(30) ?? 'N/A' }}
                                                </a>
                                            </td>
                                            <td>{{ $item->created_at->since() }}</td>
                                            <td>
                                                @can(\App\Enums\PermissionEnum::CRM_ACTIVIY_SHOW->value)
                                                    <a class="btn "
                                                        href="{{ route('leads.activities.meetings.show', ['lead' => $lead->id, 'activity' => $item->id]) }}"
                                                        wire:navigate>
                                                        <i class="ti ti-eye fs-4 text-primary"></i>
                                                    </a>
                                                @endcan
                                                @can(\App\Enums\PermissionEnum::CRM_ACTIVIY_OPERATION->value)
                                                    <a class="btn "
                                                        href="{{ route('leads.activities.meetings.edit', ['lead' => $lead->id, 'activity' => $item->id]) }}"
                                                        wire:navigate>
                                                        <i class="ti ti-pencil fs-4 text-primary"></i>
                                                    </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11">
                                                <p class="text-center">No Meeting found for this lead</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </x-slot:tbody>
                            </x-table>
                        </div>
                        <div class="tab-pane text-muted" id="tasks" role="tabpanel" aria-labelledby="tasks-tab"
                            tabindex="0">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($sourcePage == 'customer')
            <div class="col-12 mt-4">
                <div class="card p-2 custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Billing Address
                        </div>
                    </div>
                    <div class="card-body">
                        <x-table>
                            <x-slot:thead>
                                <th scope="col">S.No</th>
                                <th scope="col">Street</th>
                                <th scope="col">City</th>
                                <th scope="col">Country</th>
                                <th scope="col">zip_code</th>
                            </x-slot:thead>

                            <x-slot:tbody>
                                @forelse ($lead->billings as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->street ?? 'N/A' }}</td>
                                        <td>{{ $item->city ?? 'N/A' }}</td>
                                        <td>{{ strLimitWithCheckOrDefault($item->country, $item->country?->name) ?? 'N/A' }}
                                        </td>
                                        <td>{{ $item->zip_code ?? 'N/A' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <p class="text-center">No Billing Address found for this lead</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </x-slot:tbody>
                        </x-table>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @if ($sourcePage == 'lead')
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
    @endif


    @can(\App\Enums\PermissionEnum::CRM_ACTIVIY_NOTE->value)
        <!-- Start::add-note -->
        <x-modal id="AddNoteModal">
            <x-slot:title>
                <i class="ti ti-plus me-1"></i>
                <span>
                    Add new Note For This Lead?
                </span>
            </x-slot:title>
            <x-slot:content>
                <div>
                    <x-textarea-form id="content" name="Content" :withoutLabel="true" wireModel="noteForm.content"
                        placeholder="Please Write your Notes" />
                </div>
            </x-slot:content>
            <x-slot:footer>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" wire:click="saveNote">Save</button>
            </x-slot:footer>
        </x-modal>
        <!-- End::add-note -->
        <!-- Start::add-note -->
        <x-modal id="DeleteNoteModal">
            <x-slot:title>
                <i class="ti ti-trash text-danger me-1"></i>
                <span>
                    Are you sure you want to delete this Note?!
                </span>
            </x-slot:title>
            <x-slot:content>
                <div>
                    <textarea class="form-control disabled" rows="3" x-text="contentNote" disabled='true'></textarea>
                </div>
            </x-slot:content>
            <x-slot:footer>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" wire:click="deleteNote(idNote)">Delete</button>
            </x-slot:footer>
        </x-modal>
        <!-- End::add-note -->
    @endcan
</div>
