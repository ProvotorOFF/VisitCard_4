<?php

namespace App\Http\Requests\Tags;

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
        $tag =  $this?->route('tag');
        return [
            'name' => ['string', 'min:3', 'max:64', Rule::unique('tags')->ignore($tag)]
        ];
    }

    
}
