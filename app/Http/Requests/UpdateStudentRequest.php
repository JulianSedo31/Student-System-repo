<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            "name" => "required|string|max:255",
            "address" => "required|string|max:255",
            "email" => "required|string|max:255",
            "age" => "required|integer|min:18",
            "moto" => "required|string|max:255",
            "password" => "nullable|string|min:8", // new attribute
            "college_level" => "required|string|max:255" // new attribute
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => strip_tags($this->name),
            'address' => strip_tags($this->address),
            'email' => strip_tags($this->email),
            'age' => strip_tags($this->age),
            'moto' => strip_tags($this->moto),
            'password' => strip_tags($this->password), // new attribute
            'college_level' => strip_tags($this->college_level) // new attribute
        ]);
    }
}
