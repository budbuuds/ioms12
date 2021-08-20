<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PesertaModel;
use DB;

class StatusController extends Controller
{
    public function index()
    {
        $data['participants'] = DB::table('participant')
                        ->join('faculties', 'facultas_id', '=', 'faculties.faculties_id')
                        ->join('majors', 'participant.major_id', '=', 'majors.major_id')
                        ->join('division', 'participant.division_id', '=', 'division.division_id')
                        ->join('sub_division', 'sub_division_id', '=', 'sub_division.sub_id')
                        // ->select('participant.*', 'faculties.name', 'jurusans.name', 'divisi.nama')
                        ->get();

        // dd($data['participans']);
        $data['active'] = 'status';
        return view('backend/page/status/index', $data);
    }
    public function checked(Request $request)
    {
        DB::table('participant')
                ->where('participant_id', '=', $request->participant_id)
                ->update(['status' => '1']);
        return redirect()->back();
    }
    
    public function unchecked(Request $request)
    {
        DB::table('participant')
                ->where('participant_id', $request->participant_id)
                ->update(['status' => '0']);
        return redirect()->back();
    }

    public function zone(Request $request)
    {
            DB::table('participant')
                    ->where('participant_id', $request->id)
                    ->update(['zone' => $request->zone])
                    ->get();
    }
}
