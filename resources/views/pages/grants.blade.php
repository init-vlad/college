@extends('layouts.app')

@section('title', 'Гранты и скидки - ICB')

@section('content')
    <section class="section" style="padding-top: calc(80px + var(--space-3xl));">
        <div class="section-header">
            <h1 class="section-title">Гранты и скидки</h1>
            <p class="section-description">
                Ежегодно мы предоставляем 100 грантов на обучение и выгодные скидки для различных категорий студентов.
                Ознакомьтесь с актуальными предложениями.
            </p>
        </div>

        <div class="grants-grid">
            <div class="grant-card card animate-fade-in">
                <div class="grant-image">
                    <img src="{{ asset('img/provent.png') }}" alt="Грант для отличников">
                </div>
                <div class="grant-content">
                    <h3 class="card-title">Грант для отличников</h3>
                    <p class="card-description">
                        <strong>Период проведения:</strong> с 25 июня по 14 августа<br>
                        <strong>Количество грантов:</strong> 150<br>
                        <strong>Специальности:</strong> Менеджмент и РПО<br>
                        Конкурс проводится в соответствии с приказом МОН РК.
                    </p>
                    <div class="grant-badge">
                        <span class="badge grant-excellent">100% покрытие</span>
                    </div>
                </div>
            </div>

            <div class="grant-card card animate-fade-in">
                <div class="grant-image">
                    <img src="{{ asset('img/med.png') }}" alt="Директорский грант">
                </div>
                <div class="grant-content">
                    <h3 class="card-title">Директорский грант</h3>
                    <p class="card-description">
                        <strong>Скидка:</strong> 100% на первый год обучения<br>
                        <strong>Период подачи заявок:</strong> с 1 по 31 августа<br>
                        Отличная возможность начать обучение бесплатно!
                    </p>
                    <div class="grant-badge">
                        <span class="badge grant-director">100% скидка</span>
                    </div>
                </div>
            </div>

            <div class="grant-card card animate-fade-in">
                <div class="grant-image">
                    <img src="{{ asset('img/inval.png') }}" alt="Социальные скидки">
                </div>
                <div class="grant-content">
                    <h3 class="card-title">Социальные скидки</h3>
                    <p class="card-description">
                        <strong>30% скидка для:</strong><br>
                        • Студентов-сирот<br>
                        • Студентов-инвалидов<br>
                        • Студентов, чьи родители оба инвалиды 1-й и 2-й групп<br><br>
                        <strong>10% скидка для:</strong><br>
                        • Студентов из многодетных семей
                    </p>
                    <div class="grant-badge">
                        <span class="badge grant-social">До 30% скидка</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
