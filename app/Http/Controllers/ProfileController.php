<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\UpdatePasswordRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Models\User;
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

    public function update(UpdateProfileRequest $request)
    {
        // Get all validated data
        $data = $request->validated();
        
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

    public function updatePassword(UpdatePasswordRequest $request)
    {
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
