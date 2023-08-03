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
        $users = User::paginate(10); // Adjust the number per page as needed

        if($request->ajax()){
            $users = User::query()
                        ->when($request->seach_term, function($q)use($request){
                            $q->where('name', 'like', '%'.$request->seach_term.'%');
                            // ->orWhere('name', 'like', '%'.$request->keyword.'%')
                            // ->orWhere('email', 'like', '%'.$request->seach_term.'%');
                        })
                        ->paginate(10);
            return view('admin.user.user-list', compact('users'))->render();
        }
        return view('admin.user.index', compact('users'));
    }

    public function viewDetail($id){
        $userDetails = User::where('id', $id)->first(); 
        $userBookingCount = Booking::where("user_id",$userDetails['id'])->count();
       
        return view('admin.user.detail', compact('userDetails','userBookingCount'));
    }
}
