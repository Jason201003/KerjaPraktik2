<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Kamar;
use Illuminate\Support\Facades\DB;
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
            'kapasitas'  => 'required|integer',
            'tipe_bed' => 'required',
            'harga' => 'required|numeric',
            'stock' => 'required|integer|min:0',
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

    // Reset auto-increment jika tidak ada data dalam tabel
    if (Kamar::count() === 0) {
        DB::statement('ALTER TABLE kamars AUTO_INCREMENT = 1');
    }

    return redirect()->route('manager.kamars.index')->with('success', 'Kamar deleted successfully.');
}

}
