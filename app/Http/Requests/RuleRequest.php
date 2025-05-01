<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RuleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'kode_penyakit' => ['required', 'string', 'max:255'],
            'kode_gejala' => ['required'],
            'mb_pakar' => ['required'],
            'md_pakar' => ['required'],
        ];
    }
}
