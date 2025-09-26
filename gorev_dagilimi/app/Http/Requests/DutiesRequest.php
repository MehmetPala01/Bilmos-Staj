<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DutiesRequest extends FormRequest
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

            'duty' => 'required|string|max:100|min:10',
            'start_date' => 'required|date|after_or_equal:2000-01-01',
            'end_date' => 'required|date|after_or_equal:start_date|before_or_equal:2050-01-01',
        ];
    }
    public function messages(){
        return[
            'duty.required' => 'Görev alanı boş bırakılamaz.',
            'duty.string'=> 'Geçersiz karakter kullanımı.',
            'duty.max'=> 'Belirlenen karekter sayısını geçtiniz(En fazla 100 karakter).',
            'duty.min'=> 'Belirlenen karekterden az  karakter girdiniz (En az 10 karakter).',
            'start_date.required' => 'Başlangıç tarihi boş bırakılamaz.',
            'start_date.date'=>'Lütfen tarih formatında giriniz',
            'end_date.required' => 'Bitiş tarihi boş bırakılamaz.',
            'end_date.date'=>'Lütfen tarih formatında giriniz',
            'end_date.after_or_equal'=> 'Bitiş tarihi, başlangıç tarihinden önce olamaz.',
            'start_date.after_or_equal' => 'Geçerli bir başlangıç tarihi seçiniz',
            'end_date.before_or_equal'=> 'Geçerli bir bitiş tarihi giriniz.',
        ];
    }
}
