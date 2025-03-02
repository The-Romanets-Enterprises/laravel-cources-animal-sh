@extends('layouts.mainwebsite')

@section('title') {{ $title ?? null }}@endsection

@section('content')
    <section id="home" class="hero section dark-background">
        <div id="home-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-item active">
                <img src="{{ asset('assets/mainwebsite/img/hero-carousel/hero-carousel-1.jpg') }}" alt="">
                <div class="carousel-container">
                    <h2>Ваш питомец в надёжных руках<br></h2>
                    <p>Не можете больше заботиться о своём питомце? Мы поможем найти для него любящую семью или обеспечим заботу в нашем приюте.</p>
                    <a href="{{ route('login') }}" class="btn-get-started">Отдать питомца</a>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ asset('assets/mainwebsite/img/hero-carousel/hero-carousel-2.jpg') }}" alt="">
                <div class="carousel-container">
                    <h2>Подари дом тому, кто ждёт</h2>
                    <p>В нашем приюте есть животные, которые мечтают о любящей семье. Найдите себе верного друга и подарите ему заботу и тепло.</p>
                    <a href="{{ route('login') }}" class="btn-get-started">Выбрать питомца</a>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ asset('assets/mainwebsite/img/hero-carousel/hero-carousel-3.jpg') }}" alt="">
                <div class="carousel-container">
                    <h2>Возьми питомца под опеку</h2>
                    <p>Не можешь забрать питомца домой, но хочешь помочь? Стань его опекуном — поддерживай его питание и уход, пока он ждёт семью.</p>
                    <a href="{{ route('login') }}" class="btn-get-started">Стать опекуном</a>
                </div>
            </div>

            <a class="carousel-control-prev" href="#home-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#home-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

            <ol class="carousel-indicators"></ol>
        </div>
    </section>

    <section id="about" class="about section">
        <div class="container section-title" data-aos="fade-up">
            <h2>О нас</h2>
            <p>{{ __('general.project-name') }}<br></p>
        </div>

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <p>Мы делаем процесс поиска нового друга удобным, прозрачным и безопасным. <br>На <strong>AnimalSafe</strong> вы можете:</p>
                    <ul>
                        <li>
                            <i class="bi bi-check2-circle"></i>
                            <span>Найти и забронировать питомца из приюта.</span>
                        </li>
                        <li>
                            <i class="bi bi-check2-circle"></i>
                            <span>Подать заявку на усыновление или временное размещение животного.</span>
                        </li>
                        <li>
                            <i class="bi bi-check2-circle"></i>
                            <span>Следить за статусом своей заявки в личном кабинете.</span>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <p><strong>AnimalSafe</strong> — это веб-приложение для автоматизации работы приюта животных. Оно помогает сотрудникам эффективно управлять процессами, а пользователям — находить питомцев, подавать заявки и взаимодействовать с приютом в удобном онлайн-формате.</p>
                    <a href="{{ route('mainwebsite.about-us') }}" class="read-more">
                        <span>Узнать больше</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="clients" class="clients section light-background">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4 justify-content-center">
                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('assets/mainwebsite/img/clients/client-1.png') }}" class="img-fluid" alt="">
                </div>

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('assets/mainwebsite/img/clients/client-2.png') }}" class="img-fluid" alt="">
                </div>

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('assets/mainwebsite/img/clients/client-3.png') }}" class="img-fluid" alt="">
                </div>

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('assets/mainwebsite/img/clients/client-4.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="features section">

        <div class="container section-title" data-aos="fade-up">
            <h2>Что вы можете</h2>
            <p>сделать в {{ __('general.project-name') }}<br></p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" href="#features-tab-1">Найти и забронировать питомца</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#features-tab-2">Подать заявку на усыновление или передачу животного</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#features-tab-3">Узнать больше о каждом питомце</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#features-tab-4">Связаться с приютом и получить консультацию</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#features-tab-5">Управлять заявками и профилем</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="features-tab-1">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Найти и забронировать питомца</h3>
                                    <p class="fst-italic">Просматривайте каталог животных с подробной информацией о каждом питомце.</p>
                                    <p>Используйте удобные фильтры: возраст, порода, размер, состояние здоровья. Забронируйте понравившегося питомца и получите консультацию от сотрудников приюта.</p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="{{ asset('assets/mainwebsite/img/tabs/tab-1.png') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="features-tab-2">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Подать заявку на усыновление или передачу животного</h3>
                                    <p class="fst-italic">Заполните онлайн-заявку на усыновление питомца прямо на сайте.</p>
                                    <p>Если вам нужно временно передать животное в приют, подайте заявку на размещение. Отслеживайте статус своих заявок в личном кабинете.</p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="{{ asset('assets/mainwebsite/img/tabs/tab-2.png') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="features-tab-3">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Узнать больше о каждом питомце</h3>
                                    <p class="fst-italic">В карточке животного вы найдете его возраст, здоровье, историю и характер.</p>
                                    <p>Система автоматически подберёт рекомендации по уходу. Вы сможете прочитать отзывы других пользователей, которые брали животных из приюта.</p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="{{ asset('assets/mainwebsite/img/tabs/tab-3.png') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="features-tab-4">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Связаться с приютом и получить консультацию</h3>
                                    <p class="fst-italic">Все приюты проходят проверку, и вы всегда можете задать вопросы напрямую.</p>
                                    <p>Получите рекомендации по адаптации и содержанию питомца. Получите рекомендации по адаптации и содержанию питомца.</p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="{{ asset('assets/mainwebsite/img/tabs/tab-4.png') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="features-tab-5">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Управлять заявками и профилем</h3>
                                    <p class="fst-italic">Следите за статусом своих заявок и бронирований.</p>
                                    <p>Храните историю взаимодействий с приютами. Настраивайте свой профиль, добавляйте избранных питомцев и подписывайтесь на обновления.</p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="{{ asset('assets/mainwebsite/img/tabs/tab-5.png') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
