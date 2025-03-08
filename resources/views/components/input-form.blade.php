@props(['id' => '', 'type' => 'text', 'name' => '', 'wireModel' => '', 'placeholder' => '', 'disabled' => false])
<label for="{{ $id }}" class="form-label">{{ $name }}</label>
<input type="{{ $type }}" id="{{ $id }}" class="form-control" wire:model="{{ $wireModel }}"
    placeholder="{{ $placeholder }}" @disabled($disabled)>
@error($wireModel)
    <span class="text-danger">{{ $message }}</span>
@enderror
