<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:student,teacher'],
        ], [
            'name.required' => 'Имя обязательно для заполнения.',
            'name.min' => 'Имя должно содержать минимум 2 символа.',
            'email.required' => 'Email обязателен для заполнения.',
            'email.email' => 'Введите корректный email адрес.',
            'email.unique' => 'Пользователь с таким email уже существует.',
            'password.required' => 'Пароль обязателен для заполнения.',
            'password.min' => 'Пароль должен содержать минимум 8 символов.',
            'password.confirmed' => 'Пароли не совпадают.',
            'role.required' => 'Выберите роль пользователя.',
            'role.in' => 'Роль должна быть: студент или преподаватель.',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            Auth::login($user);

            // Redirect based on user role
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard')->with('success', 'Регистрация прошла успешно!');
                case 'teacher':
                    return redirect()->route('teacher.dashboard')->with('success', 'Регистрация прошла успешно!');
                case 'student':
                default:
                    return redirect()->route('student.dashboard')->with('success', 'Регистрация прошла успешно!');
            }

        } catch (\Exception $e) {
            return back()->withErrors([
                'general' => 'Произошла ошибка при регистрации. Попробуйте снова.',
            ])->withInput();
        }
    }
}
