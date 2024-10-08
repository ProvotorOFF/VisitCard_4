<?php

namespace App\Http\Requests\Comments;

use App\Models\Brand;
use App\Models\Car;
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
        return [
            'text' => 'required|string|max:1000',
            'commentable_type' => ['required', 'string', Rule::in([Car::class, Brand::class])],
            'commentable_id' => 'required|integer'
        ];
    }

    public function attributes(): array
    {
        return [
            'text' => 'Текст',
        ];
    }

    protected function prepareForValidation()
    {

        if ($this->route('car')) {
            $this->merge([
                'commentable_type' => Car::class,
                'commentable_id' => $this->route('car')->id,
            ]);
        } elseif ($this->route('brand')) {
            $this->merge([
                'commentable_type' => Brand::class,
                'commentable_id' => $this->route('brand')->id,
            ]);
        }
    }
}
