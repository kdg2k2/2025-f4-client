<?php

namespace App\Http\Requests\Upgrade;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'package_id' => 'required|integer|exists:packages,id',
        ];
    }

    // messages
    public function messages(): array
    {
        return [
            'package_id.required' => 'The package id is required.',
            'package_id.integer' => 'The package id must be an integer.',
            'package_id.exists' => 'The selected package id is invalid.',
        ];
    }
}
