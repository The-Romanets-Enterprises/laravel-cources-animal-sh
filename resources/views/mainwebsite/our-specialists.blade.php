@extends('layouts.mainwebsite-pages')

@section('page_title', __('mainwebsite.pages.pre-header.text.our-specialists'))

@section('title') {{ $title ?? null }} @endsection

@section('about-us-link')
    <li class="current">
        <a href="{{ route('mainwebsite.about-us') }}">{{ __('mainwebsite.pages.pre-header.about-us') }}</a>
    </li>
@endsection

@section('last-pre-header')
    <li class="current">@yield('page_name', __('mainwebsite.pages.pre-header.text.our-specialists'))</li>
@endsection

@section('content')
    <section id="team" class="team section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic">
                            <img src="{{ asset('assets/mainwebsite/img/our-specialists/specialist.jpg') }}" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4>Владислав Яковицкий</h4>
                            <span>Основатель проекта {{ __('general.project-name') }}</span>
                            <p>Определяет стратегическое развитие проекта, управляет ключевыми направлениями и принимает решения, влияющие на рост компании.</p>
                            <div class="social">
                                <a href="">
                                    <i class="bi bi-person-vcard-fill"></i>
                                </a>
                                <a href="">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                                <a href="">
                                    <i class="bi bi-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic">
                            <img src="{{ asset('assets/mainwebsite/img/our-specialists/specialist.jpg') }}" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4>Павел Романец</h4>
                            <span>Технический директор (CTO)</span>
                            <p>Руководит разработкой и внедрением технологий, выстраивает эффективные процессы разработки и контролирует качество цифровых решений.</p>
                            <div class="social">
                                <a href="">
                                    <i class="bi bi-person-vcard-fill"></i>
                                </a>
                                <a href="">
                                    <i class="bi bi-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic">
                            <img src="{{ asset('assets/mainwebsite/img/our-specialists/specialist.jpg') }}" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4>Вероника Минзар</h4>
                            <span>Директор по маркетингу (CMO)</span>
                            <p>Разрабатывает и реализует маркетинговую стратегию, управляет брендом и продвижением, формирует позиционирование компании на рынке.</p>
                            <div class="social">
                                <a href="">
                                    <i class="bi bi-person-vcard-fill"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
