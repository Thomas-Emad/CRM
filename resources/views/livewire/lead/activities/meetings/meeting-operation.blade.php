<div>
    <x-page-header title="{{ $type == 'create' ? 'Add New Call' : 'Update Call' }}">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
        <li class="breadcrumb-item"><a href="{{ route('leads.index') }}" wire:navigate>Call</a></li>
        <li class="breadcrumb-item"><a href="{{ route('leads.show', ['lead' => $lead->id]) }}"
                wire:navigate>{{ $lead->name }}</a></li>
    </x-page-header>

    <div class=" border p-2 row">
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="customerName" name="Customer Name" wireModel="customerName"
                :disabled="true" placeholder="Please Write customerName" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="title" name="Title" wireModel="title"
                placeholder="Please Write Title" />
        </div>

        <div class=" col-12 col-md-4 p-2">
            <x-select-form id="status" name="Assigne" :items="$users" wireModel="assigned_id"
                placeholder="Please Assigne Call With User" />
        </div>

        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="datetime-local" id="start" name="start" wireModel="start"
                placeholder="Please Write Start Time" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="datetime-local" id="end" name="end" wireModel="end"
                placeholder="Please Write End Time" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-select-form id="status" name="Calling Type" :items="$typeMeeting" wireModel="online"
                placeholder="Please Select Status" />
        </div>
        <div class=" col-12 col-md-4 p-2" x-show="$wire.online == 0">
            <x-input-form type="text" id="location" name="location" wireModel="location"
                placeholder="Please Write location" />
        </div>
        <div class=" col-12 col-md-4 p-2" x-show="$wire.online == 1">
            <x-input-form type="text" id="link" name="link" wireModel="link"
                placeholder="Please Write Link" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="number" id="link" name="reminder" wireModel="reminder"
                placeholder="Please Write reminder Before Meeting By Miniutes" />
        </div>

        <div class="col-12 p-2">
            <x-textarea-form id="notes" name="Notes" wireModel="notes" placeholder="Please Write notes" />
        </div>

        <x-buttons-operation type="{{ $type }}" routeCancel="{{ route('leads.show', ['lead' => $lead->id]) }}"
            wireSave="save" wireUpdate="update" />
    </div>
</div>
