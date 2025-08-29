<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaycareRegister;

class DaycareRegisterController extends Controller
{
    public function index()
    {
        $daycares = DaycareRegister::all();
        return view('admin.daycare.features.index', compact('daycares'));
    }

    public function create()
    {
        return view('admin.daycare.features.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'hour' => 'required|integer',
            'type' => 'required|in:daily,weekly,monthly',
        ]);

      DaycareRegister::create($request->only(['name', 'price', 'hour', 'type']));

        return redirect()->route('daycare.features.list')->with('success', 'Daycare Feature created successfully.');
    }

    public function edit($id)
    {
        $daycare = DaycareRegister::findOrFail($id);
        return view('admin.daycare.features.edit', compact('daycare'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'hour' => 'required|integer',
            'type' => 'required|in:daily,weekly,monthly',
        ]);

        $daycare = DaycareRegister::findOrFail($id);
        $daycare->update($request->all());

        return redirect()->route('daycare.features.list')->with('success', 'Daycare Feature updated successfully.');
    }

    public function destroy($id)
    {
        $daycare = DaycareRegister::findOrFail($id);
        $daycare->delete();

        return redirect()->route('daycare.features.list')->with('success', 'Daycare Feature deleted successfully.');
    }
}
