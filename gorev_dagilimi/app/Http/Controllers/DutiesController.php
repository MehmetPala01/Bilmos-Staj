<?php

namespace App\Http\Controllers;
use App\Http\Requests\DutiesRequest;
use App\Models\Duty;
use App\Models\User;
use App\Models\SendDuty;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;


class DutiesController extends Controller
{
    public function index(Request $request)
{

    if ($request->ajax()) {
        $duties = Duty::all();

        return DataTables::of($duties)
            ->addColumn('start_date', function ($duty) {
                    return Carbon::parse($duty->start_date)->format('d-m-Y');
                })
                ->addColumn('end_date', function ($duty) {
                    return Carbon::parse($duty->end_date)->format('d-m-Y');
                })
                ->make(true);
    }

    $duties = Duty::orderBy('created_at', 'desc');
   

    return view('duties.index');
}


    public function create(): View
    {
        $duties = Duty::all();
        $users = User::where('authority', 0 )->get();

        return view('/duties.create',compact('duties','users'));
    }

    public function edit($id)
    {
        $duty = Duty::findOrFail($id);
        return view('duties.edit', compact('duty'));
    }

    public function store(DutiesRequest $request)
    {
        $data = $request->all();
        Duty::create($data);

        return redirect()->route('duties.index');

        foreach ($sendDuties as $sendDuty) {
            $sendDuty->email = User::where('name', $sendDuty->name)
                           ->where('surname', $sendDuty->surname)
                           ->value('email');
        }

        return view('duties.store', compact('sendDuties'));
    }

    public function update(DutiesRequest $request, $id)
    {
        $duty = Duty::findOrFail($id);
        $data = $request->all();
        Duty::update($data);


        return redirect()->route('duties.index');
    }

    public function delete($id)
    {
        $duty = Duty::findOrFail($id);

        $dutyCount = SendDuty::where('duty_id', $duty->id)
                            ->whereIn('situation', ['başladı', 'devam ediyor'])
                            ->count();

        if ($dutyCount > 0) {
            return redirect()->back()->with('error', 'Bu görev personellre atanmış silinemez.');
        }

        $duty->delete();
        return redirect()->back()->with('success', 'Görev başarıyla silindi.');
    }
}
