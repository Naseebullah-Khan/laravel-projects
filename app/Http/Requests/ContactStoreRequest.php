<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
{
    // /**
    //  * Determine if the user is authorized to make this request.
    //  */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "max:20", "min:2"],
            "email" => ["required", "email"],
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "Hey please fill the name field",
            "name.max" => "The max length of name have to be 20",
            "name.min" => "The min length of name have to be 2",
            "email.required" => "Hey email is required"
        ];
    }
}
