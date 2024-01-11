<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class MotorController extends Controller
{

    public function index()
    {

        $query = Motor::latest();
        if (request('search')) {
            $query->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('deskripsi', 'like', '%' . request('search') . '%');
        }
        $motors = $query->paginate(6)->withQueryString();
        return view('homepage', compact('motors'));
    }

    public function detail($id)
    {
        $motor = Motor::find($id);
        return view('detail', compact('motor'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('input', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'string', 'max:255', Rule::unique('motor', 'id')],
            'nama' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'deskripsi' => 'required|string',
            'tahun' => 'required|integer',
            'asal' => 'required|string',
            'foto_sampul' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Jika validasi gagal, kembali ke halaman input dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect('motors/create')
                ->withErrors($validator)
                ->withInput();
        }

        $randomName = Str::uuid()->toString();
        $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
        $fileName = $randomName . '.' . $fileExtension;

        // Simpan file foto ke folder public/images
        $request->file('foto_sampul')->move(public_path('images'), $fileName);
        // Simpan data ke table movies
        motor::create([
            'id' => $request->id,
            'nama' => $request->nama,
            'category_id' => $request->category_id,
            'deskripsi' => $request->deskripsi,
            'tahun' => $request->tahun,
            'asal' => $request->asal,
            'foto_sampul' => $fileName,
        ]);

        return redirect('/')->with('success', 'Data berhasil disimpan');
    }

    public function data()
    {
        $motors = Motor::latest()->paginate(10);
        return view('data-motors', compact('motors'));
    }

    public function edit($id)
    {
        $motor = Motor::find($id);
        $categories = Category::all();
        return view('form-edit', compact('motor', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'deskripsi' => 'required|string',
            'tahun' => 'required|integer',
            'asal' => 'required|string',
            'foto_sampul' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika validasi gagal, kembali ke halaman edit dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect("/motors/edit/{$id}")
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil data movie yang akan diupdate
        $motor = Motor::findOrFail($id);

        // Jika ada file yang diunggah, simpan file baru
        if ($request->hasFile('foto_sampul')) {
            $randomName = Str::uuid()->toString();
            $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
            $fileName = $randomName . '.' . $fileExtension;

            // Simpan file foto ke folder public/images
            $request->file('foto_sampul')->move(public_path('images'), $fileName);

            // Hapus foto lama jika ada
            if (File::exists(public_path('images/' . $motor->foto_sampul))) {
                File::delete(public_path('images/' . $motor->foto_sampul));
            }

            // Update record di database dengan foto yang baru
            $motor->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'category_id' => $request->category_id,
                'tahun' => $request->tahun,
                'asal' => $request->asal,
                'foto_sampul' => $fileName,
            ]);
        } else {
            // Jika tidak ada file yang diunggah, update data tanpa mengubah foto
            $motor->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'category_id' => $request->category_id,
                'tahun' => $request->tahun,
                'asal' => $request->asal,
            ]);
        }

        return redirect('/motors/data')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $motor = Motor::findOrFail($id);

        // Delete the movie's photo if it exists
        if (File::exists(public_path('images/' . $motor->foto_sampul))) {
            if ($motor->foto_sampul != 'default.jpg') {
                File::delete(public_path('images/' . $motor->foto_sampul));
            }
        }

        // Delete the movie record from the database
        $motor->delete();

        return redirect('/motors/data')->with('success', 'Data berhasil dihapus');
    }
}
