<?php

namespace App\Http\Requests\Cars;

use App\enums\Status;
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
            'price' => 'required|multiple_of:1000',
            'transmission_type_id' => ['int', 'required', Rule::in(array_keys($transmissions))],
            'vin' => ['string', 'required', Rule::unique('cars')->ignore($car)->whereNull('deleted_at')],
            'tags' => 'required|array',
            'tags.*' => 'integer|exists:tags,id',
            'status_id' => ['required|int', Rule::in(array_keys(Status::getAllWithKeys()))]
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
