@props(['type' => 'create', 'routeCancel' => '', 'wireSave' => 'save', 'wireUpdate' => 'update'])
<div class="mt-3 d-flex justify-content-end gap-2">
    <a class="btn btn-secondary" href="{{ $routeCancel }}" wire:navigate>Close</a>
    @if ($type == 'create')
        <button type="button" class="btn btn-success" wire:click="{{ $wireSave }}">Save</button>
    @else
        <button type="button" class="btn btn-success" wire:click="{{ $wireUpdate }}">Update</button>
    @endif
</div>
