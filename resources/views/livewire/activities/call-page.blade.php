<div x-data="{ id: null, title: null }">
    <x-page-header title="Calls">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
    </x-page-header>



    <div class="border p-2">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
            <div>
                <x-input-form id="search" type="text" name="Search By Title" wireModel="search"
                    placeholder="your can filter Calls By title.." :live="true" />
            </div>
            <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
                <div>

                    <button type="button" class="btn btn-outline-primary {{ $filter == 'all' ? 'active' : '' }}"
                        wire:click="changeFilter('all')">All</button>
                    <button type="button" class="btn btn-outline-success {{ $filter == 'coming' ? 'active' : '' }}"
                        wire:click="changeFilter('coming')">Coming</button>
                    <button type="button" class="btn btn-outline-danger {{ $filter == 'missing' ? 'active' : '' }}"
                        wire:click="changeFilter('missing')">Missing</button>
                </div>
                <button class="btn btn-primary btn-wave d-inline-flex align-items-center gap-2 ms-auto text-nowrap"
                    data-bs-toggle="modal" data-bs-target="#addCall">
                    <i class="ti ti-plus fs-5"></i>
                    <span>New Call</span>
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Note</th>
                        <th scope="col">Lead</th>
                        <th scope="col">Assigned</th>
                        <th scope="col">Creator</th>
                        <th scope="col">Call Date</th>
                        <th scope="col">Type</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($calls as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                <span title="{{ $item->title }}">{{ str($item->title)->limit(10) }}</span>
                            </td>
                            <td>
                                <span data-bs-toggle="popover" data-bs-placement="top" style="cursor: pointer;"
                                    data-bs-custom-class="popover-primary" data-bs-content="{{ $item->notes }}">
                                    {{ isset($item->notes) ? str($item->notes)->limit(10) : 'N/A' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('leads.activities.calls.show', ['lead' => $item->lead_id, 'activity' => $item->id]) }}"
                                    class="text-primary" target="_blank" rel="noopener noreferrer">
                                    {{ str($item->lead->name)->limit(10) }}
                                </a>
                            </td>
                            <td>
                                <span>{{ $item->assigned->name }}</span>
                            </td>
                            <td>
                                <span>{{ $item->creator->name }}</span>
                            </td>
                            <td>
                                <span>{{ $item->activityable->call_date ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span>{{ $item->activityable->type ?? 'N/A' }}</span>
                            </td>

                            <td>
                                <a class="btn" wire:navigate
                                    href="{{ route('leads.activities.calls.show', ['lead' => $item->lead_id, 'activity' => $item->id]) }}">
                                    <i class="ti ti-eye fs-4 text-primary"></i>
                                </a>
                                <a class="btn" wire:navigate
                                    href="{{ route('leads.activities.calls.edit', ['lead' => $item->lead_id, 'activity' => $item->id]) }}">
                                    <i class="ti ti-pencil fs-4 text-primary"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No Call Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-end mt-3">
                {{ $calls->links() }}
            </div>
        </div>
    </div>

    <!-- Start::add-call -->
    <x-modal id="addCall" size="lg">
        <x-slot:title>
            <i class="ti ti-plus text-success me-1"></i>
            <span>
                Do you Want add new Call?
            </span>
        </x-slot:title>
        <x-slot:content>
            <div class="row">
                <div class=" col-12 col-md-6 p-2">
                    <x-select-form id="status" name="Lead" :items="$leads" wireModel="callForm.lead_id"
                        placeholder="Please Select Lead" />
                </div>
                <div class=" col-12 col-md-6 p-2">
                    <x-select-form id="status" name="Assigne" :items="$users" wireModel="callForm.assigned_id"
                        placeholder="Please Assigne Call With User" />
                </div>
                <div class=" col-12 col-md-6 p-2">
                    <x-select-form id="status" name="Calling Type" :items="$typeCalling" wireModel="callForm.typeCall"
                        placeholder="Please Select Status" />
                </div>
                <div class=" col-12 col-md-6 p-2">
                    <x-input-form type="datetime-local" id="date_calling" name="Calling Time"
                        wireModel="callForm.date_calling" placeholder="Please Write Call Value" />
                </div>
                <div class=" col-12 col-md-6 p-2">
                    <x-input-form type="text" id="title" name="Title" wireModel="callForm.title"
                        placeholder="Please Write Title" />
                </div>

                <div class=" col-12 col-md-6 p-2" x-show="$wire.callForm.typeCall == 'incoming'">
                    <x-input-form type="number" id="reminder" name="reminder" wireModel="callForm.reminder"
                        placeholder="Please Write Reminder time Before Start" />
                </div>
                <div class=" col-12 col-md-6 p-2">
                    <x-select-form id="status" name="Calling Reason" :items="$callReason" wireModel="callForm.reason_id"
                        placeholder="Please Calling Reason" />
                </div>
                <div x-show="$wire.callForm.typeCall == 'outgoing'" class="row">
                    <div class=" col-12 col-md-6 p-2">
                        <x-input-form type="number" id="duration" name="duration" wireModel="callForm.duration"
                            placeholder="Please Write Duration Call" />
                    </div>

                    <div class=" col-12 col-md-6 p-2">
                        <x-select-form id="status" name="Calling Response" :items="$callResponse"
                            wireModel="callForm.response_id" placeholder="Please Select Calling Response" />
                    </div>
                </div>

                <div class="col-12 p-2">
                    <x-textarea-form id="notes" name="Notes" wireModel="notes"
                        placeholder="Please Write notes" />
                </div>

            </div>

        </x-slot:content>
        <x-slot:footer>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" wire:click="save">Save</button>
        </x-slot:footer>
    </x-modal>
    <!-- End::add-call -->

</div>
