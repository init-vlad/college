@extends('layouts.app')

@section('title', 'Админ панель - College Portal')

@section('content')
    <div class="section">
        <div class="section-header">
            <h1 class="section-title">Административная панель</h1>
            <p class="section-description">Добро пожаловать, {{ Auth::user()->name }}!</p>
        </div>

        <div class="advantages-grid">
            <div class="advantage-card">
                <div class="advantage-icon">
                    <span class="advantage-badge">👥</span>
                </div>
                <div class="advantage-content">
                    <h3 class="card-title">Управление пользователями</h3>
                    <p class="card-description">Просмотр и управление преподавателями и студентами</p>
                    <a href="/admin" class="btn btn-primary" target="_blank">Перейти в Filament</a>
                </div>
            </div>

            <div class="advantage-card">
                <div class="advantage-icon">
                    <span class="advantage-badge">📅</span>
                </div>
                <div class="advantage-content">
                    <h3 class="card-title">Управление расписанием</h3>
                    <p class="card-description">Создание и редактирование расписания занятий</p>
                    <a href="/admin" class="btn btn-primary" target="_blank">Управлять</a>
                </div>
            </div>

            <div class="advantage-card">
                <div class="advantage-icon">
                    <span class="advantage-badge">📊</span>
                </div>
                <div class="advantage-content">
                    <h3 class="card-title">Статистика</h3>
                    <p class="card-description">Просмотр статистики по студентам и курсам</p>
                    <a href="/admin" class="btn btn-primary" target="_blank">Просмотреть</a>
                </div>
            </div>
        </div>
    </div>
@endsection 