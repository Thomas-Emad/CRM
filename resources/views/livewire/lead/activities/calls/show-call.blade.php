<div>
    <x-activity-layout title="Show Call ({{ $activity->title }})" :activity="$activity" :notes="$notes">
        <x-slot:header>
            <li class="breadcrumb-item"><a href="{{ route('leads.show', ['lead' => $activity->lead->id]) }}"
                    wire:navigate>{{ $activity->lead->name }}</a></li>
        </x-slot:header>
        <x-slot:tabsHeader>
            <li class="nav-item" role="presentation">
                <button class="nav-link border active" id="call-tab-tab" data-bs-toggle="pill"
                    data-bs-target="#call-tab-pane" type="button" role="tab" aria-controls="call-tab-pane"
                    aria-selected="true" tabindex="-1">Call</button>
            </li>
        </x-slot:tabsHeader>
        <x-slot:tabsContent>
            <div class="tab-pane fade p-0 border-0 show active" id="call-tab-pane" role="tabpanel"
                aria-labelledby="posts-tab-pane" tabindex="0">
                <div class="d-flex justify-content-between">
                    <h6 class="fw-semibold">Details</h6>
                    <div>
                        <a class="btn btn-outline-warning btn-wave btn"
                            href="{{ route('leads.activities.calls.edit', ['lead' => $activity->lead_id, 'call' => $activity->id]) }}"
                            wire:navigate>
                            <i class="ti ti-pencil"></i>
                        </a>
                        <button type="button" class="btn btn-outline-danger btn-wave  btn" data-bs-toggle="modal"
                            data-bs-target="#DeleteActivityModal"
                            x-on:click="id = {{ $activity->id }}; title = '{{ $activity->title }}';">
                            <i class="ti ti-trash"></i>
                        </button>
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
                                        Call Type
                                    </div>
                                </td>
                                <td class="text-muted">
                                    :
                                </td>
                                <td class="text-muted">{{ $activity->activityable->type }}
                                </td>
                            </tr>
                            <tr class="product-list">
                                <td class="text-muted">
                                    <div class="fw-semibold">
                                        Date
                                    </div>
                                </td>
                                <td class="text-muted">
                                    :
                                </td>
                                <td class="text-muted">
                                    {{ $activity->activityable->call_date }}
                                </td>
                            </tr>
                            <tr class="product-list">
                                <td class="text-muted">
                                    <div class="fw-semibold">
                                        Duration Call
                                    </div>
                                </td>
                                <td class="text-muted">
                                    :
                                </td>
                                <td class="text-muted">
                                    {{ $activity->activityable->duration_call }}
                                </td>
                            </tr>
                            <tr class="product-list">
                                <td class="text-muted">
                                    <div class="fw-semibold">
                                        Call Reason
                                    </div>
                                </td>
                                <td class="text-muted">
                                    :
                                </td>
                                <td class="text-muted">
                                    {{ $activity->activityable->callReason->name ?? 'N/A' }}
                                </td>
                            </tr>
                            <tr class="product-list">
                                <td class="text-muted">
                                    <div class="fw-semibold">
                                        Call Response
                                    </div>
                                </td>
                                <td class="text-muted">
                                    :
                                </td>
                                <td class="text-muted">
                                    {{ $activity->activityable->callResponse->name ?? 'N/A' }}
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
                        Recent Calls
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
                            @foreach ($calls as $item)
                                <li class="crm-recent-activity-content">
                                    <div class="d-flex align-items-top">
                                        <div class="me-3">
                                            <span class="text-primary avatar-rounded">
                                                <i class="bi bi-circle-fill fs-10 op-5"></i>
                                            </span>
                                        </div>
                                        <div class="crm-timeline-content">
                                            <div>
                                                <span class="fw-semibold">New Call &amp;</span><span><a
                                                        href="{{ route('leads.activities.calls.edit', ['lead' => $item->lead->id, 'call' => $item->id]) }}"
                                                        class="text-primary fw-semibold">
                                                        {{ $item->title }}.</a></span>
                                            </div>
                                            <p>
                                                {{ $item->activityable->call_date }}
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
    </x-activity-layout>
</div>
