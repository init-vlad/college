@extends('layouts.app')

@section('title', 'Специальности - ICB')

@section('content')
    <section class="section" style="padding-top: calc(80px + var(--space-3xl));">
        <div class="section-header">
            <h1 class="section-title">Специальности</h1>
            <p class="section-description">
                В нашем колледже представлены наиболее востребованные направления обучения в настоящее время.
                Все программы разработаны с учетом современных требований рынка труда.
            </p>
        </div>

        <div class="specialties-grid">
            <div class="specialty-card card animate-fade-in">
                <div class="specialty-info">
                    <div class="specialty-meta">
                        <span class="specialty-code">04140100</span>
                        <span class="specialty-qualification">4S04140103</span>
                    </div>
                    <h3 class="card-title">Маркетинг</h3>
                    <p class="card-description">
                        Обучение по специальности маркетинг призвано развивать у студентов навыки и знания,
                        необходимые для успешного продвижения продуктов или услуг на рынке.
                        Данная специальность актуальна особенно сейчас в эпоху цифровой трансформации
                        и повышенной конкуренции на рынке.
                    </p>
                </div>
                <div class="specialty-image">
                    <img src="{{ asset('img/маркетинг.jpg') }}" alt="Маркетинг">
                </div>
            </div>

            <div class="specialty-card card animate-fade-in">
                <div class="specialty-info">
                    <div class="specialty-meta">
                        <span class="specialty-code">04130100</span>
                        <span class="specialty-qualification">4S04130101</span>
                    </div>
                    <h3 class="card-title">Менеджмент</h3>
                    <p class="card-description">
                        Обучение по специальности менеджмент открывает двери к разнообразным навыкам,
                        необходимым для эффективного руководства и координации бизнес-процессов.
                        Данная специальность универсальна тем, что она применима во всех отраслях рынка.
                    </p>
                </div>
                <div class="specialty-image">
                    <img src="{{ asset('img/менеджмент.jpg') }}" alt="Менеджмент">
                </div>
            </div>

            <div class="specialty-card card animate-fade-in">
                <div class="specialty-info">
                    <div class="specialty-meta">
                        <span class="specialty-code">06130100</span>
                        <span class="specialty-qualification">4S06130103</span>
                    </div>
                    <h3 class="card-title">Разработчик программного обеспечения</h3>
                    <p class="card-description">
                        Обучение по специальности "Программное обеспечение" открывает дорогу к приобретению навыков,
                        необходимых для разработки и обслуживания программных продуктов.
                        Эти навыки не только востребованы на рынке труда, но и предоставляют возможность
                        участвовать в создании инновационных технологий.
                    </p>
                </div>
                <div class="specialty-image">
                    <img src="{{ asset('img/рпо.jpg') }}" alt="Программирование">
                </div>
            </div>

            <div class="specialty-card card animate-fade-in">
                <div class="specialty-info">
                    <div class="specialty-meta">
                        <span class="specialty-code">06130100</span>
                        <span class="specialty-qualification">4S06130105</span>
                    </div>
                    <h3 class="card-title">Техник информационных систем</h3>
                    <p class="card-description">
                        Обучение по специальности "Техник информационных систем" обеспечивает студентов
                        необходимыми знаниями и навыками для эффективного обслуживания и сопровождения
                        информационных систем. С ростом цифровизации выпускники данной специальности
                        являются востребованными на рынке.
                    </p>
                </div>
                <div class="specialty-image">
                    <img src="{{ asset('img/тис.jpg') }}" alt="Информационные системы">
                </div>
            </div>
        </div>
    </section>
@endsection
