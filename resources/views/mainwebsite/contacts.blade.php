@extends('layouts.mainwebsite-pages')

@section('page_title', __('mainwebsite.pages.pre-header.text.contacts'))
@section('page_name', __('mainwebsite.pages.pre-header.text.contacts'))

@section('title') {{ $title ?? null }}@endsection

@section('content')
    <section id="contact" class="contact section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <!-- Карта -->
            <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
                <div id="map" style="width: 100%; height: 270px;"></div>
            </div>

            @push('scripts')
                <script>
                    ymaps.ready(init);
                    function init() {
                        var myMap = new ymaps.Map("map", {
                            center: [53.711214, 23.825594],
                            zoom: 17
                        });

                        var myPlacemark = new ymaps.Placemark([53.711214, 23.825594], {
                            balloonContent: '<strong>Наш приют</strong><br>Мы рады видеть вас!'
                        });

                        myMap.geoObjects.add(myPlacemark);
                    }
                </script>
            @endpush

            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>{{ __('general.address') }}</h3>
                            <p>ул.Улица д.1</p>
                        </div>
                    </div>

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>{{ __('general.phone') }}</h3>
                            <p>+375 (44) 000-00-00</p>
                        </div>
                    </div>

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>{{ __('general.email') }}</h3>
                            <p>example@animalsafe.com</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <form action="" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="{{ __('mainwebsite.pages.contacts.placeholders.name') }}" required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="{{ __('mainwebsite.pages.contacts.placeholders.email') }}" required="">
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="{{ __('mainwebsite.pages.contacts.placeholders.subject') }}" required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="{{ __('mainwebsite.pages.contacts.placeholders.message') }}" required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <!--
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                                -->
                                <button type="submit">{{ __('mainwebsite.pages.contacts.button') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
