<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Parking;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use DB;

class ParkingController extends Controller
{
    public function index(Request $request)
    {
        $configPerPage = Config::get('custom.perPageRecord');
        $perPage = ($request->input('perpage') && $request->filled('perpage')) ? $request->input('perpage') : $configPerPage;
        
        // $perPage = 1; //comment later

        $user = Auth::user();
        $userData = User::with('role')->where("id",$user['id'])->first(); 

        $parkingIdArray = [];
        if ($userData['role']['role'] == 'operator' || $userData['role']['role'] == 'manager') {
            $ids = DB::table('assign_parkings')
                ->select(DB::raw('GROUP_CONCAT(DISTINCT parking_id) as parking_ids'))
                ->where('manager_id', $user['id'])
                ->groupBy('manager_id')
                ->get();

            if ($ids->isNotEmpty()) {
                $parkingids = $ids[0]->parking_ids;
                $parkingIdArray = explode(',', $parkingids);
            } 
        }

        if($request->ajax()){
            $searchKey = $request->input('search_term');
            
            $query = Parking::query();

            if ($parkingIdArray && !empty($parkingIdArray)) {
                $query->where(function ($subquery) use ($parkingIdArray) {
                    $subquery->whereIn('id', $parkingIdArray);
                });
            }

            if ($searchKey && !empty($searchKey)) {
                $query->where(function ($subquery) use ($searchKey) {
                    $subquery->where('name', 'like', '%'.$searchKey.'%');
                });
            }

            $parkingsData = $query->paginate($perPage);
            return view('admin.parking.parking-list', compact('parkingsData'))->render();
        }else{
            $query = Parking::query();

            if ($parkingIdArray && !empty($parkingIdArray)) {
                $query->where(function ($subquery) use ($parkingIdArray) {
                    $subquery->whereIn('id', $parkingIdArray);
                });
            }
            $parkingsData = $query->paginate($perPage);
             // dd($query->toSql());
            return view('admin.parking.index', compact('parkingsData'));
        }
    }

    public function viewDetail($id){
        echo 'here is detail page';
        die;
        $configPerPage = Config::get('custom.perPageRecord');
        $perPage = $configPerPage;
        // $perPage = 2;
        $userDetails = User::where('id', $id)->first(); 
        $bookingData = Booking::where("user_id",$userDetails['id'])->paginate($perPage);
        $userBookingCashCollection = $bookingData->sum('cash_collection');
        $userBookingChargeCollection = $bookingData->sum('charges');
        $userBookingCount = $bookingData->count();
       
        $userPassData = UserPass::select('user_passes.*', 'passes.code as code', 'passes.title as title','passes.vehicle_type as vehicle_type','passes.expiry_time as expiry_time','passes.amount as amount','passes.total_hours as total_hours')
        ->join('passes', 'user_passes.pass_id', '=', 'passes.id')
        ->where('user_passes.user_id', $id) 
        ->paginate($perPage);

        $userVehicleData = Vehicle::where("user_id",$userDetails['id'])->paginate($perPage);
        // $userVehicleData = array();
        return view('admin.user.detail', compact('userDetails','userBookingCount','userBookingCashCollection','userBookingChargeCollection','bookingData','userPassData','userVehicleData'));
    }

    public function userBookingListing(Request $request){
        $configPerPage = Config::get('custom.perPageRecord');
        $perPage = ($request->input('perpage') && $request->filled('perpage')) ? $request->input('perpage') : $configPerPage;
        // $perPage = 2;
        $bookingData = Booking::query()
                        ->where("user_id",$request->userProfileId)
                        ->when($request->filled('userBookStatus'), function ($query) use ($request) {
                            return $query->where('status', $request->userBookStatus);
                        })
                        ->when($request->seach_term, function($q)use($request){
                            $q->where('booking_id', 'like', '%'.$request->seach_term.'%');
                        })
                        ->paginate($perPage);
            return view('admin.user.booking-list', compact('bookingData'))->render();
    }

    public function userPassesListing(Request $request){
        $configPerPage = Config::get('custom.perPageRecord');
        $perPage = ($request->input('perpage') && $request->filled('perpage')) ? $request->input('perpage') : $configPerPage;
        $searchKey = $request->input('seach_term');
        $userProfileId = $request->input('userProfileId');
        
        $query  = UserPass::select('user_passes.*', 'passes.code as code', 'passes.title as title','passes.vehicle_type as vehicle_type','passes.expiry_time as expiry_time','passes.amount as amount','passes.total_hours as total_hours')
        ->join('passes', 'user_passes.pass_id', '=', 'passes.id')
        ->where('user_passes.user_id', $userProfileId);
        
        if ($searchKey) {
            $query->where(function ($subquery) use ($searchKey) {
                $subquery->where('passes.title', 'like', '%' . $searchKey . '%');
            });
        }

        $userPassData = $query->paginate($perPage);

        return view('admin.user.pass-list', compact('userPassData'))->render();
    }

    public function userVehiclesListing(Request $request){
        $configPerPage = Config::get('custom.perPageRecord');
        $perPage = ($request->input('perpage') && $request->filled('perpage')) ? $request->input('perpage') : $configPerPage;
        $searchKey = $request->input('seach_term');
        $userProfileId = $request->input('userProfileId');
        
        $query  = Vehicle::where("user_id",$userProfileId);
        
        if ($searchKey) {
            $query->where(function ($subquery) use ($searchKey) {
                $subquery->where('number', 'like', '%' . $searchKey . '%');
            });
        }

        $userVehicleData = $query->paginate($perPage);
        return view('admin.user.vehicle-list', compact('userVehicleData'))->render();
    }
}
