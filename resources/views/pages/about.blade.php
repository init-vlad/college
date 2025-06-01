@extends('layouts.app')

@section('title', 'О нас - ICB')

@section('content')
    <section class="section" style="padding-top: calc(80px + var(--space-3xl));">
        <div class="about-container">
            <div class="about-content">
                <div class="section-header">
                    <h1 class="section-title">О нас</h1>
                    <p class="section-description">
                        Добро пожаловать в Международный колледж бизнеса и коммуникации!
                    </p>
                </div>

                <div class="about-text card">
                    <p>
                        Наш колледж расположен в г. Алматы в Ауэзовском районе по адресу: Жетысу-2, 16A.
                        Колледж был основан в 2009 году и за годы своей деятельности подготовил более 1000 специалистов.
                        Мы стремимся обеспечить студентов не только фундаментальными знаниями,
                        но и обширным практическим опытом, начиная с самого начала обучения.
                    </p>
                </div>

                <div class="history-section">
                    <h3 class="card-title">История ICB</h3>
                    <div class="timeline">
                        <div class="timeline-item card animate-fade-in">
                            <div class="timeline-year">2009</div>
                            <div class="timeline-content">
                                <p>
                                    В период Мирового кризиса 2008-2010 годов, оказавшего воздействие на нашу страну,
                                    возникла необходимость противостоять сокращениям штата сотрудников из-за низкого уровня образования.
                                    В ответ на эту проблему было принято решение о повышении образовательного стандарта в стране,
                                    что привело к созданию нашего колледжа.
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item card animate-fade-in">
                            <div class="timeline-year">2019</div>
                            <div class="timeline-content">
                                <p>
                                    Колледж прошел сертификацию по системе менеджмента качества
                                    (СМК ISO 9001:2015/СТ РК ISO 9001-2016).
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item card animate-fade-in">
                            <div class="timeline-year">2021</div>
                            <div class="timeline-content">
                                <p>
                                    Колледж успешно прошел первую международную аккредитацию от Евразийского Центра
                                    Аккредитации и обеспечения качества образования и здравоохранения (ECAQA)
                                    и впоследствии получил новый статус и название в качестве
                                    "Международного Колледжа Бизнеса и Коммуникации".
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item card animate-fade-in">
                            <div class="timeline-year">2023</div>
                            <div class="timeline-content">
                                <p>Колледж успешно прошел государственную аттестацию.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="about-stats">
                <div class="stats-grid">
                    <div class="stat-card card animate-fade-in">
                        <h3 class="stat-number" id="students-count">1000</h3>
                        <p class="stat-label">Студентов</p>
                    </div>
                    <div class="stat-card card animate-fade-in">
                        <h3 class="stat-number" id="teachers-count">50</h3>
                        <p class="stat-label">Преподавателей</p>
                    </div>
                    <div class="stat-card card animate-fade-in">
                        <h3 class="stat-number" id="years-count">15</h3>
                        <p class="stat-label">Лет успешной работы</p>
                    </div>
                    <div class="stat-card card animate-fade-in">
                        <h3 class="stat-number" id="specialties-count">4</h3>
                        <p class="stat-label">Востребованных специальностей</p>
                    </div>
                    <div class="stat-card card animate-fade-in">
                        <h3 class="stat-number" id="org-count">10</h3>
                        <p class="stat-label">Студенческих организаций</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('bottom-scripts')
<script src="{{ asset('js/script2.js') }}" defer></script>
@endpush
