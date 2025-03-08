<div>
    <x-page-header title="{{ $type == 'create' ? 'Add New Lead' : 'Update Lead' }}">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
        <li class="breadcrumb-item"><a href="{{ route('leads.index') }}" wire:navigate>Lead</a></li>
    </x-page-header>

    <div class=" border p-2 row">
        <div class=" col-12 col-md-4 p-2">
            <x-select-form id="status" name="Status" :items="$statuses" wireModel="lead.status_id"
                placeholder="Please Select Status" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-select-form id="source" name="Source" :items="$sources" wireModel="lead.source_id"
                placeholder="Please Select Source" />
        </div>
        <div class="col-12 col-md-4 p-2">
            <x-select-form id="group" name="Group" :items="$groups" wireModel="lead.group_id"
                placeholder="Please Select Group" />
        </div>
        <div class="col-12 col-md-6 p-2">
            <x-select-form id="assigned" name="Team" :items="$teams" wireModel="lead.team_id" :live="true"
                placeholder="Please Select Team" />
        </div>
        <div class="col-12 col-md-6 p-2">
            <x-select-form id="assigned" name="Assigned" :items="$employees" wireModel="lead.assigned_id"
                placeholder="Please Select Assigned" />
        </div>
        <div class="col-12  col-md-4 p-2">
            <x-input-form type="text" id="tag-input" name="Tag Name" wireModel="lead.tags"
                placeholder="Please Write Tags" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="name" name="Name" wireModel="lead.name"
                placeholder="Please Write Name" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="address" name="Address" wireModel="lead.address"
                placeholder="Please Write Address" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="position" name="Position" wireModel="lead.position"
                placeholder="Please Write Position" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="city" name="City" wireModel="lead.city"
                placeholder="Please Write city" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="email" id="email" name="Email" wireModel="lead.email"
                placeholder="Please Write email" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="company" name="Company" wireModel="lead.company"
                placeholder="Please Write company" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="website" name="Website" wireModel="lead.website"
                placeholder="Please Write website" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-select-form id="country" name="Country" :items="$countries" wireModel="lead.country_id"
                placeholder="Please Select Country" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="phone" name="Phone" wireModel="lead.phone"
                placeholder="Please Write Phone" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="zipCode" name="Zip Code" wireModel="lead.zipCode"
                placeholder="Please Write Zip Code" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="number" id="leadValue" name="Lead Value" wireModel="lead.leadValue"
                placeholder="Please Write Lead Value" />
        </div>

        <div class="col-12 p-2">
            <x-textarea-form id="description" name="Description" wireModel="lead.description"
                placeholder="Please Write Description" />
        </div>

        <x-buttons-operation type="{{ $type }}" routeCancel="{{ route('leads.index') }}" wireSave="save"
            wireUpdate="update" />
    </div>
</div>
