<div>
    <x-page-header title="{{ $type == 'create' ? 'Add New Unit' : 'Update Unit' }}">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
        <li class="breadcrumb-item"><a href="{{ route('lead-units.index') }}" wire:navigate>Unit</a></li>
    </x-page-header>

    <form class="card border p-2">
        <div class="mb-2">
            <x-input-form type="text" id="group-input" name="Unit Name" wireModel="name"
                placeholder="Please Write Unit Name" />
        </div>
        <x-buttons-operation type="{{ $type }}" routeCancel="{{ route('lead-units.index') }}" wireSave="save"
            wireUpdate="update" />
    </form>
</div>
