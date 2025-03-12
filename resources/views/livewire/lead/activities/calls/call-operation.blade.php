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
                :disabled="true" placeholder="Please Write customer Name" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-select-form id="status" name="Assigne" :items="$users" wireModel="callForm.assigned_id"
                placeholder="Please Assigne Call With User" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-select-form id="status" name="Calling Type" :items="$typeCalling" wireModel="callForm.typeCall"
                placeholder="Please Select Status" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="datetime-local" id="date_calling" name="Calling Time" wireModel="callForm.date_calling"
                placeholder="Please Write Call Value" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="title" name="Title" wireModel="callForm.title"
                placeholder="Please Write Title" />
        </div>

        <div class=" col-12 col-md-4 p-2" x-show="$wire.callForm.typeCall == 'incoming'">
            <x-input-form type="number" id="reminder" name="reminder" wireModel="callForm.reminder"
                placeholder="Please Write Reminder time Before Start" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-select-form id="status" name="Calling Reason" :items="$callReason" wireModel="callForm.reason_id"
                placeholder="Please Calling Reason" />
        </div>
        <div x-show="$wire.callForm.typeCall == 'outgoing'" class="row">
            <div class=" col-12 col-md-4 p-2">
                <x-input-form type="number" id="duration" name="duration" wireModel="callForm.duration"
                    placeholder="Please Write Duration Call" />
            </div>

            <div class=" col-12 col-md-4 p-2">
                <x-select-form id="status" name="Calling Response" :items="$callResponse" wireModel="callForm.response_id"
                    placeholder="Please Select Calling Response" />
            </div>
        </div>

        <div class="col-12 p-2">
            <x-textarea-form id="notes" name="Notes" wireModel="callForm.notes"
                placeholder="Please Write notes" />
        </div>

        <x-buttons-operation type="{{ $type }}" routeCancel="{{ route('leads.show', ['lead' => $lead->id]) }}"
            wireSave="save" wireUpdate="update" />
    </div>
</div>
