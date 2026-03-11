<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        // harus stateless juga
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function callbackGoogle()
    {
        try {

            $googleUser = Socialite::driver('google')->stateless()->user();

            // cari user
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt('google-login')
                ]);

            } else {

                // kalau user sudah ada tapi belum punya google_id
                if (!$user->google_id) {
                    $user->google_id = $googleUser->getId();
                    $user->save();
                }

            }

            // login
            Auth::login($user);

            return redirect()->intended('/dashboard');

        } catch (\Exception $e) {

            return redirect('/login')->with('error','Login Google gagal');

        }
    }
}