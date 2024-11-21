<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class ElectricityController extends Controller
{
    public function index()
    {
        $data = Customer::with('usabilities')->get();
        return view('biling.index', compact('data'));
    }

    public function store(Request $request)
    {
        $customer = Customer::create($request->only(['name', 'building_type', 'state']));
        $usability = $customer->usabilities()->create($request->only(['month', 'usability']));

        $bill = $this->calculateBill($request->building_type, $request->usability);
        $usability->update(['bill' => $bill]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect()->back();
    }

    private function calculateBill($buildingType, $usability)
    {
        if ($buildingType === 'Residential') {
            return $usability <= 200 ? $usability * 0.45 : (200 * 0.45) + (($usability - 200) * 0.97);
        } elseif ($buildingType === 'Commercial') {
            return $usability <= 200 ? $usability * 0.89 : (200 * 0.89) + (($usability - 200) * 1.13);
        }
    }
}