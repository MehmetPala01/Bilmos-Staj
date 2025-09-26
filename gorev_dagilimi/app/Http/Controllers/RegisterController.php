<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function showForm(): View
    {
        return view('register');
    }

    public function processForm(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'authority' => 0,
            'role_id' => 2,
            'position' => 'Personel', // 🔹 artık null değil, default "Personel"
            ],
            [
                'name.required' => 'Ad alanı zorunludur.',
                'surname.required' => 'Soyad alanı zorunludur.',
                'email.required' => 'Email alanı zorunludur.',
                'email.email' => 'Geçerli bir email adresi giriniz.',
                'email.unique' => 'Bu email adresi zaten kayıtlı.',
                'password.required' => 'Şifre alanı zorunludur.',
                'password.min' => 'Şifre en az :min karakter olmalıdır.',
                'password.confirmed' => 'Şifre tekrar doğru değil.',
            ]);

        return redirect()->with('success', 'Kayıt başarıyla oluşturuldu. Giriş yapabilirsiniz.');
    }
}
