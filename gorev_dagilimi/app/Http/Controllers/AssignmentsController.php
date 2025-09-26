<?php

namespace App\Http\Controllers;

use App\Models\SendDuty;
use App\Models\User;
use App\Models\Duty;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\AssignmentsRequests;

class AssignmentsController extends Controller
{
    public function index(Request $request)
    {


        if ($request->ajax()) {$sendDuties = SendDuty::with(['user' => function($query) {$query->withTrashed();}, 'duty']);

            return DataTables::eloquent($sendDuties)
                ->addColumn('start_date', function ($sendDuty) {
                    return Carbon::parse($sendDuty->start_date)->format('d-m-Y');
                })
                ->addColumn('end_date', function ($sendDuty) {
                    return Carbon::parse($sendDuty->end_date)->format('d-m-Y');
                })
                ->make(true);
        }
        return view('assignments.index');
    }
    public function create()
    {
        $duties = Duty::all();
        $users  = User::all();
        return view('assignments.create', compact('duties', 'users'));
    }
    public function edit($id)
    {
        $sendDuty = SendDuty::with(['user', 'duty'])->findOrFail($id);
        $duties   = Duty::all();
        $users    = User::all();

        return view('assignments.edit', compact('sendDuty', 'duties', 'users'));
    }
    public function store(AssignmentsRequests $request)
    {
        foreach ($request->users as $userId) {
            $existingDuty = SendDuty::where('user_id', $userId)
                ->whereIn('situation', ['başladı', 'devam ediyor'])
                ->first();

            if ($existingDuty) {
                return redirect()->back()->withErrors([
                    'users' => "Seçilen kullanıcı zaten devam eden bir göreve sahip."
                ])->withInput();
            }
            $data = $request->all();
            $data['user_id'] = $userId;
            SendDuty::create($data);
        }

        return redirect()->route('assignments.index')->with('success', 'Görev başarıyla gönderildi.');
    }

    public function update(AssignmentsRequests $request, $id)
{
    $sendDuty = SendDuty::findOrFail($id);

    $data=$request->all();
    $sendDuty->update($data);

    return redirect()->route('assignments.index')->with('success', 'Görev başarıyla güncellendi.');
}

    public function delete($id)
    {
        $sendDuty = SendDuty::findOrFail($id);
        $sendDuty->delete();

        return redirect()->route('assignments.index')->with('success', 'Görev başarıyla silindi.');
    }
}
