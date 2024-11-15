<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $configPerPage = Config::get('custom.perPageRecord');
        $perPage = ($request->input('perpage') && $request->filled('perpage')) ? $request->input('perpage') : $configPerPage;
        
        if($request->ajax()){
            $searchKey = $request->input('seach_term');
            $query  = Vehicle::query();
        
            if ($searchKey) {
                $query->where(function ($subquery) use ($searchKey) {
                    $subquery->where('number', 'like', '%' . $searchKey . '%');
                });
            }
    
            $userVehicleData = $query->paginate($perPage);
            return view('admin.vehicle.vehicle-list', compact('userVehicleData'))->render();
        }else{
            $userVehicleData = Vehicle::query()->paginate($perPage);
            return view('admin.vehicle.index', compact('userVehicleData'));
        }
    }
}
