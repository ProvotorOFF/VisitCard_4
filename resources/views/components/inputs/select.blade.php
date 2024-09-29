@props(['name', 'selected' => '', 'label', 'values' => []])
<div class="mb-1">
    <label for="{{ $name }}" style="width:145px;">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}">
        @foreach ($values as $id => $value)
            <option value="{{ $id }}" @selected($errors->any() ? old($name) == $id : $selected == $id)>{{ $value }}</option>
        @endforeach
    </select>
    @error($name)
        <span style="color: red">{{ $message }}</span>
    @enderror
</div>
