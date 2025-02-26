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
                    <a href="" class="btn-get-started">Отдать питомца</a>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ asset('assets/mainwebsite/img/hero-carousel/hero-carousel-2.jpg') }}" alt="">
                <div class="carousel-container">
                    <h2>Подари дом тому, кто ждёт</h2>
                    <p>В нашем приюте есть животные, которые мечтают о любящей семье. Найдите себе верного друга и подарите ему заботу и тепло.</p>
                    <a href="" class="btn-get-started">Выбрать питомца</a>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ asset('assets/mainwebsite/img/hero-carousel/hero-carousel-3.jpg') }}" alt="">
                <div class="carousel-container">
                    <h2>Возьми питомца под опеку</h2>
                    <p>Не можешь забрать питомца домой, но хочешь помочь? Стань его опекуном — поддерживай его питание и уход, пока он ждёт семью.</p>
                    <a href="" class="btn-get-started">Стать опекуном</a>
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
            <h2>About</h2>
            <p>About Us<br></p>
        </div>

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li>
                            <i class="bi bi-check2-circle"></i>
                            <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span>
                        </li>
                        <li>
                            <i class="bi bi-check2-circle"></i>
                            <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span>
                        </li>
                        <li>
                            <i class="bi bi-check2-circle"></i>
                            <span>Ullamco laboris nisi ut aliquip ex ea commodo</span>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                    <a href="" class="read-more">
                        <span>Read More</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="clients" class="clients section light-background">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4">
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

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('assets/mainwebsite/img/clients/client-5.png') }}" class="img-fluid" alt="">
                </div>

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('assets/mainwebsite/img/clients/client-6.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="services section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-briefcase icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title">
                                <a href="" class="stretched-link">Lorem Ipsum</a>
                            </h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-card-checklist icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title">
                                <a href="" class="stretched-link">Dolor Sitema</a>
                            </h4>
                            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-bar-chart icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title">
                                <a href="" class="stretched-link">Sed ut perspiciatis</a>
                            </h4>
                            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-binoculars icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title">
                                <a href="" class="stretched-link">Magni Dolores</a>
                            </h4>
                            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-brightness-high icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title">
                                <a href="" class="stretched-link">Nemo Enim</a>
                            </h4>
                            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-calendar4-week icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title">
                                <a href="" class="stretched-link">Eiusmod Tempor</a>
                            </h4>
                            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
