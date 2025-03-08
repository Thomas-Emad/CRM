<div x-data="{ id: null, title: null }">
    <x-page-header title="Teams">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
    </x-page-header>

    <div class="border p-2">
        <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
            <div>
                <input type="text" class="form-control " wire:model.live="search" placeholder="Saerch...">
            </div>
            <a class="btn btn-primary btn-wave d-inline-flex align-items-center gap-2 ms-auto text-nowrap"
                href="{{ route('teams.create') }}" wire:navigate>
                <i class="ti ti-plus fs-5"></i>
                <span>New Team</span>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Members</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teams as $team)
                        <tr>
                            <th scope="row">{{ $team->id }}</th>
                            <td>
                                <span>{{ str($team->name) }}</span>
                            </td>
                            <td>
                                <span>{{ $team->description ? str($team->description)->limit(10) : 'N/A' }}</span>
                            </td>
                            <td>
                                <span>{{ $team->employees_count }}</span>
                            </td>
                            <td>
                                <div>
                                    <a class="btn " href="{{ route('teams.show', ['team' => $team->id]) }}"
                                        wire:navigate>
                                        <i class="ti ti-users fs-4 text-primary"></i>
                                    </a>
                                    <a class="btn " href="{{ route('teams.edit', ['team' => $team->id]) }}"
                                        wire:navigate>
                                        <i class="ti ti-pencil fs-4 text-primary"></i>
                                    </a>
                                    <button type="button" class="btn " data-bs-toggle="modal"
                                        data-bs-target="#deleteTeamModal"
                                        x-on:click="id = {{ $team->id }}; title = '{{ $team->name }}'">
                                        <i class="ti ti-trash fs-4 text-danger"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No Team Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-end mt-3">
                {{ $teams->links() }}
            </div>

        </div>
    </div>

    <!-- Start::delete-team -->
    <x-modal id="deleteTeamModal">
        <x-slot:title>
            <i class="ti ti-trash text-danger me-1"></i>
            <span>
                Are you sure you want to delete this team?!
            </span>
        </x-slot:title>
        <x-slot:content>
            <div>
                <label for="team-name" class="form-label">Name Team</label>
                <input type="text" id="team-title" class="form-control disabled" x-model="title" disabled
                    placeholder="Enter Team Name">
            </div>

        </x-slot:content>
        <x-slot:footer>
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" wire:click="delete(id)">Delete</button>
        </x-slot:footer>
    </x-modal>
    <!-- End::delete-team -->
</div>
