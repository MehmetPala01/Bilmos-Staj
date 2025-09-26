<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:50',
            'surname'  => 'required|string|min:2|max:20',
            'email'     => ['required','email',Rule::unique('users')->ignore($this->id),],
            'password'  => [$this->id ? 'nullable' : 'required', 'string', 'min:8'],
            'position'  => 'required',

        ];
    }
    public function messages(){
        return [
            'name.required' => 'Ad alanı boş bırakılamaz.',
            'name.min' => 'Ad alanı minimum 3 karakter olmalı.',
            'name.max' => 'Ad alanı maksimum 50 karakter olabilir.',

            'surname.required' => 'Soyad alanı boş bırakılamaz',
            'surname.min' => 'Soyad alanı minimum 2 karakter olabilir.',
            'surname.max' => 'Soyad alanı maksimum 20 karakter olabilir.',

            'email.required' => 'Email alanı boş bırakılamaz',
            'email.email' => 'Bu alanı email formatında girmeniz gerekir',
            'email.unique' => 'Email sistemde kayıtlı.',

            'password.required' => 'Şifre alanı boş bırakılamaz.',
            'password.min' => 'Şifre alanı en az 8 karakter olmalıdır.',

            'position.required' => 'Pozisyon alanı boş bırakılamaz',


        ];
    }
}
