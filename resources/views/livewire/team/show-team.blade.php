<div x-data="{ id: null, title: null }">
    <x-page-header title="Employees">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
        <li class="breadcrumb-item"><a href="{{ route('teams.index') }}" wire:navigate>Team
                ({{ $team->name }})</a></li>
    </x-page-header>

    <div class="border p-2">
        <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
            <div>
                <input type="text" class="form-control " wire:model.live="search" placeholder="Saerch...">
            </div>
            <button type="button"
                class="btn btn-primary btn-wave d-inline-flex align-items-center gap-2 ms-auto text-nowrap"
                data-bs-toggle="modal" data-bs-target="#addNewEmployee">
                <i class="ti ti-plus fs-5"></i>
                <span> New Employee</span>
            </button>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">User</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($team->employees as $key => $employee)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>
                                <span>{{ str($employee->user->name) }}</span>
                            </td>
                            <td>
                                <span>{{ str($employee->user->email) }}</span>
                            </td>
                            <td>
                                <button type="button" class="btn"
                                    wire:click="removeEmployee({{ $employee->user->id }})">
                                    <i class="ti ti-trash fs-4 text-danger"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No Users Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Start::add-new-employee -->
    <x-modal id="addNewEmployee" size="lg">
        <x-slot:title>
            <i class="ti ti-trash text-danger me-1"></i>
            <span>
                Add new Employee to ({{ $team->name }})
            </span>
        </x-slot:title>
        <x-slot:content>
            <div>
                <input type="text" id="team-title" class="form-control" wire:model.live.debounce.250ms="searchModal"
                    placeholder="Enter User Name">
            </div>
            <table class="table text-nowrap table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $key => $user)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>
                                <span>{{ str($user->name) }}</span>
                            </td>
                            <td>
                                <span class="text-nowrap">{{ $user->email }}</span>
                            </td>
                            <td>
                                @if ($user->teams->where('id', $team->id)->count() == 0)
                                    <button type="button" class="btn"
                                        wire:click="addEmployee({{ $user->id }})">
                                        <i class="ti ti-plus fs-4 text-success"></i>
                                    </button>
                                @else
                                    <button type="button" class="btn"
                                        wire:click="removeEmployee({{ $user->id }})">
                                        <i class="ti ti-trash fs-4 text-danger"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No User Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-end mt-3">
                {{ $users->links() }}
            </div>
        </x-slot:content>
        <x-slot:footer>
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
        </x-slot:footer>
    </x-modal>
    <!-- End::add-new-employee -->
</div>
