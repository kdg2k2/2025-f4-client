<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            // 'per_page' => $this->per_page ?? null,
            // 'page' => $this->page ?? null,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $documentRule = '|nullable';
        if ($this->type == "document") {
            $documentRule = '|required';
        }
        return [
            'document_id' => "integer|exists:documents,id$documentRule",
            "type" => "required|in:document"
        ];
    }
}
