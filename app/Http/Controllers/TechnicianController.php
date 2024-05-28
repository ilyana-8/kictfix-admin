<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TechnicianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technicians = User::where('role', User::TYPE_TECHNICIAN)->orderBy('created_at', 'ASC')->paginate(10);
        return view('technician.index', compact('technicians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('technician.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'matric_id' => 'required|integer|unique:users,matric_id',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
            'phone_number' => 'required|string',
        ]);

        try {
            User::create([
                'email' => $data['email'],
                'matric_id' => $data['matric_id'],
                'name' => $data['name'],
                'password' => Hash::make($data['password']),
                'phone_number' => $data['phone_number'],
                'role' => User::TYPE_TECHNICIAN
            ]);
            return redirect()->route('technician.index')->with('success', 'Technician registered successfully.');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $technician = User::findOrFail($id);
        return view('technician.show', compact('technician'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $technician = User::findOrFail($id);
        return view('technician.edit', compact('technician'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $technician = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'matric_id' => 'required|integer|unique:App\Models\User,matric_id,'.$technician->id,
            'email' => 'required|email|unique:users,email,'.$technician->id,
            'phone_number' => 'required|string|unique:App\Models\User,phone_number,'.$technician->id,
        ]);

        try {
            $technician->update([
                'name' => $data['name'],
                'matric_id' => $data['matric_id'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number']
            ]);

            return redirect()->back()->with('success', 'Technician updated successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updatePassword(Request $request, string $id)
    {
        $technician = User::findOrFail($id);

        $data = $request->validate([
            'password' => 'required|string|confirmed|min:8',
        ]);

        try {
            $technician->update([
                'password' => Hash::make($data['password']),
            ]);

            return redirect()->back()->with('success', 'Technician password updated successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $technician = User::findOrFail($id);

        try {
            $technician->delete();

            return redirect()->back()->with('success', 'Technician deleted successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. ' .$e->getMessage());
        }
    }

    public function searchTechnician(Request $request) {
        $query = $request->input('query');

        $technicians = User::where('role', User::TYPE_TECHNICIAN)
            ->where(function($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'LIKE', "%{$query}%")
                             ->orWhere('email', 'LIKE', "%{$query}%");
            })
            ->paginate(50);

        return view('technician.index', compact('technicians'));
    }
}
