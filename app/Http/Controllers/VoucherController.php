<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;

class VoucherController extends Controller
{
    public function index()
    {
        $configPerPage = Config::get('custom.perPageRecord');
        $perPage = ($request->input('perpage') && $request->filled('perpage')) ? $request->input('perpage') : $configPerPage;
        
        $vouchers = Voucher::paginate($perPage);
        return view('admin.voucher.index', compact('vouchers'));
    }

    public function add_voucher(Request $request)
    {
        $validated = $request->validate([]);
        
        try {
            $voucher = Voucher::create($validated);

            return redirect()->back()->with('success', 'Voucher created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: '.$e->getMessage());
        }
    }
}
