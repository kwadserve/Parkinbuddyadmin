<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;
use Illuminate\Support\Facades\Config;

class VoucherController extends Controller
{
    public function index(Request $request)
    {
        $configPerPage = Config::get('custom.perPageRecord');
        $perPage = ($request->input('perpage') && $request->filled('perpage')) ? $request->input('perpage') : $configPerPage;
        
        $vouchers = Voucher::paginate($perPage);
        return view('admin.voucher.index', compact('vouchers'));
    }

    public function add_voucher(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'title' => 'required',
            'discount' => 'required',
            'type' => 'required',
            'vehicle_type' => 'required',
            'expiry' => 'required'
        ]);
        
        try {
            $voucher = Voucher::create($validated);

            return redirect()->back()->with('success', 'Voucher created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: '.$e->getMessage());
        }
    }
}
