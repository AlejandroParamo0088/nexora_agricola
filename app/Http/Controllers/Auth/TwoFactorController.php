<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{
    public function index()
    {
        if (!session('two_factor_user_id')) {
            return redirect()->route('login');
        }

        return view('auth.two-factor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required', 'numeric']
        ]);

        $user = User::find(session('two_factor_user_id'));

        if (!$user) {
            return redirect()->route('login');
        }

        // Verificar expiración
        if ($user->two_factor_expires_at < now()) {

            session()->forget('two_factor_user_id');

            return redirect()->route('login')
                ->withErrors([
                    'code' => 'El código ha expirado.'
                ]);
        }

        // Verificar código
        if ($user->two_factor_code != $request->code) {

            return back()->withErrors([
                'code' => 'Código incorrecto.'
            ]);
        }

        // Limpiar OTP
        $user->two_factor_code = null;
        $user->two_factor_expires_at = null;
        $user->save();

        // Eliminar sesión temporal
        session()->forget('two_factor_user_id');

        // Login real
        Auth::login($user);

        request()->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }
}