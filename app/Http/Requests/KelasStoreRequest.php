<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelasStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'kelas' => [
                'required',
                'max:255',
                'min:1',
            ],
            'jurusan' => [
                'unique:kelas,jurusan',
                'max:255',
                'min:3',
            ],
        ];
    }

    public function message(): array
    {
        return [
            'kelas.required' => 'Kelas harus diisi',
            'kelas.max' => 'Kelas tidak boleh lebih dari 255 karakter',
            'kelas.min' => 'Kelas minimal 1 karakter',
            'jurusan.required' => 'Jurusan harus diisi',
            'jurusan.max' => 'Jurusan tidak boleh lebih dari 255 karakter',
            'jurusan.min' => 'Jurusan minimal 3 karakter',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
