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
            "subject" => ["nullable", "max:255"],
            "message" => ["required", "max:5000"],
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "Hey please fill the name field",
            "name.max" => "The max length of name have to be 20",
            "name.min" => "The min length of name have to be 2",
            "email.required" => "Hey email is required",
            "subject.max" => "The max length of subject have to be 255",
            "message.required" => "Hey message is required",
            "message.max" => "The max length of message have to be 5000",
        ];
    }
}
