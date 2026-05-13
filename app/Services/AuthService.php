<?php
namespace App\Services;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthService
{
    public function login($email,$password)
    {
        $user = User::whereEmail($email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return back()->withErrors(['email' => 'Invalid credentials.']);
        }else{
            Auth::login($user);
            return redirect()->route('dashboard');
        }
    }

    public function register($name, $email, $password)
    {
        // Implement your registration logic here
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
