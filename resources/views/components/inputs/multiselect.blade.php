@props(['name', 'selected' => [], 'label', 'values' => []])

<div class="mb-3">
    <label for="{{ $name }}[]" class="form-label">{{ $label }}</label>
    <select name="{{ $name }}[]" id="{{ $name }}" class="form-select" multiple>
        @foreach ($values as $id => $value)
            <option value="{{ $id }}" @selected($errors->any() ? in_array($id, old($name, [])) : in_array($id, $selected))>{{ $value }}</option>
        @endforeach
    </select>
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
    @error("$name.*")
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
