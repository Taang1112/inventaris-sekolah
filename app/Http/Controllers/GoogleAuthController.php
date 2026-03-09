<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {

            $google_user = Socialite::driver('google')->user();

            // cek apakah user sudah ada berdasarkan email
            $user = User::where('email', $google_user->getEmail())->first();

            if (!$user) {

                // jika belum ada → buat user baru
                $user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'password' => bcrypt('google-login')
                ]);

            } else {

                // jika user ada tapi belum punya google_id
                if (!$user->google_id) {
                    $user->google_id = $google_user->getId();
                    $user->save();
                }

            }

            Auth::login($user);

            return redirect()->intended('/dashboard');

        } catch (\Exception $e) {

            return redirect('/login')->with('error','Login Google gagal');

        }
    }
}