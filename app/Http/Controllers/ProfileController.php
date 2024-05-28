<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profile = User::findOrFail($id);

        return view('profile.index', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProfile(Request $request, string $id)
    {
        $profile = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$profile->id,
            'phone_number' => 'required|string|unique:App\Models\User,phone_number,'.$profile->id,
        ]);

        try {
            $profile->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number']
            ]);

            return redirect()->back()->with('success', 'Profile updated successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updatePassword(Request $request, string $id)
    {
        $profile = User::findOrFail($id);

        $data = $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|confirmed|min:8|different:current_password',
        ]);

        try {
            if(!Hash::check($data['current_password'], $profile->password)) {
                return redirect()->back()->with('error', 'Current password not match our record.');

            }
            else {
                $profile->update([
                    'password' => Hash::make($data['password']),
                ]);

                return redirect()->back()->with('success', 'Password updated successfully.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
