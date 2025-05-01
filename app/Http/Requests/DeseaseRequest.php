<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeseaseRequest extends FormRequest
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
                    'nama_penyakit' => 'required',
                    'detail_penyakit' => 'required',
                    // 'solusi_penyakit' => 'required',
                ];
                break;
            case 'PUT':
                return [
                    'nama_penyakit' => 'required',
                    'detail_penyakit' => 'required',
                    // 'solusi_penyakit' => 'required',
                ];
                break;
        }
    }
}
