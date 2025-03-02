@extends('layouts.mainwebsite-pages')

@section('page_title', __('mainwebsite.pages.pre-header.text.reviews'))

@section('title') {{ $title ?? null }} @endsection

@section('about-us-link')
    <li class="current">
        <a href="{{ route('mainwebsite.about-us') }}">{{ __('mainwebsite.pages.pre-header.about-us') }}</a>
    </li>
@endsection

@section('last-pre-header')
    <li class="current">@yield('page_name', __('mainwebsite.pages.pre-header.text.reviews'))</li>
@endsection

@section('content')
    <section id="testimonials" class="testimonials section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-item">
                        <img src="{{ asset('assets/mainwebsite/img/testimonials/testimonial.jpg') }}" class="testimonial-img" alt="">
                        <h3 class="title">
                            <a href="" class="stretched-link">Андрей Сидоров</a>
                        </h3>
                        <h4>Опубликован: 02.03.2025, 13:30</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Я давно хотел взять собаку из приюта, но всегда казалось, что это сложный процесс. AnimalSafe изменил моё мнение! Всё удобно: анкета, фильтры, связь с кураторами. Теперь у меня дома живёт замечательный пёс по имени Бакс, и я не представляю свою жизнь без него!</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="testimonial-item">
                        <img src="{{ asset('assets/mainwebsite/img/testimonials/testimonial.jpg') }}" class="testimonial-img" alt="">
                        <h3 class="title">
                            <a href="" class="stretched-link">Антон Романов</a>
                        </h3>
                        <h4>Опубликован: 02.03.2025, 12:17</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Спасибо AnimalSafe за моего нового друга! Понравилось, что на сайте есть подробные карточки животных, фото и даже рекомендации по уходу. Команда проекта всегда на связи и помогает с любыми вопросами. Видно, что они действительно заботятся о питомцах.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="testimonial-item">
                        <img src="{{ asset('assets/mainwebsite/img/testimonials/testimonial.jpg') }}" class="testimonial-img" alt="">
                        <h3 class="title">
                            <a href="" class="stretched-link">Анна Иванова</a>
                        </h3>
                        <h4>Опубликован: 01.03.2025, 21:55</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Я переживала, как дети отреагируют на кошку из приюта, но кураторы AnimalSafe помогли выбрать идеального питомца. Мы взяли ласковую кошку Беллу, и теперь она полноправный член семьи. Благодарю за ваш труд и любовь к животным!</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="testimonial-item">
                        <img src="{{ asset('assets/mainwebsite/img/testimonials/testimonial.jpg') }}" class="testimonial-img" alt="">
                        <h3 class="title">
                            <a href="" class="stretched-link">Феликс Бульваров</a>
                        </h3>
                        <h4>Опубликован: 01.03.2025, 20:50</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Раньше я скептически относился к подобным сервисам, но AnimalSafe приятно удивил. Всё организовано, честно, с заботой о животных. Видно, что проект создан не ради выгоды, а ради добрых дел. Теперь советую его всем знакомым!</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
