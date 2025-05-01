<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => ['required', 'string', 'max:255'],
                    'age' => ['required', 'integer'],
                    'number' => ['required', 'string', 'min:10', 'max:15', 'regex:/^[0-9]+$/', Rule::unique(User::class)],
                    'address' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                ];
                break;
            case 'PUT':
                return [
                    'name' => ['required', 'string', 'max:255'],
                    'age' => ['required', 'integer'],
                    'number' => ['required', 'string', 'min:10', 'max:15', 'regex:/^[0-9]+$/', Rule::unique(User::class)->ignore($this->input('id'))],
                    'address' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
                ];
                break;
        }
    }
}
