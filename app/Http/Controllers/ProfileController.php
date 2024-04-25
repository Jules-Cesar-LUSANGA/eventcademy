<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function show(User $user)
    {
        // Show the edit form or show informations
        if (auth()->id() == $user->id) {
            return view('profile.edit');
        } else {
            return view('profile.show', compact('user'));
        }
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string',
            'avatar' => 'nullable|image',            
        ]);

        // Get all validated data
        $data = $request->only('name', 'email');
        
        // Check if a new avatar is given

        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists

            if (auth()->user()->avatar !== null) {
                Storage::disk('public')->delete(auth()->user()->avatar);
            }
    
            // Store the new avatar and get its path
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');

        }

        // Update user data
        request()->user()->update($data);

        return back()->with('success', 'Informations modifiées');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string',        
        ]);

        // Check if current_password is correct

        if (Hash::check($request->input('current_password'), auth()->user()->password)) {
            
            // Update user password
            request()->user()->update([
                'password' => Hash::make($request->input('new_password')),
            ]);

            return back()->with('success', 'Mot de passe modifié');

        } else {
            return back()->with('error', 'Mot de passe actuel invalide');
        }
    }
}
