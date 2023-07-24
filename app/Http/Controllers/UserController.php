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
        return view('admin.user.index');
    }

    public function filter(Request $request)
    {
        $query = User::query();
        // Add filtering logic here based on the request data
        // For example:
        // if ($request->has('category')) {
        //     $query->where('category', $request->category);
        // }
        $filteredUsers = $query->paginate(10);
        // Render the users partial view to a string
        $usersHtml = view('admin.users.user-list', ['users' => $filteredUsers])->render();

        // Extract pagination links from the paginator instance
        $paginationHtml = $this->getPaginationHtml($filteredUsers);

         // Return AJAX response with product data and pagination links
         return response()->json([
            'data' => $usersHtml,
            'pagination' => $paginationHtml,
        ]);
    }

    // Helper method to extract pagination links from Paginator instance
    private function getPaginationHtml(LengthAwarePaginator $paginator)
    {
        $paginator->appends(request()->all());
        $paginatorHtml = $paginator->links()->toHtml();
        return $paginatorHtml;
    }
}
