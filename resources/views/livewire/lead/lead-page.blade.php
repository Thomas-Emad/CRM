<div x-data="{ id: null, title: null }">
    <x-page-header title="Leads">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">CRM</a></li>
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
                <a class="btn btn-primary btn-wave d-inline-flex align-items-center gap-2 ms-auto text-nowrap"
                    href="{{ route('leads.create') }}">
                    <i class="ti ti-plus fs-5"></i>
                    <span>New Lead</span>
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Company</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Value</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Assigned</th>
                        <th scope="col">Source</th>
                        <th scope="col">Last Contact</th>
                        <th scope="col">Created</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($leads as $lead)
                        <tr>
                            <td>{{ $lead->id }}</td>
                            <td>
                                <span>{{ str($lead->name)->limit(10) ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span>{{ str($lead?->company)->limit(10) ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span>{{ str($lead?->phone)->limit(10) ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span>{{ str($lead?->email)->limit(10) ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span>${{ $lead?->lead_value ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span>{{ isset($lead->tags) ? str($lead?->tags)->limit(10) : 'N/A' }}</span>
                            </td>
                            <td>
                                <span>{{ isset($lead->assigned) ? str($lead->assigned?->name)->limit(10) : 'N/A' }}</span>
                            </td>
                            <td>
                                <span>{{ isset($lead->source) ? str($lead->source?->name)->limit(10) : 'N/A' }}</span>
                            </td>
                            <td>
                                <span>{{ $lead->interactives()->latest()->first()?->created_at?->format('Y-m-d') ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span>{{ $lead->created_at?->format('Y-m-d') ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span class="badge bg-success text-white"
                                    style="background-color: {{ $lead->status?->color }} !important;">
                                    {{ $lead->status?->name }}
                                </span>
                            </td>
                            <td>
                                <div>
                                    <a class="btn " href="{{ route('leads.show', ['lead' => $lead->id]) }}">
                                        <i class="ti ti-eye fs-4 text-primary"></i>
                                    </a>
                                    <a class="btn " href="{{ route('leads.edit', ['lead' => $lead->id]) }}">
                                        <i class="ti ti-pencil fs-4 text-primary"></i>
                                    </a>
                                    <button type="button" class="btn " data-bs-toggle="modal"
                                        data-bs-target="#DeleteLeadModal"
                                        x-on:click="id = {{ $lead->id }}; title = '{{ $lead->name }}'">
                                        <i class="ti ti-trash fs-4 text-danger"></i>
                                    </button>
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
        </div>
    </div>

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
</div>
