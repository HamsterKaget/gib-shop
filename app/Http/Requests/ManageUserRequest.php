<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ];
        } else if ($this->isMethod('put')) {
            $userId = $this->input('id');
            return [
                'id' => 'required|exists:users,id',
                'name' => 'required|string|max:255',
                // set the email must be unique except for current data before changed you know what i mean
                'email' => 'required|email|unique:users,email,'.$userId,
            ];
        }
    }
}
