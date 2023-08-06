<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    public function index(Request $request)
    {
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
        $perPage = 10;
        $userDetails = User::where('id', $id)->first(); 
        $userBookingData = Booking::where("user_id",$userDetails['id'])->paginate($perPage);
        $userBookingCashCollection = $userBookingData->sum('cash_collection');
        $userBookingChargeCollection = $userBookingData->sum('charges');
        $userBookingCount = $userBookingData->count();
        
        return view('admin.user.detail', compact('userDetails','userBookingCount','userBookingCashCollection','userBookingChargeCollection'));
    }

    public function bookingListing(Request $request){
        $perPage = 10;
        $bookingData = Booking::query()
                        ->when($request->seach_term, function($q)use($request){
                            $q->where('booking_id', 'like', '%'.$request->seach_term.'%');
                        })
                        ->paginate($perPage);
            return view('admin.user.booking-list', compact('bookingData'))->render();
    }
}
