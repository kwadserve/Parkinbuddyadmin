<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10); // Adjust the number per page as needed
        return view('admin.user.index', compact('users'));
    }

    public function filter(Request $request)
    {
        $keyword = $request->input('keyword');
        $users = User::where('name', 'like', "%$keyword%")->paginate(10);
        return view('admin.user.user-list', compact('users'));
    }

}
