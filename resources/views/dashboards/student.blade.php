@extends('layouts.app')

@section('title', 'Кабинет студента - College Portal')

@section('content')
    <div class="section">
        <div class="section-header">
            <h1 class="section-title">Кабинет студента</h1>
            <p class="section-description">Добро пожаловать, {{ Auth::user()->name }}!</p>
        </div>

        <div class="advantages-grid">
            <div class="advantage-card">
                <div class="advantage-icon">
                    <span class="advantage-badge">📅</span>
                </div>
                <div class="advantage-content">
                    <h3 class="card-title">Расписание занятий</h3>
                    <p class="card-description">Просмотр актуального расписания занятий</p>
                    <button class="btn btn-primary">Просмотреть</button>
                </div>
            </div>

            <div class="advantage-card">
                <div class="advantage-icon">
                    <span class="advantage-badge">📚</span>
                </div>
                <div class="advantage-content">
                    <h3 class="card-title">Учебные материалы</h3>
                    <p class="card-description">Доступ к лекциям, заданиям и дополнительным материалам</p>
                    <button class="btn btn-primary">Открыть</button>
                </div>
            </div>

            <div class="advantage-card">
                <div class="advantage-icon">
                    <span class="advantage-badge">📊</span>
                </div>
                <div class="advantage-content">
                    <h3 class="card-title">Оценки</h3>
                    <p class="card-description">Просмотр текущих оценок и академической успеваемости</p>
                    <button class="btn btn-primary">Посмотреть</button>
                </div>
            </div>

            <div class="advantage-card">
                <div class="advantage-icon">
                    <span class="advantage-badge">👥</span>
                </div>
                <div class="advantage-content">
                    <h3 class="card-title">Группа</h3>
                    <p class="card-description">Информация о вашей группе и одногруппниках</p>
                    <button class="btn btn-primary">Перейти</button>
                </div>
            </div>
        </div>
    </div>
@endsection 