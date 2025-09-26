<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }
   public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|min:3|max:50',
        'surname'  => 'required|string|min:2|max:50',
        'email'     => 'required|email|unique:users,email,' . Auth::id(),
    ],[
        'name.required' => 'Lütfen isim alanını doldurunuz',
        'name.min' => 'Ad alanı en az 3 karakter olmalıdır',
        'name.max' => 'Ad alanı 50 karakteri geçemez',
        'surname.required' => 'Lütfen soyad alanını doldurunuz',
        'surname.min' => 'Soyad alanı en az 3 karakter olmalıdır',
        'surname.max' => 'Soyad alanı 50 karakteri geçemez',
        'email.required' => 'Lütfen e-posta alanını doldurunuz',
        'email.email' => 'E-posta formatında giriniz',
        'email.unique' => 'Bu e-posta sistemde bulunuyor'
    ]);

    $user = User::find(Auth::user()->id);

    $user->update([
        'name' => $request->name,
        'surname' => $request->surname,
        'email' => $request->email,
    ]);

    return redirect()->back()->with('success', 'Profil güncellendi.');
}


       public function edit_password($id)
    {
        $user = User::findOrFail($id);
        return view('profile.password', compact('user'));
    }
    public function update_password(Request $request)
{
     if (!Hash::check($request->oldPassword, Auth::user()->password)) {
    return redirect()->back()->withErrors([
        'oldPassword' => 'Eski şifreniz yanlış.'
    ]);

}

    $request->validate([
        'oldPassword' => 'required',
        'newPassword' => 'required|min:8|confirmed',
    ],[
        'oldPassword.required' => 'Bu alanı boş bırakamazsınız.',
        'newPassword.required' => 'Bu alanı boş bırakamazsınız.',
        'newPassword.min' => 'Şifreniz minimum 8 karakter olmalıdır.',
        'newPassword.confirmed' =>'Şifreler eşleşmiyor'
    ]);





    $user = User::find(Auth::user()->id);

    $user->password = Hash::make($request->newPassword);
    $user->save();

    return back()->with('status', 'Şifre başarıyla güncellendi.');
}

}
