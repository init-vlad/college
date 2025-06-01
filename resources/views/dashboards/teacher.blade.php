@extends('layouts.app')

@section('title', 'Кабинет преподавателя - College Portal')

@section('content')
    <div class="section">
        <div class="section-header">
            <h1 class="section-title">Кабинет преподавателя</h1>
            <p class="section-description">Добро пожаловать, {{ Auth::user()->name }}!</p>
        </div>

        <div class="advantages-grid">
            <div class="advantage-card">
                <div class="advantage-icon">
                    <span class="advantage-badge">📅</span>
                </div>
                <div class="advantage-content">
                    <h3 class="card-title">Мое расписание</h3>
                    <p class="card-description">Просмотр и управление вашим расписанием занятий</p>
                    <button class="btn btn-primary">Просмотреть</button>
                </div>
            </div>

            <div class="advantage-card">
                <div class="advantage-icon">
                    <span class="advantage-badge">👥</span>
                </div>
                <div class="advantage-content">
                    <h3 class="card-title">Мои группы</h3>
                    <p class="card-description">Список групп, которые вы ведете</p>
                    <button class="btn btn-primary">Посмотреть</button>
                </div>
            </div>

            <div class="advantage-card">
                <div class="advantage-icon">
                    <span class="advantage-badge">📊</span>
                </div>
                <div class="advantage-content">
                    <h3 class="card-title">Журнал оценок</h3>
                    <p class="card-description">Выставление оценок и отметок посещаемости</p>
                    <button class="btn btn-primary">Открыть</button>
                </div>
            </div>

            <div class="advantage-card">
                <div class="advantage-icon">
                    <span class="advantage-badge">📚</span>
                </div>
                <div class="advantage-content">
                    <h3 class="card-title">Материалы курса</h3>
                    <p class="card-description">Загрузка и управление учебными материалами</p>
                    <button class="btn btn-primary">Управлять</button>
                </div>
            </div>
        </div>
    </div>
@endsection
