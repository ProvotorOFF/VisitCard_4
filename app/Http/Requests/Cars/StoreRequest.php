<?php

namespace App\Http\Requests\Cars;

use App\enums\Status;
use App\Services\AddressParser\ParserInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

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
            'status_id' => ['required', 'int', Rule::in(array_keys(Status::getAllWithKeys()))],
            'seller_address' => 'required|string|nullable'
        ];
    }

    protected function prepareForValidation(): void {
        $parser = app(ParserInterface::class);
        if (!$this->seller_address) return;
        $cleanAddress = $parser->getAddress($this->seller_address);
        if (!isset($cleanAddress['result'])) throw ValidationException::withMessages(['seller_address' => 'Не удалось определить адрес!']);
        $this->merge([
            'seller_address' => $cleanAddress['result']
        ]);
    }

    public function attributes(): array
    {
        return [
            'brand_id' => 'Бренд',
            'model' => 'Марка',
            'price' => 'Стоимость',
            'transmission_type_id' => 'Коробка передач',
            'vin' => 'VIN',
            'tags' => 'Теги',
            'status_id' => 'Статус',
            'seller_address' => 'Адрес продавца'
        ];
    }
}
