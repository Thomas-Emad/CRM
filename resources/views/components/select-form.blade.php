@props(['id' => '', 'items' => [], 'name' => '', 'wireModel' => '', 'placeholder' => '', 'disabled' => false])
<label for="{{ $id }}" class="form-label">{{ $name }}</label>
<select class="form-select" aria-label="{{ $placeholder }}" id="{{ $id }}" wire:model="{{ $wireModel }}">
    <option selected>{{ $placeholder }}
    </option>
    @foreach ($items as $item)
        <option value="{{ $item->id }}" wire:key="{{ $id . '-' . $item->id }}">
            {{ $item->name }}
        </option>
    @endforeach
</select>
@error($wireModel)
    <span class="text-danger">{{ $message }}</span>
@enderror
