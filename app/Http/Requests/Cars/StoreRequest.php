<?php

namespace App\Http\Requests\Cars;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
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
        $transmissions = config('app-cars.transmissions');
        $car =  $this?->route('car');
        return [
            'brand_id' => 'integer|required|exists:brands,id',
            'model' => 'string|min:3|max:255|required',
            'price' => 'multiple_of:1000',
            'transmission_type_id' => ['int', Rule::in(array_keys($transmissions))],
            'vin' => ['string', Rule::unique('cars')->ignore($car)->whereNull('deleted_at')],
            'tags' => 'array',
            'tags.*' => 'integer|exists:tags,id'
        ];
    }

    public function attributes(): array
    {
        return [
            'brand' => 'Бренд',
            'model' => 'Марка',
            'price' => 'Стоимость',
            'transmission_type_id' => 'Коробка передач',
            'vin' => 'VIN',
            'tags' => 'Теги'
        ];
    }
}
