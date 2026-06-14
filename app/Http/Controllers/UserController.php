<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ActivityLog;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /* =========================================
       USER LIST
    ========================================= */

    public function userList()
    {
        $users = User::all();

        return view(
            'admin.users',
            compact('users')
        );
    }

    /* =========================================
       LAST ONLINE
    ========================================= */

    public function lastOnline()
    {
        $users = User::with([
            'activityLogs' => function($query){

                $query->latest();

            }
        ])->get();

        return view(
            'admin.last_online',
            compact('users')
        );
    }

    /* =========================================
       STORE USER
    ========================================= */

    public function userStore(Request $request)
    {

        /* VALIDATION */
        $request->validate([

            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'Username' => [
                'required',
                'string',
                'min:4',
                'unique:users,Username',
                'unique:users,email'
            ],

            'nik' => [
                'nullable',
                'unique:users,nik'
            ],

            'password' => [
                'required',
                'min:6'
            ],

            'role' => [
                'required'
            ],

            'status' => [
                'required'
            ],

        ], [

            /* USERNAME */
            'Username.required' =>
                'Username wajib diisi.',

            'Username.unique' =>
                'Username sudah digunakan.',

            'Username.min' =>
                'Username minimal 4 karakter.',

            /* NIK */
            'nik.unique' =>
                'NIK sudah dipakai user lain.',

            /* PASSWORD */
            'password.required' =>
                'Password wajib diisi.',

            'password.min' =>
                'Password minimal 6 karakter.',

            /* ROLE */
            'role.required' =>
                'Role wajib dipilih.',

            /* STATUS */
            'status.required' =>
                'Status akun wajib dipilih.',

        ]);

        /* CREATE USER */
      $newUser = User::create([

    'name' => $request->name,

    'Username' => $request->Username,

    'email' =>
        $request->Username . '@cititrans.local',

    'nik' => $request->nik ?: null,

    'password' => Hash::make(
        $request->password
    ),

    'role' => $request->role,

    'status' => $request->status,

]);

        /* ACTIVITY LOG */
        ActivityLog::create([

            'user_id' => Auth::id(),

            'role' => Auth::user()->role,

            'activity' => 'create',

            'description' =>
                'Menambahkan user baru: '
                . $newUser->name,

            'ip_address' => $request->ip(),

        ]);

        /* REDIRECT */
        return redirect()
            ->back()
            ->with(
                'success',
                'User berhasil ditambahkan!'
            );
    }

    /* =========================================
       APPROVE USER
    ========================================= */

    public function approveUser($id)
    {
        $user = User::findOrFail($id);

        $user->status = 'active';

        $user->save();

        ActivityLog::create([

            'user_id' => Auth::id(),

            'activity' => 'update',

            'description' =>
                'Menyetujui user: '
                . $user->name,

            'ip_address' => request()->ip(),

        ]);

        return back()->with(
            'success',
            'Akun telah diaktifkan!'
        );
    }
}