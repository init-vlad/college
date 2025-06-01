@extends('layouts.app')

@section('title', 'Преимущества - ICB')

@section('content')
    <section class="section" style="padding-top: calc(80px + var(--space-3xl));">
        <div class="section-header">
            <h1 class="section-title">Наши преимущества</h1>
            <p class="section-description">
                Мы предлагаем качественное образование, современную материальную базу
                и гарантируем успешное трудоустройство наших выпускников.
            </p>
        </div>

        <div class="advantages-grid">
            <div class="advantage-card card animate-fade-in">
                <div class="advantage-icon">
                    <span class="advantage-badge">💼</span>
                </div>
                <div class="advantage-content">
                    <h3 class="card-title">100% трудоустройство</h3>
                    <p class="card-description">
                        Мы гарантируем, что наши выпускники успешно находят работу благодаря
                        качественному обучению и востребованным специальностям.
                    </p>
                </div>
                <div class="advantage-image">
                    <img src="{{ asset('img2/труд.jpg') }}" alt="Трудоустройство">
                </div>
            </div>

            <div class="advantage-card card animate-fade-in">
                <div class="advantage-icon">
                    <span class="advantage-badge">👨‍🏫</span>
                </div>
                <div class="advantage-content">
                    <h3 class="card-title">Высококвалифицированные преподаватели</h3>
                    <p class="card-description">
                        Наш преподавательский состав состоит из опытных специалистов,
                        знающих современные тенденции в образовании.
                    </p>
                </div>
                <div class="advantage-image">
                    <img src="{{ asset('img/_DSC9532.jpg') }}" alt="Преподаватели">
                </div>
            </div>

            <div class="advantage-card card animate-fade-in">
                <div class="advantage-icon">
                    <span class="advantage-badge">💰</span>
                </div>
                <div class="advantage-content">
                    <h3 class="card-title">Высокооплачиваемые специальности</h3>
                    <p class="card-description">
                        Наши выпускники выбирают специальности с высоким уровнем дохода
                        и востребованностью на рынке труда.
                    </p>
                </div>
                <div class="advantage-image">
                    <img src="{{ asset('img2/специалисты.jpg') }}" alt="Специалисты">
                </div>
            </div>

            <div class="advantage-card card animate-fade-in">
                <div class="advantage-icon">
                    <span class="advantage-badge">🎓</span>
                </div>
                <div class="advantage-content">
                    <h3 class="card-title">Гранты и стипендии</h3>
                    <p class="card-description">
                        Мы предлагаем нашим студентам возможность получения грантов
                        и стипендий для обучения, поддерживая талантливых студентов.
                    </p>
                </div>
                <div class="advantage-image">
                    <img src="{{ asset('img2/грант.jpg') }}" alt="Гранты">
                </div>
            </div>
        </div>
    </section>
@endsection
