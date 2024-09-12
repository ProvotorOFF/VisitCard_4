@props(['name', 'type', 'value' => '', 'label'])
<div class="mb-1">
    <label for="{{ $name }}" style="width:100px;">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        value="{{ $errors->any() ? old($name) : $value }}" />
    @error($name)
        <span style="color: red">{{ $message }}</span>
    @enderror
</div>
