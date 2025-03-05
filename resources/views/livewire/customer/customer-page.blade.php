<div>
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-medium fs-24 mb-0">Customers</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">CRM</a></li>

                    <li class="breadcrumb-item active d-inline-flex" aria-current="page">customers</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header Close -->
    <div class="border p-2">
        <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
            <div class="d-flex gap-2">
                <div class="card shadow-sm border ps-3 pe-3 pt-2 pb-2 fs-6 text-secondary ">
                    {{ $customers->count() }} Total Customers
                </div>

            </div>
            <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
                <div>
                    <input type="text" class="form-control " wire:model.live="search" placeholder="Saerch...">
                </div>
                <a class="btn btn-primary btn-wave d-inline-flex align-items-center gap-2 ms-auto"
                    href="{{ route('customer.operation', ['type' => 'create']) }}">
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
                        <th scope="col">Name</th>
                        <th scope="col">Company</th>
                        <th scope="col">Primary Phone</th>
                        <th scope="col">Primary Email</th>
                        <th scope="col">Group</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>
                                <span>{{ str($customer->name)->limit(10) }}</span>
                            </td>
                            <td>
                                <span>{{ str($customer->company)->limit(10) }}</span>
                            </td>
                            <td>
                                <span>{{ str($customer->phone)->limit(10) }}</span>
                            </td>
                            <td>
                                <span>{{ str($customer->email)->limit(10) }}</span>
                            </td>
                            <td>
                                <span>{{ $customer->group->name }}</span>
                            </td>
                            <td>
                                <span>{{ $customer->created_at->format('Y-m-d') }}</span>
                            </td>
                            <td>
                                <span class="badge bg-success text-white"
                                    style="background-color: {{ $customer->status->color }} !important;">
                                    {{ $customer->status->name }}
                                </span>
                            </td>
                            <td>
                                <div>
                                    <a class="btn " href="{{ route('customer.show', ['id' => $customer->id]) }}">
                                        <i class="ti ti-eye fs-4 text-primary"></i>
                                    </a>
                                    <a class="btn "
                                        href="{{ route('customer.operation', ['type' => 'update', 'id' => $customer->id]) }}">
                                        <i class="ti ti-pencil fs-4 text-primary"></i>
                                    </a>
                                    <button type="button" class="btn " data-bs-toggle="modal"
                                        data-bs-target="#DeleteLeadModal" wire:click="show({{ $customer->id }})">
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

            <div class="p-2">
                {{ $customers->links() }}
            </div>
        </div>
    </div>

    <!-- Start::delete-lead -->
    <div class="modal fade" id="DeleteLeadModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="DeleteLeadModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="DeleteLeadModalLabel">
                        <i class="ti ti-trash text-danger me-1"></i>
                        <span>
                            Are you sure you want to delete this Customer?!
                        </span>
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <label for="customer-name" class="form-label">Customer Name</label>
                        <input type="text" id="lead-title" class="form-control disabled" wire:model="customer.name"
                            disabled placeholder="Enter Customer Name">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" wire:click="delete">Delete</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End::delete-lead -->
</div>
