<div x-data="{ id: null, title: null, idNote: null, contentNote: null }">
    <x-page-header title="Show Lead">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
        <li class="breadcrumb-item"><a href="{{ route('leads.index') }}" wire:navigate>Lead</a></li>
    </x-page-header>

    <div class="border p-2 row">
        <div class="col-12 col-md-7 p-2">
            <div class="p-2 shadow-sm border">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="fs-4">Details About Lead</h2>
                    <button type="button" class="btn bg-primary-transparent" data-bs-toggle="modal"
                        data-bs-target="#ConvertToCustomer">
                        <i class="ti ti-exchange  text-text-primary-emphasis"></i>
                    </button>
                </div>
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
        <div class="col-12 col-md-5 p-2">
            <div class="p-2 shadow-sm border">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="fs-5">Notes</h3>
                    @can(\App\Enums\PermissionEnum::CRM_ACTIVIY_NOTE->value)
                        <button type="button" class="btn bg-primary-transparent" data-bs-toggle="modal"
                            data-bs-target="#AddNoteModal">
                            <i class="ti ti-plus  text-text-primary-emphasis"></i>
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
        <div class="col-12 p-2">
            <div class="card custom-card">
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
                                                        href="{{ route('leads.activities.calls.edit', ['lead' => $lead->id, 'call' => $item->id]) }}"
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
                                                        href="{{ route('leads.activities.meetings.edit', ['lead' => $lead->id, 'meeting' => $item->id]) }}"
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
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" wire:click="deleteInteractive(id)">Delete</button>
        </x-slot:footer>
    </x-modal>
    <!-- End::delete-lead -->
</div>
