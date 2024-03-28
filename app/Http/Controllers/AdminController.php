<?php

namespace App\Http\Controllers;

use AllowDynamicProperties;
use App\Models\Assets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

#[AllowDynamicProperties] class AdminController extends Controller
{
    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function _login()
    {
        if (Auth::check()) return redirect('/admin');
        return view('admin.login');
    }

    public function _loginHandle(Request $request)
    {
        if (Auth::check()) return redirect('/admin');

        $credentials = $request->validate([
            'login' => 'required|exists:users,login',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return response()->json([
                'error' => false
            ]);
        }

        return response()->json([
            'error' => true,
            'error_message' => 'Incorrect login or password'
        ]);
    }

    public function _register()
    {
        if (Auth::check()) return redirect('/admin');
        return view('admin.register');
    }

    public function _registerHandle(Request $request)
    {
        if (Auth::check()) return redirect('/admin');

        $credentials = $request->validate([
            'login' => 'required|min:3|max:30',
            'password' => 'required|min:5|max:255',
        ]);

        if (User::query()->where('login','=', $credentials['login'])->exists()) {
            return response()->json([
                'error' => true,
                'error_message' => 'User with this login already exists'
            ]);
        }

        $user = new User();
        $user->login = $credentials['login'];
        $user->password = $credentials['password'];
        $user->save();

        if (Auth::attempt($credentials)) {
            return response()->json([
                'error' => false
            ]);
        }

        return response()->json([
            'error' => true,
            'error_message' => 'Incorrect login or password'
        ]);
    }

    public function _logout()
    {
        Auth::logout();

        return redirect(route('login'));
    }

    public function home()
    {
        return view('admin.pages.home');
    }

    public function users()
    {
        if (!$this->user->is_admin) return redirect(route('admin.home'));

        return view('admin.pages.users', [
            'users' => User::all()
        ]);
    }

    public function usersDelete(Request $request, int $id)
    {
        if (!$this->user->is_admin) return redirect(route('admin.home'));

        if ($id === Auth::id()) {
            return response()->json([
                'error' => true,
                'error_message' => 'Nope',
            ], 400);
        }

        try {
            User::query()
                ->where('id', '=', $id)
                ->delete()
            ;

            return response()->json([
                'error' => false
            ]);
        } catch (\Exception) {
            return response()->json([
                'error' => true,
                'error_message' => 'Failed delete user',
            ], 500);
        }
    }

    public function currencies()
    {
        if (!$this->user->is_admin) return redirect(route('admin.home'));

        return view('admin.pages.currencies', [
            'currencies' => Assets::all()
        ]);
    }

    public function currenciesDelete(Request $request, int $id)
    {
        if (!$this->user->is_admin) return redirect(route('admin.home'));

        try {
            Assets::query()
                ->where('id', '=', $id)
                ->delete()
            ;

            return response()->json([
                'error' => false
            ]);
        } catch (\Exception) {
            return response()->json([
                'error' => true,
                'error_message' => 'Failed delete currency',
            ], 500);
        }
    }

    public function currenciesAdd()
    {
        if (!$this->user->is_admin) return redirect(route('admin.home'));

        return view('admin.pages.currencies-add');
    }

    public function currenciesAddHandle(Request $request)
    {
        if (!$this->user->is_admin) return redirect(route('admin.home'));

        $validated = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'short_code' => 'required',
            'api_code' => 'required',
        ]);

        $assets = new Assets();
        $assets->name = $validated['name'];
        $assets->image = $validated['image'];
        $assets->short_code = $validated['short_code'];
        $assets->api_code = $validated['api_code'];
        $assets->save();

        return response()->json([
            'error' => false,
        ]);
    }
}
