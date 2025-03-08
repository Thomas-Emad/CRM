<div>
    <x-page-header title="{{ $type == 'create' ? 'Add New Source' : 'Update Source' }}">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">CRM</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sources.index') }}">Source</a></li>
    </x-page-header>

    <form class="card border p-2">
        <div class="mb-2">
            <x-input-form type="text" id="source-name" name="Name Source" wireModel="name"
                placeholder="Please Write Name Source" />
        </div>
        <div class="mb-2">
            <x-input-form type="text" id="source-website" name="website" wireModel="website"
                placeholder="Please Write website" />
        </div>
        <div class="mb-2">
            <x-textarea-form id="source-description" name="Description" wireModel="description"
                placeholder="Please Write Description" />
        </div>

        <x-buttons-operation type="{{ $type }}" routeCancel="{{ route('sources.index') }}" wireSave="save"
            wireUpdate="update" />
    </form>
</div>
