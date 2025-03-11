@props([
    'id' => '',
    'name' => '',
    'wireModel' => '',
    'placeholder' => '',
    'disabled' => false,
    'withoutLabel' => false,
    'value' => '',
])
@if (!$withoutLabel)
    <label for="{{ $id }}" class="form-label">
        {{ $name }}
    </label>
@endif
<textarea class="form-control " id="{{ $id }}" rows="3" wire:model="{{ $wireModel }}"
    placeholder="{{ $placeholder }}" @disabled($disabled)>{{ $value }}</textarea>
@error($wireModel)
    <span class="text-danger">{{ $message }}</span>
@enderror
