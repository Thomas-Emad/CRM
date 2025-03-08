<div>
    <x-page-header title="{{ $type == 'create' ? 'Add New Group' : 'Update Group' }}">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
        <li class="breadcrumb-item"><a href="{{ route('groups.index') }}" wire:navigate>Group</a></li>
    </x-page-header>

    <form class="card border p-2">
        <div class="mb-2">
            <x-input-form type="text" id="group-input" name="Group Name" wireModel="name"
                placeholder="Please Write Group Name" />
        </div>
        <div class="mb-2">
            <x-textarea-form id="group-description" name="Description" wireModel="description"
                placeholder="Please Write Description" />
        </div>
        <x-buttons-operation type="{{ $type }}" routeCancel="{{ route('groups.index') }}" wireSave="save"
            wireUpdate="update" />
    </form>
</div>
