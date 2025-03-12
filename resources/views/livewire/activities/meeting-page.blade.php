<div x-data="{ id: null, title: null }">

    <x-page-header title="Meetings">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
    </x-page-header>


    <div class="border p-2">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
            <div>
                <x-input-form id="search" type="text" name="Search By Title" wireModel="search"
                    placeholder="your can filter Meetings By title.." :live="true" />
            </div>
            <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
                <div>
                    <button type="button" class="btn btn-outline-primary {{ $filter == 'all' ? 'active' : '' }}"
                        wire:click="changeFilter('all')">All</button>
                    <button type="button" class="btn btn-outline-success {{ $filter == 'coming' ? 'active' : '' }}"
                        wire:click="changeFilter('coming')">Upcoming Meetings</button>
                    <button type="button" class="btn btn-outline-danger {{ $filter == 'past' ? 'active' : '' }}"
                        wire:click="changeFilter('past')">Past Meetings</button>
                </div>
                <button class="btn btn-primary btn-wave d-inline-flex align-items-center gap-2 ms-auto text-nowrap"
                    data-bs-toggle="modal" data-bs-target="#addMeeting">
                    <i class="ti ti-plus fs-5"></i>
                    <span>New Meeting</span>
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
                        <th scope="col">Start</th>
                        <th scope="col">End</th>
                        <th scope="col">Type Meeting</th>
                        <th scope="col">Link</th>
                        <th scope="col">Location</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($meetings as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                <a href="{{ route('leads.activities.meetings.show', ['lead' => $item->lead_id, 'activity' => $item->id]) }}"
                                    class="text-primary" target="_blank" rel="noopener noreferrer"
                                    title="{{ $item->title }}">
                                    {{ str($item->title)->limit(10) }}
                                </a>
                            </td>
                            <td>
                                <span data-bs-toggle="popover" data-bs-placement="top" style="cursor: pointer;"
                                    data-bs-custom-class="popover-primary" data-bs-content="{{ $item->notes }}">
                                    {{ isset($item->notes) ? str($item->notes)->limit(10) : 'N/A' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('leads.show', ['lead' => $item->lead_id]) }}" class="text-primary"
                                    target="_blank" rel="noopener noreferrer" title="{{ $item->lead->name }}">
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
                                <span>{{ $item->activityable->start ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span>{{ $item->activityable->end ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span>{{ $item->activityable->online ? 'Online' : 'Offline' }}</span>
                            </td>
                            <td>
                                <a href="{{ $item->activityable->link }}" target="_blank" class="text-primary"
                                    rel="noopener noreferrer">
                                    {{ str($item->activityable->link)->limit(30) ?? 'N/A' }}
                                </a>
                            </td>
                            <td>
                                <span data-bs-toggle="popover" data-bs-placement="top" style="cursor: pointer;"
                                    data-bs-custom-class="popover-primary"
                                    data-bs-content="{{ $item->activityable->location }}">
                                    {{ isset($item->location) ? str($item->location)->limit(10) : 'N/A' }}
                                </span>
                            </td>

                            <td>
                                <a class="btn" wire:navigate
                                    href="{{ route('leads.activities.meetings.show', ['lead' => $item->lead_id, 'activity' => $item->id]) }}">
                                    <i class="ti ti-eye fs-4 text-primary"></i>
                                </a>
                                <a class="btn" wire:navigate
                                    href="{{ route('leads.activities.meetings.edit', ['lead' => $item->lead_id, 'activity' => $item->id]) }}">
                                    <i class="ti ti-pencil fs-4 text-primary"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="text-center">No Meeting Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-end mt-3">
                {{ $meetings->links() }}
            </div>
        </div>
    </div>

    <!-- Start::add-Meeting -->
    <x-modal id="addMeeting" size="lg">
        <x-slot:title>
            <i class="ti ti-plus text-success me-1"></i>
            <span>
                Do you Want add new Meeting?
            </span>
        </x-slot:title>
        <x-slot:content>
            <div class="row">
                <div class=" col-12 col-md-6 p-2">
                    <x-select-form id="status" name="Lead" :items="$leads" wireModel="meetingForm.lead_id"
                        placeholder="Please Select Lead" />
                </div>

                <div class=" col-12 col-md-6 p-2">
                    <x-select-form id="status" name="Assigne" :items="$users" wireModel="meetingForm.assigned_id"
                        placeholder="Please Assigne Meeting With User" />
                </div>
                <div class=" col-12 col-md-6 p-2">
                    <x-input-form type="text" id="title" name="Title" wireModel="meetingForm.title"
                        placeholder="Please Write Title" />
                </div>
                <div class=" col-12 col-md-6 p-2">
                    <x-select-form id="status" name="Meeting Type" :items="$typeMeeting" wireModel="meetingForm.online"
                        placeholder="Please Select Status" />
                </div>

                <div class=" col-12 col-md-6 p-2">
                    <x-input-form type="datetime-local" id="start" name="Start" wireModel="meetingForm.start"
                        placeholder="Please Write Start Time" />
                </div>
                <div class=" col-12 col-md-6 p-2">
                    <x-input-form type="datetime-local" id="end" name="End" wireModel="meetingForm.end"
                        placeholder="Please Write End Time" />
                </div>

                <div class=" col-12 col-md-6 p-2" x-show="$wire.meetingForm.online == 0">
                    <x-input-form type="text" id="location" name="location" wireModel="meetingForm.location"
                        placeholder="Please Write location" />
                </div>
                <div class=" col-12 col-md-6 p-2" x-show="$wire.meetingForm.online == 1">
                    <x-input-form type="text" id="link" name="link" wireModel="meetingForm.link"
                        placeholder="Please Write Link" />
                </div>
                <div class=" col-12 col-md-6 p-2">
                    <x-input-form type="number" id="link" name="Reminder" wireModel="meetingForm.reminder"
                        placeholder="Please Write reminder Before Meeting By Miniutes" />
                </div>

                <div class="col-12 p-2">
                    <x-textarea-form id="notes" name="Notes" wireModel="meetingForm.notes"
                        placeholder="Please Write notes" />
                </div>

            </div>

        </x-slot:content>
        <x-slot:footer>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" wire:click="save">Save</button>
        </x-slot:footer>
    </x-modal>
    <!-- End::add-Meeting -->

</div>
