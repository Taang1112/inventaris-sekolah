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

            // stateless supaya OAuth tidak ribut soal session di localhost
            $googleUser = Socialite::driver('google')->stateless()->user();

            // cari user berdasarkan email
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt('google-login')
                ]);

            } else {

                if (!$user->google_id) {
                    $user->google_id = $googleUser->getId();
                    $user->save();
                }

            }

            // login user
            Auth::login($user, true);

            // redirect ke dashboard
            return redirect('/dashboard');

        } catch (\Exception $e) {

            // tampilkan error asli supaya kelihatan kalau ada yang rusak
            dd($e->getMessage());
        }
    }
}