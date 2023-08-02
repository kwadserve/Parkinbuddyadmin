<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate(5); // Adjust the number per page as needed

        if($request->ajax()){
            $users = User::query()
                        ->when($request->seach_term, function($q)use($request){
                            $q->where('name', 'like', '%'.$request->seach_term.'%');
                            // ->orWhere('name', 'like', '%'.$request->keyword.'%')
                            // ->orWhere('email', 'like', '%'.$request->seach_term.'%');
                        })
                        ->paginate(5);
            return view('admin.user.user-list', compact('users'))->render();
        }
        return view('admin.user.index', compact('users'));
    }

    public function filter(Request $request)
    {
        $perPage = 10;
        $keywordFilter = $request->input('keyword');
        $page = $request->input('page', 1);

        $query = User::query();
        
        if (!empty($keywordFilter)) {
           $query->where('name', 'like', '%' . $keywordFilter . '%');
            // Add more filtering conditions here as per your requirements
            // Example: if (isset($filters['category'])) { ... }
        }

        $users = $query->paginate($perPage, ['*'], 'page', $page);

        // $users = User::where('name', 'like', "%$keyword%")->paginate(10);
        return view('admin.user.user-list', compact('users'));
    }

}
