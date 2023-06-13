<?php

namespace App\Http\Requests\News;

use App\Enums\NewsStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_ids' => ['required', 'array'],
            'category_ids.*' => ['exists:categories,id'],
            'title' => ['required', 'min:5', 'max:100'],
            'author' => ['nullable', 'string', 'min:2', 'max:30'],
            'status' => ['required', new Enum(NewsStatus::class)],
            'image' => ['sometimes'],
            'description' => ['nullable', 'string','max:300'],
        ];
    }

    public function getCategoryIds(): array
    {
        return (array) $this->validated('category_ids');
    }
}
