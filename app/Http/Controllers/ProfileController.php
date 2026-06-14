<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    // ==========================================
    // UPDATE PROFILE
    // ==========================================

    public function updateProfile(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // ======================================
        // VALIDASI
        // ======================================
        $request->validate([

            'name' => 'required|string|max:255',

            'photo' =>
                'nullable|image|mimes:jpeg,png,jpg|max:2048',

            'current_password' =>
                'nullable|required_with:password',

            'password' =>
                'nullable|min:8',

        ]);

        // ======================================
        // UPDATE PASSWORD
        // ======================================
        if ($request->filled('current_password')) {

            if (
                !Hash::check(
                    $request->current_password,
                    $user->password
                )
            ) {

                return back()->withErrors([

                    'current_password' =>
                        'Password lama yang Anda masukkan salah!'

                ]);

            }

            $user->password =
                Hash::make($request->password);

        }

        // ======================================
        // UPDATE NAME
        // ======================================
        $user->name = $request->name;

        // ======================================
        // UPDATE FOTO
        // ======================================
        if ($request->hasFile('photo')) {

            if (
                $user->photo &&
                Storage::disk('public')->exists(
                    'photos/' . $user->photo
                )
            ) {

                Storage::disk('public')->delete(
                    'photos/' . $user->photo
                );

            }

            $filename =
                time() . '.' .
                $request->photo
                    ->getClientOriginalExtension();

            $request->file('photo')->storeAs(
                'photos',
                $filename,
                'public'
            );

            $user->photo = $filename;

        }

        // ======================================
        // CEK ADA PERUBAHAN
        // ======================================
        if (!$user->isDirty()) {

            return back()->with(
                'info',
                'Tidak ada perubahan data.'
            );

        }

        // ======================================
        // SIMPAN
        // ======================================
        $user->save();

        // ======================================
        // SUCCESS
        // ======================================
        return back()->with(
            'success',
            'Profil berhasil diperbarui!'
        );

    }

    // ==========================================
    // UPDATE FOTO BERDASARKAN ROLE
    // ==========================================

    public function updatePhoto(Request $request)
    {
        /** @var \App\Models\User $user */
$user = Auth::user();

$role = $user->role;
        if ($role == 'staff') {

            return $this->updatePhotoPetugas(
                $request
            );

        } elseif ($role == 'admin') {

            return $this->updatePhotoAdmin(
                $request
            );

        } else {

            return $this->updatePhotoManagement(
                $request
            );

        }
    }

    public function updatePhotoPetugas(
        Request $request
    ) {

        $this->handleUpload($request);

        return redirect()
            ->route('profile.index')
            ->with(
                'success',
                'Foto Staff berhasil diperbarui!'
            );
    }

    public function updatePhotoAdmin(
        Request $request
    ) {

        $this->handleUpload($request);

        return redirect()
            ->route('profile.indexA')
            ->with(
                'success',
                'Foto Admin berhasil diperbarui!'
            );
    }

    public function updatePhotoManagement(
        Request $request
    ) {

        $this->handleUpload($request);

        return redirect()
            ->route('profile.indexU')
            ->with(
                'success',
                'Foto Management berhasil diperbarui!'
            );
    }

    // ==========================================
    // HANDLE UPLOAD FOTO
    // ==========================================

    private function handleUpload($request)
    {
        $request->validate([

            'photo' =>
                'required|image|mimes:jpeg,png,jpg|max:2048'

        ]);

        /** @var \App\Models\User $user */
$user = Auth::user();

        if (
            $user &&
            $request->hasFile('photo')
        ) {

            if (
                $user->photo &&
                file_exists(
                    public_path(
                        'storage/photos/' .
                        $user->photo
                    )
                )
            ) {

                unlink(
                    public_path(
                        'storage/photos/' .
                        $user->photo
                    )
                );

            }

            $file = $request->file('photo');

            $filename =
                time() .
                '_' .
                uniqid() .
                '.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('storage/photos'),
                $filename
            );

            $user->update([

                'photo' => $filename

            ]);

        }
    }
}