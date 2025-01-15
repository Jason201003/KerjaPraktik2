<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::with('category')->get();
        return view('manager.kamars.index', compact('kamars'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('manager.kamars.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required|unique:kamars,room_number',
            'kapasitas'  => 'required|integer',
            'tipe_bed' => 'required',
            'harga' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        Kamar::create($request->all());
        return redirect()->route('manager.kamars.index')->with('success', 'Kamar created successfully.');
    }

    public function edit(Kamar $kamar)
    {
        $categories = Category::pluck('name', 'id');
        return view('manager.kamars.edit', compact('kamar', 'categories'));
    }

    public function update(Request $request, Kamar $kamar)
    {
        $request->validate([
            'room_number' => 'required|unique:kamars,room_number,' . $kamar->id,
            'kapasitas' => 'required|integer',
            'tipe_bed' => 'required',
            'harga' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:unbooked,booked,occupied,unoccupied',
        ]);

        $kamar->update($request->all());
        return redirect()->route('manager.kamars.index')->with('success', 'Kamar updated successfully.');
    }

    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect()->route('manager.kamars.index')->with('success', 'Kamar deleted successfully.');
    }
}
