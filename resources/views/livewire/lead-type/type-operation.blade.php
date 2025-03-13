<div>
    <x-page-header title="{{ $type == 'create' ? 'Add New Type' : 'Update Type' }}">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
        <li class="breadcrumb-item"><a href="{{ route('lead-types.index') }}" wire:navigate>Type</a></li>
    </x-page-header>

    <form class="card border p-2">
        <div class="mb-2">
            <x-input-form type="text" id="group-input" name="Type Name" wireModel="name"
                placeholder="Please Write Type Name" />
        </div>
        <x-buttons-operation type="{{ $type }}" routeCancel="{{ route('lead-types.index') }}" wireSave="save"
            wireUpdate="update" />
    </form>
</div>
