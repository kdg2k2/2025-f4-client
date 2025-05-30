<?php

namespace App\Http\Requests\Cart;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class RemoveRequest extends FormRequest
{
    use FailedValidation;
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
        $ruleId = 'required|integer|exists:cart_document_items,id';
        return [
            'id' => $ruleId,
            'type' => 'required|in:document',
        ];
    }
}
