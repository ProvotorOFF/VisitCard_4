<?php

namespace App\Http\Requests\Cars;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'brand' => 'string|min:3|max:255|required',
            'model' => 'string|min:3|max:255|required',
            'price' => 'multiple_of:1000',
            'transmission_type_id' => 'int|between:1,2'
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
