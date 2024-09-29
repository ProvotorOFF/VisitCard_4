@props(['name', 'selected' => [], 'label', 'values' => []])
<div class="mb-1">
    <label for="{{ $name }}[]" style="width:145px;">{{ $label }}</label>
    <select name="{{ $name }}[]" id="{{ $name }}" multiple>
        @foreach ($values as $id => $value)
            <option value="{{ $id }}" @selected($errors->any() ? in_array($id, old($name, [])) : in_array($id, $selected))>{{ $value }}</option>
        @endforeach
    </select>
    @error($name)
        <span style="color: red">{{ $message }}</span>
    @enderror
    @error("$name.*")
    <span style="color: red">{{ $message }}</span>
@enderror
</div>
