<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Kamar;
use Illuminate\Http\Request;

class AdminKamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::with('category')->get();
        return view('admin.kamars.index', compact('kamars'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.kamars.create', compact('categories'));
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
        return redirect()->route('admin.kamars.index')->with('success', 'Kamar created successfully.');
    }

    public function edit(Kamar $kamar)
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.kamars.edit', compact('kamar', 'categories'));
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
        return redirect()->route('admin.kamars.index')->with('success', 'Kamar updated successfully.');
    }

    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect()->route('admin.kamars.index')->with('success', 'Kamar deleted successfully.');
    }
}
