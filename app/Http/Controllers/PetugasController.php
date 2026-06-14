<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class PetugasController extends Controller
{

    // ====================================
    // DASHBOARD STAFF
    // ====================================

    public function index()
    {
        $search = request('search');

        $reports = Report::query()

            ->when(
                $search,
                function ($query) use ($search) {

                    $query->where(
                        'nama_barang',
                        'like',
                        '%' . $search . '%'
                    );

                }
            )

            ->latest()

            ->paginate(10)

            ->withQueryString();

        return view(
            'staff.index',
            compact('reports')
        );
    }

    // ====================================
    // HALAMAN EDIT
    // ====================================

    public function edit($id)
    {
        $report = Report::findOrFail($id);

        return view(
            'staff.edit',
            compact('report')
        );
    }

    // ====================================
    // UPDATE DATA
    // ====================================

    public function update(
        Request $request,
        $id
    ) {

        $item = Report::findOrFail($id);

        // ====================================
        // VALIDASI
        // ====================================

        $request->validate([

            'nama_barang' =>
                'required|string|max:255',

            'kategori' =>
                'required|string',

            'deskripsi' =>
                'required|string',

            'foto_barang' =>
                'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);

        // ====================================
        // UPDATE DATA
        // ====================================

        $item->nama_barang =
            $request->nama_barang;

        $item->kategori =
            $request->kategori;

        $item->deskripsi =
            $request->deskripsi;

        // ====================================
        // UPDATE FOTO
        // ====================================

        if ($request->hasFile('foto_barang')) {

            $path = $request
                ->file('foto_barang')
                ->store(
                    'reports',
                    'public'
                );

            $item->foto_barang = $path;

        }

        // ====================================
        // SIMPAN
        // ====================================

        $item->save();

        // ====================================
        // SUCCESS
        // ====================================

        return back()->with(
            'success',
            'Data berhasil diperbarui!'
        );
    }

    // ====================================
    // HAPUS DATA
    // ====================================

    public function destroy($id)
    {
        $item = Report::findOrFail($id);

        $item->delete();

        return redirect()
            ->back()
            ->with(
                'success',
                'Data berhasil dihapus'
            );
    }

    // ====================================
    // LIST DATA
    // ====================================

    public function list(Request $request)
    {

        $query = Report::query();

        // ====================================
        // SEARCH
        // ====================================

        if ($request->filled('search')) {

            $searchTerm =
                strtolower(
                    $request->search
                );

            $query->whereRaw(

                'LOWER(nama_barang) LIKE ?',

                ['%' . $searchTerm . '%']

            );
        }

        // ====================================
        // FILTER STATUS
        // ====================================

        if ($request->filled('status')) {

            $query->where(

                'status',

                $request->status

            );
        }

        // ====================================
        // PAGINATION
        // ====================================

        $reports = $query

            ->latest()

            ->paginate(10)

            ->withQueryString();

        return view(

            'staff.list',

            compact('reports')

        );
    }
}