<?php
    
namespace App\Http\Controllers;
    
use App\User;
use DB;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Str; 
    
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
              
            $data = User::latest()->get();
   
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->filter(function ($instance) use ($request) {
                        if (!empty($request->get('email'))) {
                            $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                return Str::contains($row['email'], $request->get('email')) ? true : false;
                            });
                        }
   
                        if (!empty($request->get('search'))) {
                            $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                if (Str::contains(Str::lower($row['email']), Str::lower($request->get('search')))){
                                    return true;
                                }else if (Str::contains(Str::lower($row['name']), Str::lower($request->get('search')))) {
                                    return true;
                                }
   
                                return false;
                            });
                        }
   
                    })
                    ->addColumn('action', function($row){
  
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
  
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    
        // return view('users');
        $peserta = User::where('level', 'peserta')->count();
        $prog = User::where('id_divisions', '1')->count();
        $mmd = User::where('id_divisions', '2')->count();
        $skj = User::where('id_divisions', '3')->count();
        $pendaftar = User::whereIn('level', ['peserta', 'nonaktif'])->count();
return view('users', compact('peserta', 'pendaftar', 'prog', 'mmd', 'skj'));
    }
}