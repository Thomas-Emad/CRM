<div>
    <x-page-header title="{{ $type == 'create' ? 'Add New Lead' : 'Update Lead' }}">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate>CRM</a></li>
        <li class="breadcrumb-item"><a href="{{ route('leads.index') }}" wire:navigate>Lead</a></li>
    </x-page-header>

    <div class=" border p-2 row">
        <h5>- Main Information</h5>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="name" name="Lead Name" wireModel="lead.name"
                placeholder="Please Write Lead Name" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="company" name="Company" wireModel="lead.company"
                placeholder="Please Write company" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="parent_account" name="Parent Account" wireModel="lead.parent_account"
                placeholder="Please Write Parent Account" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="contractor" name="Contractor" wireModel="lead.contractor"
                placeholder="Please Write Contractor" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="developer" name="Developer" wireModel="lead.developer"
                placeholder="Please Write Developer" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="consultant" name="Consultant" wireModel="lead.consultant"
                placeholder="Please Write Consultant" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="investor" name="Investor/Owner" wireModel="lead.investor"
                placeholder="Please Write Investor/Owner" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="architect" name="Architect" wireModel="lead.architect"
                placeholder="Please Write Architect" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="industry" name="Industry" wireModel="lead.industry"
                placeholder="Please Write Industry" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="address" name="Address" wireModel="lead.address"
                placeholder="Please Write Address" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="city" name="City" wireModel="lead.city"
                placeholder="Please Write city" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-select-form id="country" name="Country" :items="$countries" wireModel="lead.country_id"
                placeholder="Please Select Country" />
        </div>

        <hr>
        <h5>- Person Contact</h5>

        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="person_name" name="Person Name" wireModel="lead.person_name"
                placeholder="Please Write Person Name" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="person_phone" name="Person Phone" wireModel="lead.person_phone"
                placeholder="Please Write Person Phone" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="email" id="person_email" name="Person Email" wireModel="lead.person_email"
                placeholder="Please Write Person Email" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="person_position" name="Person Position" wireModel="lead.person_position"
                placeholder="Please Write Person Position" />
        </div>

        <hr>
        <h5>- Lead Source</h5>
        <div class=" col-12 col-md-4 p-2">
            <x-select-form id="source" name="Source" :items="$sources" wireModel="lead.source_id"
                placeholder="Please Select Source" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="date" id="date_acquired" name="Date Acquired" wireModel="lead.date_acquired"
                placeholder="Please Write Date Acquired" />
        </div>
        <div class="col-12 col-md-4 p-2">
            <x-select-form id="type" name="Lead Type" :items="$types" wireModel="lead.lead_type_id"
                placeholder="Please Select Lead Type" />
        </div>
        <hr>
        <h5>- Deal Type</h5>

        <div class=" col-12 col-md-4 p-2">
            <x-select-form id="status" name="Status" :items="$statuses" wireModel="lead.status_id"
                placeholder="Please Select Status" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-select-form id="section" name="Section" :items="$sections" wireModel="lead.section"
                placeholder="Please Select Section" />
        </div>
        <div class="col-12 col-md-4 p-2">
            <x-select-form id="unit" name="Lead Unit" :items="$units" wireModel="lead.lead_unit_id"
                placeholder="Please Select Lead Unit" />
        </div>
        <div class="col-12 col-md-6 p-2">
            <x-select-form id="assigned" name="Team" :items="$teams" wireModel="lead.team_id" :live="true"
                placeholder="Please Select Team" />
        </div>
        <div class="col-12 col-md-6 p-2">
            <x-select-form id="assigned" name="Assigned" :items="$employees" wireModel="lead.assigned_id"
                placeholder="Please Select Assigned" />
        </div>

        <hr>

        <div class="col-12 p-2">
            <x-input-form type="number" id="lead_value" name="Estimated Budget Range" wireModel="lead.lead_value"
                placeholder="Please Write Lead Value" />
        </div>

        <hr>
        <h5>- Internal Notes</h5>

        <div class="col-12 col-md-4 p-2">
            <x-select-form id="priority" name="Priority" :items="$priorities" wireModel="lead.priority"
                placeholder="Please Select Priority" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="decision_makers" name="Decision Makers"
                wireModel="lead.decision_makers" placeholder="Please Write Decision Makers" />
        </div>
        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="text" id="next_step" name="Next Step" wireModel="lead.next_step"
                placeholder="Please Write Next Step" />
        </div>

        <div class=" col-12 col-md-4 p-2">
            <x-input-form type="date" id="next_step_date" name="Next Step Date" wireModel="lead.next_step_date"
                placeholder="Please Write Next Step Date" />
        </div>
        <div class="col-12 p-2">
            <x-textarea-form id="step_description" name="Step Description" wireModel="lead.step_description"
                placeholder="Please Write Step Description" />
        </div>

        <hr>
        <div class="col-12 p-2">
            <x-textarea-form id="project_brief" name="Project Brief" wireModel="lead.project_brief"
                placeholder="Please Write Project Brief" />
        </div>

        <x-buttons-operation type="{{ $type }}" routeCancel="{{ route('leads.index') }}" wireSave="save"
            wireUpdate="update" />
    </div>
</div>
