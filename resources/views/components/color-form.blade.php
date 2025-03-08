@props(['id' => '', 'name' => '', 'wireModel' => '', 'disabled' => false])
<label class="form-label" for="{{ $id }}">{{ $name }}</label>
<input class="form-control form-input-color" id="{{ $id }}" wire:model="{{ $wireModel }}" type="color"
    value="#136bd0" @disabled($disabled)>
@error($wireModel)
    <span class="text-danger">{{ $message }}</span>
@enderror
