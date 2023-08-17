<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\UserPass;
use App\Models\Pass;
use App\Models\Vehicle;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // $configPerPage = Config::get('custom.perPageRecord');
        // $perPage = $configPerPage;
        $perPage = 10;
        $users = User::paginate($perPage); // Adjust the number per page as needed

        if($request->ajax()){
            $users = User::query()
                        ->when($request->seach_term, function($q)use($request){
                            $q->where('name', 'like', '%'.$request->seach_term.'%');
                            // ->orWhere('name', 'like', '%'.$request->keyword.'%')
                            // ->orWhere('email', 'like', '%'.$request->seach_term.'%');
                        })
                        ->paginate($perPage);
            return view('admin.user.user-list', compact('users'))->render();
        }
        return view('admin.user.index', compact('users'));
    }

    public function viewDetail($id){
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
