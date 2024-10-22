@props(['name', 'type', 'value' => '', 'label'])
<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control"
        value="{{ $errors->any() ? old($name) : $value }}" />
    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
