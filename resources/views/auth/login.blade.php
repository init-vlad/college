@extends('layouts.app')

@section('title', 'Авторизация - College Portal')

@section('content')
    <div class="login-page">
        <div class="login-container">
            <div class="login-header">
                <h1>Вход</h1>
                <p>Войдите в свой аккаунт</p>
            </div>
            
            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
                
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-input @error('email') error @enderror" 
                           value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="error-message" style="display: block;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" id="password" name="password" class="form-input @error('password') error @enderror" required>
                    @error('password')
                        <div class="error-message" style="display: block;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="form-checkbox">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="checkmark"></span>
                        Запомнить меня
                    </label>
                </div>
                
                <button type="submit" class="login-btn">
                    Войти
                </button>
                
                @if ($errors->any())
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
                <a href="{{ route('register') }}">Нет аккаунта? Зарегистрироваться</a>
            </div>
            
            <div class="back-link">
                <a href="{{ route('home') }}">← Вернуться на главную</a>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .form-checkbox {
        display: flex;
        align-items: center;
        gap: var(--space-sm);
        cursor: pointer;
        font-size: 0.875rem;
    }

    .form-checkbox input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: hsl(var(--primary));
    }

    .form-input.error {
        border-color: hsl(var(--destructive));
        box-shadow: 0 0 0 3px hsl(var(--destructive) / 0.1);
    }
</style>
@endpush 