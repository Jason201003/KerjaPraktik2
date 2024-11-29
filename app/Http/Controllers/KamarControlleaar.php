<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    // Method untuk memuat semua data kamar
    public function loadAllKamars() 
    {
        $all_kamars = Kamar::all();
        return view('admin.manage-kamar.index', compact('all_kamars'));
    }

    // Method untuk memuat form tambah kamar
    public function loadAddKamarForm()
    {
        $categories = Category::get()->pluck('name', 'id');
        $tipe_beds = ['queen', 'king', 'twin']; 
        return view('admin.manage-kamar.add-kamar', compact('categories', 'tipe_beds'));
    }

    // Method untuk menambah kamar baru
    public function AddKamar(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'categories' => 'required|string',
            'kapasitas' => 'required|numeric',
            'tipe_bed' => 'required|string',
            'harga' => 'nullable|numeric',
            'fasilitas' => 'nullable|string',
            'deskripsi' => 'nullable|string',
        ]);

        try {
            // Membuat objek kamar baru
            $new_kamar = new Kamar;
            $new_kamar->categories = $request->categories;
            $new_kamar->kapasitas = $request->kapasitas;
            $new_kamar->tipe_bed = $request->tipe_bed;
            $new_kamar->harga = $request->harga;
            $new_kamar->fasilitas = $request->fasilitas;
            $new_kamar->deskripsi = $request->deskripsi;
            $new_kamar->save();

            return redirect('/admin/manage-kamar')->with('success', 'Kamar Added Successfully');
        } catch (\Exception $e) {
            return redirect('/admin/manage-kamar' . $request->kamar_id)->with('fail', $e->getMessage());
        }
    }

    // Method untuk menampilkan form edit kamar
    public function loadEditForm($id)
    {
        $kamars = Kamar::find($id);
        $categories = Category::get()->pluck('name','id');
        $tipe_beds = ['queen', 'king', 'twin'];
        return view('admin.manage-kamar.edit-kamar', compact('kamar', 'categories', 'tipe_beds'));
    }

    // Method untuk mengedit data kamar
    public function EditKamar(Request $request)
    {
        // Validasi input dari pengguna
        $request->validate([
            'kamar_id' => 'required|exists:kamars,id',
            'categories' => 'nullable|string',
            'kapasitas' => 'nullable|numeric',
            'tipe_bed' => 'nullable|string',
            'harga' => 'nullable|numeric',
            'fasilitas' => 'nullable|string',
            'deskripsi' => 'nullable|string',
        ]);

        try {
            // Update data kamar berdasarkan id
            Kamar::where('id', $request->kamar_id)->update([
                'categories' => $request->categories,
                'kapasitas' => $request->kapasitas,
                'tipe_bed' => $request->tipe_bed,
                'harga' => $request->harga,
                'fasilitas' => $request->fasilitas,
                'deskripsi' => $request->deskripsi,
            ]);

            return redirect('/admin/manage-kamar')->with('success', 'Kamar Updated Successfully');
        } catch (\Exception $e) {
            return redirect('/admin/manage-kamar' . $request->kamar_id)->with('fail', $e->getMessage());
        }
    }

    // Method untuk menghapus kamar
    public function DeleteKamar($id)
    {
        try {
            Kamar::where('id', $id)->delete();
            return redirect('/admin/manage-kamar')->with('success', 'Kamar Deleted successfully!');
        } catch (\Exception $e) {
            return redirect('/admin/manage-kamar')->with('fail', $e->getMessage());
        }
    }

    // Method untuk pencarian kamar
    public function search(Request $request)
    {
        $query = $request->input('query');

        $all_kamars = Kamar::where('categories', 'like', "%$query%")
            ->orWhere('tipe_bed', 'like', "%$query%")
            ->orWhere('fasilitas', 'like', "%$query%")
            ->orWhere('kapasitas', 'like', "%$query%")
            ->get();

        // Return view dengan hasil pencarian
        return view('admin.manage-kamar.index', compact('all_kamars'));
    }
}
