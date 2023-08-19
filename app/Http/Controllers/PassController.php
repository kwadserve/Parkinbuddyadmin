<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use App\Models\UserPass;
use App\Models\Pass;

class PassController extends Controller
{
    public function index(Request $request){
        $configPerPage = Config::get('custom.perPageRecord');
        $perPage = ($request->input('perpage') && $request->filled('perpage')) ? $request->input('perpage') : $configPerPage;
        
        if($request->ajax()){
            $searchKey = $request->input('seach_term');
            $query  = UserPass::select('user_passes.*', 'passes.code as code', 'passes.title as title','passes.vehicle_type as vehicle_type','passes.expiry_time as expiry_time','passes.amount as amount','passes.total_hours as total_hours')
            ->join('passes', 'user_passes.pass_id', '=', 'passes.id');
            
            if ($searchKey) {
                $query->where(function ($subquery) use ($searchKey) {
                    $subquery->where('passes.title', 'like', '%' . $searchKey . '%');
                });
            }
    
            $userPassData = $query->paginate($perPage);
            return view('admin.pass.pass-list', compact('userPassData'))->render();
        }else{
            $query  = UserPass::select('user_passes.*', 'passes.code as code', 'passes.title as title','passes.vehicle_type as vehicle_type','passes.expiry_time as expiry_time','passes.amount as amount','passes.total_hours as total_hours')
            ->join('passes', 'user_passes.pass_id', '=', 'passes.id');
            $userPassData = $query->paginate($perPage);
            return view('admin.pass.index', compact('userPassData'))->render();
        }

        
    }
}
