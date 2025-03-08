<div>
    <x-page-header title="{{ $type == 'create' ? 'Add New Interactive' : 'Update Interactive' }}">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
        <li class="breadcrumb-item"><a href="{{ route('customers.index') }}" wire:navigate>Customers</a></li>
    </x-page-header>

    <div class=" border p-2 row">
        <input type="hidden" name="lead_id" wire:model="interactiveForm.lead_id">
        <div class=" col-12 col-md-6 p-2">
            <x-select-form id="statuses" name="Status" wireModel="interactiveForm.status_id" :items="$statuses"
                placeholder="Please Select Status" />
        </div>
        <div class=" col-12 col-md-6 p-2">
            <x-select-form id="type" name="Type" wireModel="interactiveForm.type" :items="[(object) ['id' => 'message', 'name' => 'Message'], (object) ['id' => 'call', 'name' => 'Call']]"
                placeholder="Please Select Type" />
        </div>
        <div class="col-12 p-2">
            <x-input-form type="text" id="title" name="Title" wireModel="interactiveForm.title"
                placeholder="Please Write title" />
        </div>

        <div class="col-12 p-2">
            <x-textarea-form id="source-description" name="Description" wireModel="interactiveForm.content"
                placeholder="Please Write Description" />
        </div>

        <x-buttons-operation type="{{ $type }}" routeCancel="{{ route('leads.show', ['lead' => $this->id]) }}"
            wireSave="save" wireUpdate="update" />
    </div>
</div>
