<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignmentsRequests extends FormRequest
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
            'duty_id'   => [$this->id ? 'nullable' : 'required'],
            'users'     => [$this->id ? 'nullable' : 'required'],
            'situation' => 'required|string',
        ];
    }
    public function messages()
    {
        return
        [
            'users.required'     => 'Personel kısmı boş bırakılamaz.',
            'situation.string'   => 'Geçersiz karakter kullanımı.',
            'situation.required' => 'Lütfen bir görev durum seçiniz.',
            'duty_id.required'   => 'Lütfen bir tane görev seçiniz.',
        ];
    }


}
