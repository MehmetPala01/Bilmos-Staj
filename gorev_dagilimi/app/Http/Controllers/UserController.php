<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\User;
use App\Models\SendDuty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $users = User::query();
            return DataTables::eloquent($users)
                ->editColumn('created_at', function ($user) {
                    return Carbon::parse($user->created_at)->format('d-m-Y');
            }) ->make(true);
        };

        return view('users.index');
    }

    public function create()
    {
    $roles = Role::all();
    return view('users.create', compact('roles'));
    }

    public function edit($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function store(UsersRequest $request)
    {
    $data = $request->all();
    $data['password'] = Hash::make($data['password']);


    if (!$request->filled('role_id')) {
        return redirect()->back()->withInput()->withErrors(['role_id' => 'Role seçilmelidir.']);
    }

    User::create($data);

    return redirect()->route('users.index')->with('success', 'Kullanıcı başarıyla eklendi.');
    }

    public function update(UsersRequest $request, $id)
    {

        $data = $request->except('password');
            if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        return redirect()->route('users.index')->with('success', 'Kullanıcı başarıyla güncellendi.');
    }

    public function delete($id)
    {
        $user = User::find($id);

        if ($user) {
            if ($user->email === 'mpala535353@gmail.com') {
                return redirect()->back()->with('error', 'Bu kullanıcı silinemez!');
            }
            $userCount = SendDuty::where('user_id', $user->id)
                ->whereIn('situation', ['başladı', 'devam ediyor'])
                ->count();

            if ($userCount > 0) {
                return redirect()->back()->with('error', 'Bu kullanıcıya atanmış görev bulunuyor.');
            }

            $user->delete();
            return redirect()->back()->with('success', 'Kullanıcı başarıyla silindi.');
        }

        return redirect()->back()->with('error', 'Kullanıcı bulunamadı.');
    }
}
