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

    public function register($credentials)
    {
        $email = $credentials['email'];
        $name = $credentials['name'];
        $password = $credentials['password'];

        if(User::whereEmail($email)->exists()){
            return back()->withErrors(['email' => 'Email already exists.']);
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
