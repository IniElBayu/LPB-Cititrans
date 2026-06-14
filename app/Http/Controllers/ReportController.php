<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    // ==========================================
    // --- DASHBOARD & VIEW AREA ---
    // ==========================================

    public function adminIndex() {
        if (!Auth::check() || Auth::user()->role != 'admin') { abort(403); }
        return view('admin.index');
    }

    public function edit($id)
    {
        // Ubah variabel $item menjadi $report
        $report = Report::findOrFail($id); 
        
        // Ubah compact('item') menjadi compact('report')
        return view('admin.edit', compact('report'));
    }

    public function adminHome() {
        $total = Report::count();
        $diproses = Report::where('status', 'diproses')->count();
        $claimed = Report::where('status', 'claimed')->count();
        $hilang = Report::where('status', 'hilang')->count();
        $logs = ActivityLog::latest()->paginate(10);

        return view('admin.home', compact('total', 'diproses', 'claimed', 'hilang', 'logs'));
    }

    public function create()
    {
        return view('input_g'); // Mengarah ke resources/views/input_g.blade.php
    }
    
    public function list(Request $request)
{
    // =========================================
    // QUERY REPORT
    // =========================================
    $query = Report::query();

    // =========================================
    // SEARCH NAMA BARANG
    // =========================================
    if ($request->filled('search')) {

        $searchTerm =
            strtolower($request->search);

        $query->whereRaw(
            'LOWER(nama_barang) LIKE ?',
            ['%' . $searchTerm . '%']
        );

    }

    // =========================================
    // FILTER KATEGORI
    // =========================================
    if ($request->filled('kategori')) {

        $query->where(
            'kategori',
            $request->kategori
        );

    }

    // =========================================
    // FILTER STATUS
    // =========================================
    if ($request->filled('status')) {

        $query->where(
            'status',
            $request->status
        );

    }

    // =========================================
    // PAGINATION
    // =========================================
    $reports = $query
        ->latest()
        ->paginate(10)
        ->withQueryString();

    // =========================================
    // RETURN VIEW
    // =========================================
    return view(
        'admin.list',
        compact('reports')
    );
}
    
    public function home(Request $request) 
    {
        // 1. Ambil data input dari form
        $search = $request->input('search');
        $kategori = $request->input('kategori');

        // 2. Query dasar
        $query = Report::query();

        // 3. Filter berdasarkan kategori
        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        // 4. Filter berdasarkan nama barang (Case Insensitive)
        if ($search) {
            $query->whereRaw('LOWER(nama_barang) LIKE ?', ['%' . strtolower($search) . '%']);
        }

        // 5. Tentukan jumlah tampilan berdasarkan role
            if (Auth::check() && in_array(Auth::user()->role, ['admin', 'staff', 'management'])) {
                // Admin dkk melihat SEMUA hasil dengan pagination (misal 10 data per halaman)
                // Ini akan memperbaiki error "Method firstItem does not exist"
                $reports = $query->latest()->get();
            } else {
                // Guest hanya melihat 5 hasil pencarian terbaru
                // Karena hanya 5 dan tidak pakai urutan halaman, kita gunakan get()
                // Tapi agar tidak error di view, kita buat seolah-olah ini juga hasil pagination
                $reports = $query->latest()->take(5)->get();
            }

        // 6. Hitung statistik (tetap tampilkan total keseluruhan di dashboard)
        $total = Report::count();
        $diproses = Report::where('status', 'diproses')->count();
        $claimed = Report::where('status', 'claimed')->count();
        $hilang = Report::where('status', 'hilang')->count();

        return view('home', compact('total', 'diproses', 'claimed', 'hilang', 'reports'));
    }

    // ==========================================
    // --- CORE LOGIC: CRUD BARANG + LOGS ---
    // ==========================================

    // ---> TAMBAHAN FUNGSI PRINT <---
    public function print($id)
    {
        // 1. Ambil data laporan berdasarkan ID
        $report = Report::findOrFail($id);

        // 2. Catat log aktivitas (Opsional, tapi bagus untuk tracking siapa yang mencetak)
        ActivityLog::create([
            'user_id'     => Auth::id() ?? null,
            'role'        => Auth::check() ? Auth::user()->role : 'guest',
            'activity'    => 'print',
            'description' => (Auth::check() ? Auth::user()->name : 'Guest') . ' mencetak dokumen LPB untuk barang: ' . $report->nama_barang,
            'ip_address'  => request()->ip(),
        ]);

        // 3. Kembalikan ke view print.blade.php
        // Pastikan Anda sudah membuat file resources/views/laporan/print.blade.php
        return view('laporan.print', compact('report'));
    }
    // -------------------------------

    public function store(Request $request) 
    {
        // 1. Validasi semua field baru
        $request->validate([
            'nama_barang'      => 'required|string|max:255',
            'kategori'         => 'required',
            'deskripsi'        => 'required', 
            'tanggal_laporan'  => 'required|date',
            'nik_pelapor'      => 'required|string', 
            'nama_pelapor'     => 'required|string',
            'jabatan_pelapor'  => 'required|string',
            'tipe_lokasi'      => 'required|in:unit,pool', 
            'lokasi_ditemukan' => 'required|string',
            'foto_barang'      => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'cs_name'          => 'required|string',
            'rute'             => 'nullable|string', 
            'tanggal_rute'     => 'nullable|date',   
        ]);

        $report = new Report();
        
        $report->fill($request->all());

        if ($request->tipe_lokasi == 'unit') {
            $report->nomor_kendaraan = $request->nomor_kendaraan;
        } else {
            $report->nomor_kendaraan = $request->nama_pool;
        }

        $report->status = 'diproses';

        if ($request->hasFile('foto_barang')) {
            $path = $request->file('foto_barang')->store('uploads', 'public');
            $report->foto_barang = $path;
        }

        $report->save();

        ActivityLog::create([
            'user_id'     => Auth::id() ?? null,
            'role'        => Auth::check() ? Auth::user()->role : 'guest',
            'activity'    => 'create',
            'description' => (Auth::check() ? Auth::user()->name : 'Guest') . ' menambahkan barang baru: ' . $report->nama_barang,
            'ip_address'  => $request->ip(),
        ]);

        return back()->with('success', 'Laporan Berhasil Disimpan!');
    }

    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string',
            'lokasi_ditemukan' => 'required|string',
            'foto_barang' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto_barang')) {
            if ($report->foto_barang && Storage::disk('public')->exists($report->foto_barang)) {
                Storage::disk('public')->delete($report->foto_barang);
            }
            $validatedData['foto_barang'] = $request->file('foto_barang')->store('uploads', 'public');
        }

        $report->update($validatedData);

        ActivityLog::create([
            'user_id'     => Auth::id() ?? null,
            'role'        => Auth::check() ? Auth::user()->role : 'guest',
            'activity'    => 'update',
            'description' => (Auth::check() ? Auth::user()->name : 'User') . ' mengupdate data barang: ' . $report->nama_barang,
            'ip_address'  => $request->ip(),
        ]);

        return back()->with(
    'success',
    'Data barang berhasil diperbarui!'
);
    }

    public function updateStatus(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        $oldStatus = $report->status;
        $report->status = $request->status;
        $report->save();

        ActivityLog::create([
            'user_id'     => Auth::id() ?? null,
            'role'        => Auth::check() ? Auth::user()->role : 'guest',
            'activity'    => 'update_status',
            'description' => (Auth::check() ? Auth::user()->name : 'User') . " mengubah status [{$report->nama_barang}] dari {$oldStatus} menjadi {$request->status}",
            'ip_address'  => $request->ip(),
        ]);

        return back()->with('success', 'Status berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        if ($report->foto_barang && Storage::disk('public')->exists($report->foto_barang)) {
            Storage::disk('public')->delete($report->foto_barang);
        }
        
        ActivityLog::create([
            'user_id'     => Auth::id() ?? null,
            'role'        => Auth::check() ? Auth::user()->role : 'guest',
            'activity'    => 'delete',
            'description' => (Auth::check() ? Auth::user()->name : 'User') . ' menghapus data: ' . $report->nama_barang,
            'ip_address'  => request()->ip(),
        ]);

        $report->delete();
        return redirect()->back();
    }

    // ==========================================
    // --- ADMIN & MANAGEMENT AREA ---
    // ==========================================

    public function petugasList() {
        if (!Auth::check() || Auth::user()->role !== 'staff') {
            abort(403, 'Akses ditolak.');
        }

        $reports = Report::latest()->get(); 
        
        return view('staff.list', compact('reports'));
    }

    public function adminList(Request $request) 
    {
        if (!Auth::check() || Auth::user()->role != 'admin') { abort(403); }
        $reports = Report::latest()->get();
        return view('admin.list', compact('reports'));
    }

    public function petugasIndex() 
    {
      if (!Auth::check() || Auth::user()->role !== 'staff'){
            abort(403, 'Akses ditolak.');
        }

        return view('staff.index'); 
    }

    public function approve($id) {
        User::where('id', $id)->update(['status' => 'approved']);
        return back()->with('success', 'User approved');
    }

    public function reject($id) {
        User::where('id', $id)->update(['status' => 'rejected']);
        return back()->with('success', 'User ditolak');
    }

   public function managementList(Request $request)
{
    // =========================================
    // CEK HAK AKSES
    // =========================================
    if (
        !Auth::check() ||
        Auth::user()->role !== 'management'
    ) {

        abort(
            403,
            'Anda tidak memiliki akses ke halaman ini.'
        );

    }

    // =========================================
    // QUERY REPORT
    // =========================================
    $query = Report::query();

    // =========================================
    // SEARCH NAMA BARANG
    // =========================================
    if ($request->filled('search')) {

        $searchTerm =
            strtolower($request->search);

        $query->whereRaw(
            'LOWER(nama_barang) LIKE ?',
            ['%' . $searchTerm . '%']
        );

    }

    // =========================================
    // FILTER KATEGORI
    // =========================================
    if ($request->filled('kategori')) {

        $query->where(
            'kategori',
            $request->kategori
        );

    }

    // =========================================
    // FILTER STATUS
    // =========================================
    if ($request->filled('status')) {

        $query->where(
            'status',
            $request->status
        );

    }

    // =========================================
    // PAGINATION
    // =========================================
    $reports = $query
        ->latest()
        ->paginate(10)
        ->withQueryString();

    // =========================================
    // RETURN VIEW
    // =========================================
    return view(
        'management.list',
        compact('reports')
    );
}
    }