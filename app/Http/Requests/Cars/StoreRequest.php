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
        $carId = $this?->id;

        return [
            'brand' => 'string|min:3|max:255|required',
            'model' => [
                'string',
                'min:3',
                'max:255',
                'required',
                Rule::unique('cars')->ignore($carId)->whereNull('deleted_at')
            ],
            'price' => 'multiple_of:1000',
            'transmission_type_id' => ['int', Rule::in(array_map(fn($item) => $item->id, $transmissions))]
        ];
    }

    public function attributes(): array
    {
        return [
            'brand' => 'Бренд',
            'model' => 'Марка',
            'price' => 'Стоимость',
            'transmission_type_id' => 'Коробка передач'
        ];
    }
}
