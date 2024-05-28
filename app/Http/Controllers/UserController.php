<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', User::TYPE_USER)->orderBy('created_at', 'ASC')->paginate(10);
        return view('users.index', compact('users'));
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'matric_id' => 'required|integer|unique:App\Models\User,matric_id,'.$user->id,
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone_number' => 'required|string|unique:App\Models\User,phone_number,'.$user->id,
        ]);

        try {
            $user->update([
                'name' => $data['name'],
                'matric_id' => $data['matric_id'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number']
            ]);

            return redirect()->back()->with('success', 'User updated successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updatePassword(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'password' => 'required|string|confirmed|min:8',
        ]);

        try {
            $user->update([
                'password' => Hash::make($data['password']),
            ]);

            return redirect()->back()->with('success', 'User password updated successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        try {
            $user->delete();

            return redirect()->route('user.index')->with('success', 'User deleted successfully.');

        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('error', 'Something went wrong. ' .$e->getMessage());
        }
    }

    public function searchUser(Request $request) {
        $query = $request->input('query');

        $users = User::where('role', User::TYPE_USER)
            ->where(function($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'LIKE', "%{$query}%")
                             ->orWhere('email', 'LIKE', "%{$query}%");
            })
            ->paginate(50);

        return view('users.index', compact('users'));
    }
}
