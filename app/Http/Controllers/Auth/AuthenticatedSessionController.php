<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login-spcs');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        
        $userRole = User::query()->where('id',Auth::user()->id)->with('roles')->first()->roles->first()->name;

        switch ($userRole) {
            case 'admin':
                Log::info("User with Id: " . Auth::user()->id . " and name: " . Auth::user()->name . " logged in as admin");
                return redirect()->route('admin-dashboard');
                break;

            case 'instructor':
                Log::info("User with Id: " . Auth::user()->id . " and name: " . Auth::user()->name . " logged in as instructor");
                return redirect()->route('instructor-dashboard');
                break;

            case 'student':
                Log::info("User with Id: " . Auth::user()->id . " and name: " . Auth::user()->name . " logged in as student");
                return redirect()->route('spcs-dashboard');
                break;

            default:
                Log::info("User with Id: " . Auth::user()->id . " and name: " . Auth::user()->name . " logged in as student");
                return redirect()->route('spcs-dashboard');
                break;
        }
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Log::info("User with Id: " . Auth::user()->id . " and name: " . Auth::user()->name . " logged out as " . Auth::user()->roles->first()->name);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
