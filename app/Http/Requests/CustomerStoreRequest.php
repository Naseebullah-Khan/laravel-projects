<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
            "image" => ["image", "nullable"],
            "first_name" => ["required", "max:255", "string"],
            "last_name" => ["required", "max:255", "string"],
            "email" => ["required", "email"],
            "phone" => ["required", "string"],
            "bank_account_number" => ["required", "numeric"],
            "about" => ["max:500", "nullable", "string"],
        ];
    }
}
