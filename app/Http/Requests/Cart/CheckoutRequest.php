<?php

namespace App\Http\Requests\Cart;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
        $this->merge([]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cart_document_ids' => 'required|array|exists:cart_document_items,id',
            'cart_document_ids.*' => 'integer',
        ];
    }
}
