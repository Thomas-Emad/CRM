<div x-data="{ id: null, title: null }">
    <x-page-header title="Leads">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
    </x-page-header>

    <div class="border p-2">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
            <div class="d-flex flex-wrap gap-2">
                @foreach ($statuses as $status)
                    <div class="bg-white shadow-sm border rounded ps-3 pe-3 pt-2 pb-2 fs-6"
                        style="color: {{ $status->color }} !important;">
                        {{ $status->leads_count . ' ' . $status->name }}
                    </div>
                @endforeach

            </div>
            <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
                <div>
                    <input type="text" class="form-control " wire:model.live="search" placeholder="Saerch...">
                </div>
                @can(App\Enums\PermissionEnum::CRM_LEAD_OPERATION->value)
                    <a class="btn btn-primary btn-wave d-inline-flex align-items-center gap-2 ms-auto text-nowrap"
                        wire:navigate href="{{ route('leads.create') }}">
                        <i class="ti ti-plus fs-5"></i>
                        <span>New Lead</span>
                    </a>
                @endcan
            </div>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Company</th>
                        <th scope="col">Parent Account</th>
                        <th scope="col">Contact Name</th>
                        <th scope="col">Contact Phone</th>
                        <th scope="col">Decision Makers</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Section</th>
                        <th scope="col">Assigned</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date Acquired</th>
                        <th scope="col">Lead Value</th>
                        <th scope="col">Last Activity</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($leads as $lead)
                        <tr>
                            <td>{{ $lead->id }}</td>
                            <td>
                                <span title="{{ $lead->name }}">{{ str($lead->name)->limit(10) ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span title="{{ $lead->company }}">{{ str($lead->company)->limit(10) ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span
                                    title="{{ $lead->parent_account }}">{{ str($lead->parent_account)->limit(10) ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span
                                    title="{{ $lead->person_name }}">{{ str($lead->person_name)->limit(10) ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span
                                    title="{{ $lead->person_phone }}">{{ str($lead->person_phone)->limit(10) ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span
                                    title="{{ $lead->decision_makers }}">{{ str($lead->decision_makers)->limit(10) ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span>{{ str($lead->priority->label())->limit(10) ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span>{{ $lead->section ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span>{{ isset($lead->assigned) ? str($lead->assigned?->name)->limit(10) : 'N/A' }}</span>
                            </td>
                            <td>
                                <span class="badge bg-success text-white"
                                    style="background-color: {{ $lead->status?->color }} !important;">
                                    {{ $lead->status?->name }}
                                </span>
                            </td>
                            <td>
                                <span>{{ $lead->date_acquired?->format('Y-m-d') ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span>{{ $lead->lead_value ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span>{{ $lead->activities()->latest()->first()?->created_at?->format('Y-m-d') ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span>{{ $lead->created_at->format('Y-m-d') ?? 'N/A' }}</span>
                            </td>

                            <td>
                                <div>
                                    @can(App\Enums\PermissionEnum::CRM_LEAD_OPERATION->value)
                                        <a class="btn " href="{{ route('leads.show', ['lead' => $lead->id]) }}"
                                            wire:navigate>
                                            <i class="ti ti-eye fs-4 text-primary"></i>
                                        </a>
                                        <a class="btn " href="{{ route('leads.edit', ['lead' => $lead->id]) }}"
                                            wire:navigate>
                                            <i class="ti ti-pencil fs-4 text-primary"></i>
                                        </a>
                                    @endcan
                                    @can(App\Enums\PermissionEnum::CRM_LEAD_DELETE->value)
                                        <button type="button" class="btn " data-bs-toggle="modal"
                                            data-bs-target="#DeleteLeadModal"
                                            x-on:click="id = {{ $lead->id }}; title = '{{ $lead->name }}'">
                                            <i class="ti ti-trash fs-4 text-danger"></i>
                                        </button>
                                    @endcan

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="text-center">No lead Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-end mt-3">
                {{ $leads->links() }}
            </div>
        </div>
    </div>

    @can(App\Enums\PermissionEnum::CRM_LEAD_DELETE->value)
        <!-- Start::delete-lead -->
        <x-modal id="DeleteLeadModal">
            <x-slot:title>
                <i class="ti ti-trash text-danger me-1"></i>
                <span>
                    Are you sure you want to delete this lead?!
                </span>
            </x-slot:title>
            <x-slot:content>
                <div>
                    <label for="lead-name" class="form-label">Name lead</label>
                    <input type="text" id="lead-title" class="form-control disabled" x-model="title" disabled
                        placeholder="Enter lead Name">
                </div>

            </x-slot:content>
            <x-slot:footer>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" wire:click="delete(id)">Delete</button>
            </x-slot:footer>
        </x-modal>
        <!-- End::delete-lead -->
    @endcan
</div>
