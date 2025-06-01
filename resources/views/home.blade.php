@extends('layouts.app')

@section('title', 'ICB - Международный колледж бизнеса и коммуникаций')

@section('content')
    <!-- Hero Section -->
    <section class="intro">
        <div class="intro-text animate-slide-up">
            <h1>Международный колледж бизнеса и коммуникаций</h1>
            <p>Современное образование для успешного будущего. Прием без вступительных экзаменов, актуальные специальности и квалифицированные преподаватели.</p>
            <a href="https://wa.me/77760006550?text=Здравствуйте!%20Я%20хочу%20узнать%20подробнее%20о%20вашем%20колледже." target="_blank" style="text-decoration: none;">
                <button class="btn btn-primary btn-lg">
                    <span>💬</span>
                    Написать в WhatsApp
                </button>
            </a>
        </div>
        <div class="intro-image animate-fade-in">
            <img src="{{ asset('img/1.png') }}" alt="Международный колледж бизнеса и коммуникаций">
        </div>
    </section>

    <!-- Why Us Section -->
    <section class="why-us section">
        <div class="section-header">
            <h2 class="section-title">Почему именно мы?</h2>
            <p class="section-description">
                Мы выделяемся благодаря современному подходу к образованию, квалифицированным преподавателям и актуальным специальностям, которые помогут вам построить успешную карьеру.
            </p>
        </div>
        <div class="images-row">
            <div class="card animate-fade-in">
                <img src="{{ asset('img/__1__1.jpg') }}" alt="Современные аудитории">
                <div class="card-header">
                    <h3 class="card-title">Современные аудитории</h3>
                    <p class="card-description">Оборудованные по последнему слову техники учебные классы</p>
                </div>
            </div>
            <div class="card animate-fade-in">
                <img src="{{ asset('img/__1__2.jpg') }}" alt="Квалифицированные преподаватели">
                <div class="card-header">
                    <h3 class="card-title">Опытные преподаватели</h3>
                    <p class="card-description">Профессионалы с многолетним практическим опытом</p>
                </div>
            </div>
            <div class="card animate-fade-in">
                <img src="{{ asset('img/__1__3.jpg') }}" alt="Удобное расположение">
                <div class="card-header">
                    <h3 class="card-title">Удобное расположение</h3>
                    <p class="card-description">В центре города с отличной транспортной доступностью</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Student Life Section -->
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Студенческая жизнь</h2>
            <p class="section-description">
                Ежегодно мы проводим более 30-ти различных мероприятий от концертов в рамках декад до выездов на природу и тимбилдингов.
            </p>
        </div>

        <div class="videos">
            <div class="video card">
                <iframe src="https://www.youtube.com/embed/jcjZvcDy588" 
                        title="Конкурс по фронтенду" 
                        allowfullscreen>
                </iframe>
            </div>
            <div class="video card">
                <iframe src="https://www.youtube.com/embed/fExWBNJyO-Q" 
                        title="Благотворительная акция" 
                        allowfullscreen>
                </iframe>
            </div>
            <div class="video card">
                <iframe src="https://www.youtube.com/embed/LnKGaTaUhW0" 
                        title="День святого Валентина" 
                        allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>

    <!-- Grants Section -->
    <section class="grants section">
        <div class="section-header">
            <h2 class="section-title">Гранты и Скидки</h2>
            <p class="section-description">
                Ежегодно мы предоставляем 100 грантов на обучение и выгодные скидки для различных категорий студентов.
            </p>
        </div>
        <div class="images-row">
            <figure class="card animate-fade-in">
                <img src="{{ asset('img/provent.png') }}" alt="Грант для отличников">
                <figcaption>Грант для отличников</figcaption>
            </figure>
            <figure class="card animate-fade-in">
                <img src="{{ asset('img/med.png') }}" alt="Скидки для студентов">
                <figcaption>Скидки для студентов</figcaption>
            </figure>
            <figure class="card animate-fade-in">
                <img src="{{ asset('img/inval.png') }}" alt="Социальные скидки">
                <figcaption>Социальные скидки</figcaption>
            </figure>
        </div>
    </section>
@endsection 