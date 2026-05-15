<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class UserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|required',
            'email' => 'email|unique:users,email',
            'role_id'=> 'exists:roles,id',
            'user_id'=> 'exists:users,id',
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'name.required' => 'Name is required.',
            'name.string' => 'Name must be of characters.',
            'role.exists' => 'Role does not exists',
            'user_id.exists' => 'User does not exists',
        ];
    }
}
