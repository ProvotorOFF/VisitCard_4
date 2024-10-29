<?php

namespace App\Http\Requests\Comments;

use App\enums\Commentable;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Database\Eloquent\Model;
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
            'model' => ['required', 'string', Rule::in(Commentable::toArray())],
            'id' => 'required|integer'
        ];
    }

    public function isCommentable(): Model {
        return Commentable::fromString($this->model)::findOrFail($this->id);
    }

    public function attributes(): array
    {
        return [
            'text' => 'Текст',
        ];
    }
}
