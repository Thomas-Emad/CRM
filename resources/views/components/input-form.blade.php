@props([
    'id' => '',
    'type' => 'text',
    'name' => '',
    'wireModel' => '',
    'placeholder' => '',
    'disabled' => false,
    'live' => false,
])
<label for="{{ $id }}" class="form-label">{{ $name }}</label>
<input type="{{ $type }}" id="{{ $id }}" class="form-control"
    @if (!$live) wire:model="{{ $wireModel }}" @else wire:model.live.debounce.200ms="{{ $wireModel }}" @endif
    placeholder="{{ $placeholder }}" @disabled($disabled)>
@error($wireModel)
    <span class="text-danger">{{ $message }}</span>
@enderror
