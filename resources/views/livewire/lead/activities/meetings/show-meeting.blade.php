<div>
    <x-activity-layout title="Show Meeting ({{ $activity->title }})" :activity="$activity" :notes="$notes">
        <x-slot:header>
            <li class="breadcrumb-item"><a href="{{ route('leads.show', ['lead' => $activity->lead->id]) }}"
                    wire:navigate>{{ $activity->lead->name }}</a></li>
        </x-slot:header>
        <x-slot:tabsHeader>
            <li class="nav-item" role="presentation">
                <button class="nav-link border active" id="meeting-tab-tab" data-bs-toggle="pill"
                    data-bs-target="#meeting-tab-pane" type="button" role="tab" aria-controls="meeting-tab-pane"
                    aria-selected="true" tabindex="-1">Meeting</button>
            </li>
        </x-slot:tabsHeader>
        <x-slot:tabsContent>
            <div class="tab-pane fade p-0 border-0 show active" id="meeting-tab-pane" role="tabpanel"
                aria-labelledby="posts-tab-pane" tabindex="0">
                <div class="d-flex justify-content-between">
                    <h6 class="fw-semibold">Details</h6>
                    <div>
                        @can(\App\Enums\PermissionEnum::CRM_ACTIVIY_OPERATION->value)
                            <a class="btn btn-outline-warning btn-wave btn"
                                href="{{ route('leads.activities.meetings.edit', ['lead' => $activity->lead_id, 'activity' => $activity->id]) }}"
                                wire:navigate>
                                <i class="ti ti-pencil"></i>
                            </a>
                        @endcan

                        @can(\App\Enums\PermissionEnum::CRM_ACTIVIY_DELETE->value)
                            <button type="button" class="btn btn-outline-danger btn-wave  btn" data-bs-toggle="modal"
                                data-bs-target="#DeleteActivityModal"
                                x-on:click="id = {{ $activity->id }}; title = '{{ $activity->title }}';">
                                <i class="ti ti-trash"></i>
                            </button>
                        @endcan
                    </div>
                </div>
                <div class="table-responsive mb-3 text-muted">
                    <table class="table text-nowrap table-borderless">
                        <tbody>
                            <tr class="product-list">
                                <td class="text-muted">
                                    <div class="fw-semibold">
                                        Title
                                    </div>
                                </td>
                                <td class="text-muted">
                                    :
                                </td>
                                <td class="text-muted">{{ $activity->title }}</td>
                            </tr>
                            <tr class="product-list">
                                <td class="text-muted">
                                    <div class="fw-semibold">
                                        Assigned User
                                    </div>
                                </td>
                                <td class="text-muted">
                                    :
                                </td>
                                <td class="text-muted">{{ $activity->assigned->name }}
                                </td>
                            </tr>
                            <tr class="product-list">
                                <td class="text-muted">
                                    <div class="fw-semibold">
                                        Creator
                                    </div>
                                </td>
                                <td class="text-muted">
                                    :
                                </td>
                                <td class="text-muted">{{ $activity->creator->name }}</td>
                            </tr>
                            <tr class="product-list">
                                <td class="text-muted">
                                    <div class="fw-semibold">
                                        Reminder
                                    </div>
                                </td>
                                <td class="text-muted">
                                    :
                                </td>
                                <td class="text-muted">{{ $activity->reminder ?? 'N/A' }}
                                </td>
                            </tr>
                            <tr class="product-list">
                                <td class="text-muted">
                                    <div class="fw-semibold">
                                        Meeting Type
                                    </div>
                                </td>
                                <td class="text-muted">
                                    :
                                </td>
                                <td class="text-muted">{{ $activity->activityable->online ? 'Online' : 'Offline' }}
                                </td>
                            </tr>
                            <tr class="product-list">
                                <td class="text-muted">
                                    <div class="fw-semibold">
                                        Start Date
                                    </div>
                                </td>
                                <td class="text-muted">
                                    :
                                </td>
                                <td class="text-muted">
                                    {{ $activity->activityable->start }}
                                </td>
                            </tr>
                            <tr class="product-list">
                                <td class="text-muted">
                                    <div class="fw-semibold">
                                        End Date
                                    </div>
                                </td>
                                <td class="text-muted">
                                    :
                                </td>
                                <td class="text-muted">
                                    {{ $activity->activityable->end }}
                                </td>
                            </tr>
                            <tr class="product-list">
                                <td class="text-muted">
                                    <div class="fw-semibold">
                                        Link
                                    </div>
                                </td>
                                <td class="text-muted">
                                    :
                                </td>
                                <td class="text-muted">
                                    <a href="{{ $activity->activityable->link ?? '#' }}" target="_blank"
                                        class="text-primary" rel="noopener noreferrer">
                                        {{ str($activity->activityable->link)->limit(30) ?? 'N/A' }}
                                    </a>
                                </td>
                            </tr>
                            <tr class="product-list">
                                <td class="text-muted">
                                    <div class="fw-semibold">
                                        Location
                                    </div>
                                </td>
                                <td class="text-muted">
                                    :
                                </td>
                                <td class="text-muted">
                                    {{ $activity->activityable->location ?? 'N/A' }}
                                </td>
                            </tr>
                            <tr class="product-list">
                                <td class="text-muted">
                                    <div class="fw-semibold">
                                        notes
                                    </div>
                                </td>
                                <td class="text-muted">
                                    :
                                </td>
                                <td class="text-muted">{{ $activity->notes }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </x-slot:tabsContent>
        <x-slot:sidebar>
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Recent Meetings
                    </div>
                    <div class="">
                        <a href="javascript:void(0);" class="btn btn-outline-light btn-sm">
                            View All
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <ul class="list-unstyled mb-0 crm-recent-activity">
                            @foreach ($meetings as $item)
                                <li class="crm-recent-activity-content">
                                    <div class="d-flex align-items-top">
                                        <div class="me-3">
                                            <span class="text-primary avatar-rounded">
                                                <i class="bi bi-circle-fill fs-10 op-5"></i>
                                            </span>
                                        </div>
                                        <div class="crm-timeline-content">
                                            <div>
                                                <span class="fw-semibold">New Meeting &amp;</span><span><a
                                                        href="{{ route('leads.activities.meetings.edit', ['lead' => $item->lead->id, 'activity' => $item->id]) }}"
                                                        class="text-primary fw-semibold">
                                                        {{ $item->title }}.</a></span>
                                            </div>
                                            <p>
                                                {{ $item->activityable->start }}
                                            </p>
                                        </div>
                                        <div class="flex-fill text-end">
                                            <span
                                                class="d-block text-muted fs-11 op-7">{{ $item->created_at->since() }}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </x-slot:sidebar>

        @can(\App\Enums\PermissionEnum::CRM_ACTIVIY_DELETE->value)
            <x-slot:modals>
                <!-- Start::DeleteNoteModal -->
                <x-modal id="DeleteNoteModal">
                    <x-slot:title>
                        <i class="ti ti-trash text-danger me-1"></i>
                        <span>
                            Are you sure you want to delete this Note?!
                        </span>
                    </x-slot:title>
                    <x-slot:content>
                        <p>Are you sure you want to delete this note</p>
                    </x-slot:content>
                    <x-slot:footer>
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" wire:click="deleteNote(noteId)">Delete</button>
                    </x-slot:footer>
                </x-modal>
                <!-- End::DeleteNoteModal -->
            </x-slot:modals>
        @endcan
    </x-activity-layout>
</div>
