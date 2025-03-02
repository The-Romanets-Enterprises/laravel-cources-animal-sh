@extends('layouts.mainwebsite-pages')

@section('page_title', __('mainwebsite.pages.pre-header.text.about-us'))

@section('title') {{ $title ?? null }} @endsection

@section('last-pre-header')
    <li class="current">@yield('page_name', __('mainwebsite.pages.pre-header.text.about-us'))</li>
@endsection

@section('content')
    <section id="about-2" class="about-2 section">
        <div class="container" data-aos="fade-up">
            <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-5">
                    <div class="about-img">
                        <img src="{{ asset('assets/mainwebsite/img/about-portrait.jpg') }}" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-7">
                    <h3 class="pt-0 pt-lg-5">Каждое животное заслуживает дом. Мы помогаем им его найти</h3>

                    <ul class="nav nav-pills mb-3">
                        <li><a class="nav-link active" data-bs-toggle="pill" href="#about-2-tab1">Как мы помогаем</a></li>
                        <li><a class="nav-link" data-bs-toggle="pill" href="#about-2-tab2">О платформе</a></li>
                        <li><a class="nav-link" data-bs-toggle="pill" href="#about-2-tab3">Доверие и безопасность</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="about-2-tab1">
                            <p class="fst-italic">Мы создаём удобную среду для поиска и усыновления животных, обеспечивая прозрачность и безопасность каждого шага.</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Простая подача заявки</h4>
                            </div>
                            <p>Выберите питомца и отправьте заявку всего в несколько кликов. Мы упрощаем процесс, чтобы больше животных находили дом быстрее.</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Проверенные приюты и кураторы</h4>
                            </div>
                            <p>Все организации проходят верификацию, что гарантирует подлинность информации о питомцах.</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Поддержка на всех этапах</h4>
                            </div>
                            <p>От первого шага до адаптации – наша команда готова помочь, ответить на вопросы и дать рекомендации.</p>
                        </div>

                        <div class="tab-pane fade" id="about-2-tab2">
                            <p class="fst-italic">AnimalSafe – это не просто сайт, а целая экосистема, объединяющая приюты, волонтёров и будущих хозяев.</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Каталог с фильтрами и удобным поиском</h4>
                            </div>
                            <p>Подбирайте питомца по возрасту, породе, состоянию здоровья и другим критериям.</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Истории животных и фото</h4>
                            </div>
                            <p>Каждое животное имеет свою историю, фотографии и описание, чтобы вы могли лучше узнать его перед встречей.</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Система заявок и откликов</h4>
                            </div>
                            <p>Просматривайте отклики, общайтесь с приютами и оформляйте заявку на усыновление прямо на платформе.</p>
                        </div>

                        <div class="tab-pane fade" id="about-2-tab3">
                            <p class="fst-italic">Мы заботимся о безопасности как пользователей, так и животных, создавая прозрачную систему взаимодействия.</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Верификация пользователей</h4>
                            </div>
                            <p>Все пользователи проходят проверку, что снижает риск мошенничества и случайных отказов от животных.</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Поддержка на каждом этапе</h4>
                            </div>
                            <p>Мы предоставляем советы и рекомендации по адаптации питомца, юридическим вопросам и уходу.</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Контрольная система усыновления</h4>
                            </div>
                            <p>Приюты и кураторы могут следить за процессом и помогать новым владельцам в первые недели жизни питомца в новом доме.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="stats" class="stats section light-background">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="1" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Год компании</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Сотрудников</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Пользователей</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Заявок всего</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="services section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-person-bounding-box icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title">
                                <a href="{{ route('mainwebsite.our-specialists') }}" class="stretched-link">Наши специалисты</a>
                            </h4>
                            <p class="description">В команде <strong>{{ __('general.project-name') }}</strong> работают профессионалы, которые объединены одной целью – помогать животным находить любящие семьи. Наши специалисты – это опытные ветеринары, кинологи, кураторы приютов и IT-разработчики, создающие удобную и безопасную платформу для всех пользователей. Каждый из них вносит свой вклад в развитие проекта, делая процесс усыновления прозрачным и доступным.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-info-square icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title">
                                <a href="{{ route('mainwebsite.our-company') }}" class="stretched-link">О компании</a>
                            </h4>
                            <p class="description"><strong>{{ __('general.project-name') }}</strong> – это инновационная онлайн-платформа, созданная для помощи приютам и людям, которые хотят подарить дом животным. Мы стремимся упростить процесс поиска питомцев, сделать его удобным, быстрым и безопасным. Наша миссия – не просто объединять людей и животных, а создавать сообщество, где забота и ответственность становятся основой каждой истории.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-info-square icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title">
                                <a href="{{ route('mainwebsite.reviews') }}" class="stretched-link">Отзывы</a>
                            </h4>
                            <p class="description">Люди, воспользовавшиеся <strong>{{ __('general.project-name') }}</strong>, делятся своими историями и впечатлениями. Узнайте, как наша платформа помогла найти дом тысячам питомцев и как изменились жизни их новых хозяев. Ваш отзыв тоже важен – оставьте свою историю и вдохновите других на добрые поступки!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
