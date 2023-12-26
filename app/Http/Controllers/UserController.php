<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.form');
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateUser($request);

        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.form', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $this->validateUser($request, $user->id);

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    /**
     * Validate user data.
     *
     * @param \Illuminate\Http\Request $request
     * @param int|null $userId
     * @return array
     */
    private function validateUser(Request $request, $userId = null)
    {
        $rules = [
            'name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($userId),
            ],
            'password' => 'required|min:6',
            'address' => 'required|string',
            'phone' => 'required|string',
            'nid' => 'required|string',
            'role' => 'required|in:Super_Admin,Admin,User,Restrict',
            'position' => 'required|in:MD,Manager,Accountant,Ticket_Seller,Driver,Helper,Worker',
        ];

        return $request->validate($rules);
    }
}
