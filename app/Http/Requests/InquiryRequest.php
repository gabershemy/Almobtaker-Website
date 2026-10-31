<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InquiryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'         => ['required', 'string', 'max:100'],
            'phone'        => ['required', 'string', 'max:50'],
            'email'        => ['nullable', 'email', 'max:100'],
            'service_type' => ['nullable', 'string', 'max:100'],
            'message'      => ['nullable', 'string', 'max:2000'],
        ];
    }

    /**
     * Sanitize input data to prevent XSS and injection.
     */
    public function sanitized(): array
    {
        $validated = $this->validated();

        return [
            'name'         => strip_tags(trim($validated['name'])),
            'phone'        => strip_tags(trim($validated['phone'])),
            'email'        => !empty($validated['email']) ? filter_var(trim($validated['email']), FILTER_SANITIZE_EMAIL) : null,
            'service_type' => !empty($validated['service_type']) ? strip_tags(trim($validated['service_type'])) : 'استفسار عام',
            'message'      => !empty($validated['message']) ? strip_tags(trim($validated['message'])) : null,
        ];
    }
}
