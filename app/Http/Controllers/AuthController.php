<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report; // Pastikan Model Report di-import
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function updateProfile(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // 1. Validasi Input
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'current_password' => 'nullable|required_with:password',
            'password' => 'nullable|min:8',
        ]);

        // 2. Logika Update Password (Opsional)
        if ($request->filled('current_password')) {
            // Memverifikasi password lama
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password lama yang Anda masukkan salah!']);
            }

            // Mengupdate ke password baru
            $user->password = Hash::make($request->password);
        }

        // 3. Update Username
        $user->name = $request->name;

        // 4. Update Foto
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($user->photo && Storage::disk('public')->exists('photos/' . $user->photo)) {
                Storage::disk('public')->delete('photos/' . $user->photo);
            }

            // Simpan foto baru
            $filename = time() . '.' . $request->photo->getClientOriginalExtension();
            $path = $request->file('photo')->storeAs('photos', $filename, 'public');
            $user->photo = $filename;
        }

        // 5. Simpan Perubahan
        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
class AuthController extends Controller
{
    // --- FUNGSI LOGIN ---
  public function login(Request $request)
{
    // =====================================
    // VALIDASI
    // =====================================
    $request->validate([

        'login' => 'required',

        'password' => 'required'

    ]);

    // =====================================
    // DETEKSI LOGIN
    // =====================================
    $loginInput = $request->login;

    // Jika angka = nik
    if (is_numeric($loginInput)) {

        $credentials = [

            'nik' => $loginInput,

            'password' => $request->password

        ];

    } else {

        // selain angka = Username
        $credentials = [

            'Username' => $loginInput,

            'password' => $request->password

        ];

    }

    // =====================================
    // LOGIN
    // =====================================
    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        $user = Auth::user();

        // =================================
        // STATUS USER
        // =================================
        if ($user->status !== 'active') {

            Auth::logout();

            return back()->withErrors([

                'loginError' =>
                'Akun Anda belum disetujui.'

            ]);

        }

        // =================================
        // ACTIVITY LOG
        // =================================
        ActivityLog::create([

            'user_id' => $user->id,

            'role' => $user->role,

            'activity' => 'login',

            'description' =>
                'User login ke sistem',

            'ip_address' => $request->ip(),

            'user_agent' => $request->userAgent(),

        ]);

        // =================================
        // REDIRECT ROLE
        // =================================
        if ($user->role == 'admin') {

            return redirect()
                ->route('admin.index');

        }

        if ($user->role == 'management') {

            return redirect()
                ->route('management.list');

        }

        if ($user->role == 'staff') {

            return redirect()
                ->route('staff.index');

        }

        return redirect('/');

    }

    // =====================================
    // ERROR LOGIN
    // =====================================
    return back()->withErrors([

        'loginError' =>
            'Username / NIK atau Password salah!'

    ]);
}
public function lastOnline()
{
    // Mengambil user dan relasi ke log aktivitas terakhir
    $users = User::with(['activityLogs' => function($query) {
        $query->latest();
    }])->get();

    return view('admin.last_online', compact('users'));
}
//guest only report
    public function store(Request $request)
{
    // 1. Validasi
    $request->validate([
        'nama_pelapor' => 'required|string|max:255',
        'Username' => 'required|Username',
        'nama_barang' => 'required|string|max:255',
        'deskripsi' => 'required|string',
    ]);

    // 2. Simpan Data
    $report = new Report();
    $report->nama_pelapor = $request->nama_pelapor;
    $report->Username = $request->Username;
    $report->nama_barang = $request->nama_barang;
    $report->deskripsi = $request->deskripsi;
    $report->status = 'diproses'; // Status default
    $report->save();
        
    // 3. Catat Log untuk Guest
    \App\Models\ActivityLog::create([
        'user_id' => null, // Guest tidak punya ID
        'role' => 'guest',  // Hardcode sebagai guest
        'activity' => 'submit_laporan',
        'description' => 'Guest (Pelapor: ' . $request->nama_pelapor . ') mengirim laporan baru.',
        'ip_address' => $request->ip(),
        'user_agent' => $request->userAgent(),
    ]);

    return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
}

// --- FUNGSI REGISTER ---
public function register(Request $request)
{
    // =====================================
    // VALIDASI
    // =====================================
    $request->validate([

        'name' => 'required|string|max:255',

        'Username' =>
            'required|string|min:4|unique:users,Username',

        'nik' =>
            'required|unique:users,nik',

        'password' =>
            'required|min:6'

    ], [

        'Username.unique' =>
            'Username sudah digunakan.',

        'nik.unique' =>
            'NIK sudah digunakan.'

    ]);

    // =====================================
    // CREATE USER
    // =====================================
    $user = User::create([

        'name' => $request->name,

        'Username' => $request->Username,

        'nik' => $request->nik,

        'password' =>
            Hash::make($request->password),

        'role' => 'staff',

        'status' => 'pending'

    ]);

    // =====================================
    // ACTIVITY LOG
    // =====================================
    ActivityLog::create([

        'user_id' => $user->id,

        'role' => 'staff',

        'activity' => 'create',

        'description' =>
            'Pendaftaran akun baru: '
            . $request->name .
            ' (' . $request->Username . ')',

        'ip_address' => $request->ip(),

    ]);

    // =====================================
    // REDIRECT
    // =====================================
    return redirect()
        ->route('login')
        ->with(
            'success',
            'Akun berhasil dibuat, menunggu approval!'
        );
}
    // --- BAGIAN BARANG (LOG AKTIVITAS BARANG) ---
    
    // Fungsi Update Status Barang (Dropdown Cepat)
    public function updateStatus(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        $oldStatus = $report->status;
        $report->status = $request->status;
        $report->save();

        // CATAT LOG: UPDATE STATUS BARANG
        ActivityLog::create([
            'user_id' => Auth::id(),
            'role' => Auth::user()->role,
            'activity' => 'update',
            'description' => "Mengubah status barang [{$report->nama_barang}] dari {$oldStatus} menjadi {$request->status}",
            'ip_address' => $request->ip(),
        ]);

        return back()->with('success', 'Status barang berhasil diperbarui!');
    }

    // --- MANAJEMEN USER (ADMIN) ---
public function userStore(Request $request)
{
    // =====================================
    // VALIDASI
    // =====================================
    $request->validate([

        'name' =>
            'required|string|max:255',

        'Username' =>
            'required|string|min:4|unique:users,Username',

        'nik' =>
            'nullable|unique:users,nik',

        'password' =>
            'required|min:6',

        'role' =>
            'required',

        'status' =>
            'required',

    ], [

        // USERNAME
        'Username.required' =>
            'Username wajib diisi.',

        'Username.unique' =>
            'Username sudah digunakan.',

        'Username.min' =>
            'Username minimal 4 karakter.',

        // NIK
        'nik.unique' =>
            'NIK sudah digunakan.',

        // PASSWORD
        'password.min' =>
            'Password minimal 6 karakter.',

    ]);

    // =====================================
    // CREATE USER
    // =====================================
    $newUser = User::create([

        'name' => $request->name,

        'Username' => $request->Username,

        'nik' => $request->nik,

        'password' => Hash::make(
            $request->password
        ),

        'role' => $request->role,

        'status' => $request->status,

    ]);

    // =====================================
    // ACTIVITY LOG
    // =====================================
    ActivityLog::create([

        'user_id' => Auth::id(),

        'role' => Auth::user()->role,

        'activity' => 'create',

        'description' =>
            'Menambahkan user baru: '
            . $newUser->name .
            ' (' . $newUser->Username . ')',

        'ip_address' => $request->ip(),

    ]);

    // =====================================
    // REDIRECT
    // =====================================
    return redirect()
        ->route('admin.users')
        ->with(
            'success',
            'Akun user baru berhasil ditambahkan!'
        );
}


    public function userUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $oldName = $user->name;

        $user->name = $request->name;
       $user->nik = $request->nik;
        $user->role = $request->role;
        $user->status = $request->status;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'role' => Auth::user()->role,
            'activity' => 'update',
            'description' => 'Mengupdate data user: ' . $oldName,
            'ip_address' => $request->ip(),
        ]);
        
        return redirect()->route('admin.users')->with('success', 'User berhasil diupdate');
    }

    public function userDelete($id)
    {
        $user = User::findOrFail($id);

        if ($user->id == Auth::id()) { 
            return back()->with('error', 'Tidak bisa hapus akun sendiri');
        }

        $deletedName = $user->name;
        $user->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'role' => Auth::user()->role,
            'activity' => 'delete',
            'description' => 'Menghapus user: ' . $deletedName,
            'ip_address' => request()->ip(),
        ]);

        return back()->with('success', 'User berhasil dihapus');
    }

    // --- LOGOUT ---
    public function logout(Request $request)
    {
        if(Auth::check()){
            $user = Auth::user(); // Simpan data user dulu sebelum logout
    
            // 1. Catat Log ke Database
            ActivityLog::create([
                'user_id' => $user->id,
                'role' => $user->role,
                'activity' => 'logout',
                'description' => 'User keluar dari sistem',
                'ip_address' => $request->ip(),
            ]);
    
            // 2. HAPUS CACHE ONLINE (PENTING!)
            // Ini yang membuat titik hijau langsung jadi abu-abu tanpa menunggu 5 menit
            \Illuminate\Support\Facades\Cache::forget('user-is-online-' . $user->id);
        }
    
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }

    
    // --- FUNGSI PENDUKUNG ---
    public function userEdit($id) {
        $user = User::findOrFail($id);
        return view('admin.user_edit', compact('user')); 
    }

    public function userCreate() { return view('admin.user_create'); }

    public function userList() {
        $users = User::all(); 
        return view('admin.users', compact('users'));
    }

    public function approveUser($id) {
        $user = User::findOrFail($id);
        $user->status = 'active';
        $user->save();
        
        ActivityLog::create([
            'user_id' => Auth::id(),
            'role' => Auth::user()->role,
            'activity' => 'update',
            'description' => 'Menyetujui (Approve) user: ' . $user->name,
            'ip_address' => request()->ip(),
        ]);

        return back()->with('success', 'Akun Staff berhasil diaktifkan!');
    }
    public function petugasList(Request $request) 
    {
        // 1. Cek Hak Akses (Pastikan hanya Petugas)
        if (!Auth::check() || Auth::user()->role !== 'staff') {
            abort(403, 'Akses ditolak.');
        }
    
        $query = Report::query();
    
        // 2. Filter agar petugas hanya melihat data tertentu (opsional)
        // Jika ingin petugas melihat semua, biarkan saja. 
        // Jika ingin petugas hanya melihat laporan buatannya sendiri, aktifkan kode di bawah:
        // $query->where('user_id', Auth::id());
    
        // 3. Fitur Pencarian
        if ($request->filled('search')) {
            $searchTerm = strtolower($request->search);
            $query->whereRaw('LOWER(nama_barang) LIKE ?', ['%' . $searchTerm . '%']);
        }
    
        // 4. Fitur Filter Kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }
    
        // 5. Paginate (10 data per halaman)
        $reports = $query->latest()->paginate(10);
        
        // 6. Pertahankan parameter filter saat pindah halaman
        $reports->appends($request->all());
    
        return view('staff.list', compact('reports'));
    }
    public function showRegister() { return view('login.register'); }

    // Menampilkan list user yang pending untuk Management
public function managementUserList()
{
    // 1. Keamanan: Pastikan hanya role management yang bisa akses
    
        // Keamanan
        if (Auth::user()->role != 'management') {
            abort(403, 'Akses ditolak.');
        }
    
        // Data untuk tabel ATAS (Yang mau di-approve)
        $pendingUsers = User::where('status', 'pending')->get();
    
        // Data untuk tabel BAWAH (Daftar semua user aktif)
        // Variabel inilah yang dicari oleh Blade kamu agar tidak "Undefined"
        $users = User::where('status', 'active')->get(); 
    
        return view('management.users', compact('pendingUsers', 'users'));
    }


public function activityLogs()
{
    // SALAH: ActivityLog::latest()->get();
    // BENAR:
    $logs = ActivityLog::with('user')->latest()->paginate(10);

    return view('admin.activity_logs', compact('logs'));
}


public function dashboard()
{
    // 1. Ambil data statistik card
    $total = Report::count();
    $diproses = Report::where('status', 'diproses')->count();
    $claimed = Report::where('status', 'claimed')->count();
    $hilang = Report::where('status', 'hilang')->count();

    // 2. Ambil data grafik
    $dataFromDb = Report::selectRaw('MONTH(tanggal_laporan) as month, COUNT(*) as count')
        ->whereYear('tanggal_laporan', date('Y'))
        ->groupBy('month')
        ->pluck('count', 'month');

    $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    $data = [];
    for ($i = 1; $i <= 12; $i++) {
        $data[] = $dataFromDb->get($i, 0);
    }

    // 3. Ambil logs (karena di view Anda memanggil $logs)
    $logs = ActivityLog::with('user')->latest()->paginate(10);

    // KIRIM SEMUA VARIABEL
    return view('admin.home', compact('labels', 'data', 'total', 'diproses', 'claimed', 'hilang', 'logs'));
}


    }