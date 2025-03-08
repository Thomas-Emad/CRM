<div>
    <x-page-header title="{{ $type == 'create' ? 'Add New Status' : 'Update Status' }}">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
        <li class="breadcrumb-item"><a href="{{ route('statuses.index') }}" wire:navigate>Statuses</a></li>
    </x-page-header>

    <form class="card border p-2">
        <div>
            <x-input-form type="text" id="status-input" name="Status Name" wireModel="name"
                placeholder="Please Write Status Name" />
        </div>

        <div class="d-flex align-items-center gap-2 mt-3">
            <x-color-form id="status-color" name="Color" wireModel="color" placeholder="Please Write Color" />
        </div>

        <x-buttons-operation type="{{ $type }}" routeCancel="{{ route('statuses.index') }}" wireSave="save"
            wireUpdate="update" />
    </form>
</div>
