<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreDeveloperRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'experience_year' => 'nullable',
            'curriculum' => 'nullable|max:255',
            'profile_picture' => 'nullable|max:255',
            'profile_description' => 'required',
            'address' => 'nullable|max:64',
            'phone_number' => 'nullable|max:20',
        ];
    }
}
