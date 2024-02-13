<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    { 
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_type' => ['required', 'integer'],
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Corrected to 'profile_picture'
        ]);
        
        // Store profile image
        if ($request->hasFile('profile_picture')) { // Corrected to 'profile_picture'
            $imagePath = $request->file('profile_picture')->store('profile_pictures');
        } else {
            $imagePath = null;
        }
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
            'image' => $imagePath,
        ]);
        
        event(new Registered($user));
    
        Auth::login($user);
    
        if ($request->user_type == 1) {
            return redirect(RouteServiceProvider::HOME);
        } else {
            return redirect()->route('doctors.show', ['id' => $user->id]);
        }
    }
    
}