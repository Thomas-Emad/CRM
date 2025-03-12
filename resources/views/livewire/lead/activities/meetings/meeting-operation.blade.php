<div>
    <x-page-header title="{{ $type == 'create' ? 'Add New Meeting' : 'Update Meeting' }}">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
        <li class="breadcrumb-item"><a href="{{ route('leads.index') }}" wire:navigate>Meeting</a></li>
        <li class="breadcrumb-item"><a href="{{ route('leads.show', ['lead' => $lead->id]) }}"
                wire:navigate>{{ $lead->name }}</a></li>
    </x-page-header>

    <div class=" border p-2 row">
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="customerName" name="Customer Name" wireModel="customerName"
                :disabled="true" placeholder="Please Write customerName" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="title" name="Title" wireModel="meetingForm.title"
                placeholder="Please Write Title" />
        </div>

        <div class=" col-12 col-md-4 p-2">
            <x-select-form id="status" name="Assigne" :items="$users" wireModel="meetingForm.assigned_id"
                placeholder="Please Assigne Meeting With User" />
        </div>

        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="datetime-local" id="start" name="start" wireModel="meetingForm.start"
                placeholder="Please Write Start Time" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="datetime-local" id="end" name="end" wireModel="meetingForm.end"
                placeholder="Please Write End Time" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-select-form id="status" name="Meeting Type" :items="$typeMeeting" wireModel="meetingForm.online"
                placeholder="Please Select Status" />
        </div>
        <div class=" col-12 col-md-4 p-2" x-show="$wire.meetingForm.online == 0">
            <x-input-form type="text" id="location" name="location" wireModel="meetingForm.location"
                placeholder="Please Write location" />
        </div>
        <div class=" col-12 col-md-4 p-2" x-show="$wire.meetingForm.online == 1">
            <x-input-form type="text" id="link" name="link" wireModel="meetingForm.link"
                placeholder="Please Write Link" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="number" id="link" name="reminder" wireModel="meetingForm.reminder"
                placeholder="Please Write reminder Before Meeting By Miniutes" />
        </div>

        <div class="col-12 p-2">
            <x-textarea-form id="notes" name="Notes" wireModel="meetingForm.notes"
                placeholder="Please Write notes" />
        </div>

        <x-buttons-operation type="{{ $type }}" routeCancel="{{ route('leads.show', ['lead' => $lead->id]) }}"
            wireSave="save" wireUpdate="update" />
    </div>
</div>
