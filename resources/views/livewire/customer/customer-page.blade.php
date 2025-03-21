<div x-data="{ id: null, title: null }">
    <x-page-header title="Customers">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
    </x-page-header>

    <div class="border p-2">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
            <div class="bg-white shadow-sm border rounded ps-3 pe-3 pt-2 pb-2 fs-6 text-secondary ">
                {{ $customers->count() }} Total Customers
            </div>
            <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
                <div>
                    <input type="text" class="form-control " wire:model.live="search" placeholder="Saerch...">
                </div>
                <a class="btn btn-primary btn-wave d-inline-flex align-items-center gap-2 ms-auto text-nowrap"
                    wire:navigate href="{{ route('customers.create') }}">
                    <i class="ti ti-plus fs-5"></i>
                    <span>New Customer</span>
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Company</th>
                        <th scope="col">Country</th>
                        <th scope="col">Person Name</th>
                        <th scope="col">Person Phone</th>
                        <th scope="col">Person Email</th>
                        <th scope="col">Source</th>
                        <th scope="col">Date Acquired</th>
                        <th scope="col">Status</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Customer Since</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>
                                <span
                                    title="{{ $customer->name }}">{{ strLimitWithCheckOrDefault($customer, $customer->name) }}</span>
                            </td>
                            <td>
                                <span
                                    title="{{ $customer->company }}">{{ strLimitWithCheckOrDefault($customer, $customer->company) }}</span>
                            </td>
                            <td>
                                <span
                                    title="{{ $customer->country?->name }}">{{ strLimitWithCheckOrDefault($customer->country, $customer->country?->name) }}</span>
                            </td>
                            <td>
                                <span
                                    title="{{ $customer->person_name }}">{{ strLimitWithCheckOrDefault($customer, $customer->person_name) }}</span>
                            </td>
                            <td>
                                <span
                                    title="{{ $customer->person_email }}">{{ strLimitWithCheckOrDefault($customer, $customer->person_email) }}</span>
                            </td>
                            <td>
                                <span
                                    title="{{ $customer->person_phone }}">{{ strLimitWithCheckOrDefault($customer, $customer->person_phone) }}</span>
                            </td>
                            <td>
                                <span
                                    title="{{ $customer->source?->name }}">{{ strLimitWithCheckOrDefault($customer->source, $customer->source?->name) }}</span>
                            </td>
                            <td>
                                <span>{{ $customer->date_acquired?->format('Y-m-d') ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span class="badge bg-success text-white"
                                    style="background-color: {{ $customer->status?->color }} !important;">
                                    {{ strLimitWithCheckOrDefault($customer->status, $customer->status?->name) }}
                                </span>
                            </td>
                            <td>
                                <span>{{ $customer->priority?->label() ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span>{{ $customer->created_at?->format('Y-m-d') ?? 'N/A' }}</span>
                            </td>
                            <td>
                                {{-- <span>{{ $customer->customer_since?->format('Y-m-d') ?? 'N/A' }}</span> --}}
                            </td>
                            <td>
                                <div>
                                    <a class="btn " wire:navigate
                                        href="{{ route('customers.show', ['customer' => $customer->id]) }}">
                                        <i class="ti ti-eye fs-4 text-primary"></i>
                                    </a>
                                    <a class="btn " wire:navigate
                                        href="{{ route('customers.edit', ['customer' => $customer->id]) }}">
                                        <i class="ti ti-pencil fs-4 text-primary"></i>
                                    </a>
                                    <button type="button" class="btn " data-bs-toggle="modal"
                                        data-bs-target="#DeleteLeadModal"
                                        x-on:click="id = {{ $customer->id }}; title = '{{ $customer->name }}' ">
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

            <div class="d-flex justify-content-end mt-3">
                {{ $customers->links() }}
            </div>
        </div>
    </div>

    <!-- Start::delete-lead -->
    <x-modal id="DeleteLeadModal">
        <x-slot:title>
            <i class="ti ti-trash text-danger me-1"></i>
            <span>
                Are you sure you want to delete this Customer?!
            </span>
        </x-slot:title>
        <x-slot:content>
            <div>
                <label for="customer-name" class="form-label">Customer Name</label>
                <input type="text" id="lead-title" class="form-control disabled" x-model="title" disabled
                    placeholder="Enter Customer Name">
            </div>
        </x-slot:content>
        <x-slot:footer>
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" wire:click="delete(id)">Delete</button>
        </x-slot:footer>
    </x-modal>
    <!-- End::delete-lead -->
</div>
