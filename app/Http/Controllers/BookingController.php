<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use DB;

class BookingController extends Controller
{
    public function index(Request $request){
        $configPerPage = Config::get('custom.perPageRecord');
        $perPage = ($request->input('perpage') && $request->filled('perpage')) ? $request->input('perpage') : $configPerPage;
        // $perPage = $configPerPage;

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
            $searchKey = $request->input('seach_term');
            $userBookStatus = $request->input('userBookStatus');

            $query = Booking::query();
            
            if ($parkingIdArray && !empty($parkingIdArray)) {
                $query->where(function ($subquery) use ($parkingIdArray) {
                    $subquery->whereIn('parking_id', $parkingIdArray);
                });
            }

            if ($searchKey && !empty($searchKey)) {
                $query->where(function ($subquery) use ($searchKey) {
                    $subquery->where('booking_id', 'like', '%'.$searchKey.'%');
                });
            }

            if ($userBookStatus && !empty($userBookStatus)) {
                $query->where(function ($subquery) use ($userBookStatus) {
                    $subquery->where('status', $userBookStatus);
                });
            }

            $bookingData = $query->paginate($perPage);
            // dd($query->toSql());
            return view('admin.booking.booking-list', compact('bookingData'))->render();
        }else{
            
            $query  = Booking::query();
            
            if ($parkingIdArray && !empty($parkingIdArray)) {
                $query->where(function ($subquery) use ($parkingIdArray) {
                    $subquery->whereIn('parking_id', $parkingIdArray);
                });
            }
            $bookingData = $query->paginate($perPage);
            return view('admin.booking.index', compact('bookingData'))->render();
        }

        
    }
}
