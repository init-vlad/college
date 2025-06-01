@extends('layouts.app')

@section('title', 'Регистрация - College Portal')

@section('content')
    <div class="login-page">
        <div class="login-container">
            <div class="login-header">
                <h1>Регистрация</h1>
                <p>Создайте новый аккаунт</p>
            </div>
            
            <form method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf
                
                <div class="form-group">
                    <label for="name" class="form-label">Полное имя</label>
                    <input type="text" id="name" name="name" class="form-input @error('name') error @enderror" 
                           value="{{ old('name') }}" required placeholder="Введите ваше полное имя">
                    @error('name')
                        <div class="error-message" style="display: block;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-input @error('email') error @enderror" 
                           value="{{ old('email') }}" required placeholder="Введите ваш email">
                    @error('email')
                        <div class="error-message" style="display: block;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" id="password" name="password" class="form-input @error('password') error @enderror" 
                           required placeholder="Минимум 8 символов">
                    @error('password')
                        <div class="error-message" style="display: block;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Подтвердите пароль</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" 
                           required placeholder="Повторите пароль">
                </div>

                <div class="form-group">
                    <label for="role" class="form-label">Роль</label>
                    <div class="role-selector">
                        <label class="role-option">
                            <input type="radio" name="role" value="student" {{ old('role', 'student') == 'student' ? 'checked' : '' }}>
                            <span class="role-label">
                                <span class="role-icon">🎓</span>
                                <div>
                                    <strong>Студент</strong>
                                    <p>Доступ к расписанию и материалам</p>
                                </div>
                            </span>
                        </label>
                        
                        <label class="role-option">
                            <input type="radio" name="role" value="teacher" {{ old('role') == 'teacher' ? 'checked' : '' }}>
                            <span class="role-label">
                                <span class="role-icon">👨‍🏫</span>
                                <div>
                                    <strong>Преподаватель</strong>
                                    <p>Управление расписанием и группами</p>
                                </div>
                            </span>
                        </label>
                    </div>
                    @error('role')
                        <div class="error-message" style="display: block;">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="login-btn">
                    Зарегистрироваться
                </button>
                
                @if ($errors->any() && !$errors->has('name') && !$errors->has('email') && !$errors->has('password') && !$errors->has('role'))
                    <div class="error-message" style="display: block;">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
                
                @if (session('status'))
                    <div class="success-message" style="display: block;">
                        {{ session('status') }}
                    </div>
                @endif
            </form>
            
            <div class="back-link">
                <a href="{{ route('login') }}">← Уже есть аккаунт? Войти</a>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .form-input.error {
        border-color: hsl(var(--destructive));
        box-shadow: 0 0 0 3px hsl(var(--destructive) / 0.1);
    }
</style>
@endpush 