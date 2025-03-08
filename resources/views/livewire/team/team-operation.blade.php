<div>
    <x-page-header title="{{ $type == 'create' ? 'Add New Team' : 'Update Team' }}">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
        <li class="breadcrumb-item"><a href="{{ route('teams.index') }}" wire:navigate>Team</a></li>
    </x-page-header>

    <form class="card border p-2">
        <div class="mb-2">
            <x-input-form type="text" id="group-input" name="Team Name" wireModel="name"
                placeholder="Please Write Team Name" />
        </div>
        <div class="mb-2">
            <x-textarea-form id="group-description" name="Description" wireModel="description"
                placeholder="Please Write Description" />
        </div>
        <x-buttons-operation type="{{ $type }}" routeCancel="{{ route('teams.index') }}" wireSave="save"
            wireUpdate="update" />
    </form>
</div>
