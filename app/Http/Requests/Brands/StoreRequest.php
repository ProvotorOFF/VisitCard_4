<?php

namespace App\Http\Requests\Brands;

use App\Models\Brand;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $brand = $this?->route('brand');
        return [
            'name' => ['string', 'min:2', 'max:64', Rule::unique('brands')->ignore($brand)]
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Название'
        ];
    }
}
