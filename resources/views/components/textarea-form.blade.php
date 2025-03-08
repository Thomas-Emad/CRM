@props(['id' => '', 'name' => '', 'wireModel' => '', 'placeholder' => '', 'disabled' => false])
<label for="{{ $id }}" class="form-label">
    {{ $name }}
</label>
<textarea class="form-control " id="{{ $id }}" rows="3" wire:model="{{ $wireModel }}"
    placeholder="{{ $placeholder }}" @disabled($disabled)></textarea>
@error($wireModel)
    <span class="text-danger">{{ $message }}</span>
@enderror
