@extends('layouts.dashboard')

@section('title') {{ $title ?? null }} @endsection

@section('content')
    <div class="row g-3 mb-3">
        <div class="col-xxl-6 col-xl-12">
            <div class="row g-3">
                <div class="col-12">
                    <div class="card bg-transparent-50 overflow-hidden">
                        <div class="card-header position-relative">
                            <div class="bg-holder d-none d-md-block bg-card z-1" style="background-image:url({{ asset('assets/dashboard/img/illustrations/authentication-corner.png') }});background-size:270px;background-position:right bottom;z-index:-1;"></div>

                            <div class="position-relative z-2">
                                <div>
                                    <h3 class="text-primary mb-1">{{ $greeting }}, {{ auth()->user()->name }}!</h3>
                                    <p>Сегодня: {{ $date }} | <span id="live-time"></span>, {{ $dayName }} <br>
                                        Мониторинг данных Вашей работы
                                    </p>
                                </div>
                                <div class="d-flex py-3">
                                    <div class="pe-3">
                                        <p class="text-600 fs-10 fw-medium">Проработанное время <br>за сегодня</p>
                                        <h4 class="text-800 mb-0">5ч. 20мин.</h4>
                                    </div>
                                    <div class="ps-3">
                                        <p class="text-600 fs-10">Обработанных обращений,<br>  от пользователей, за сегодня</p>
                                        <h4 class="text-800 mb-0">18</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="mb-0 list-unstyled list-group font-sans-serif">
                                <li class="list-group-item mb-0 rounded-0 py-3 px-x1 list-group-item-danger border-x-0 border-top-0">
                                    <div class="row flex-between-center">
                                        <div class="col">
                                            <div class="d-flex">
                                                <div class="fas fa-circle mt-1 fs-11"></div>
                                                <p class="fs-10 ps-2 mb-0"><strong>+5 необработанных</strong> заявок от пользователей</p>
                                            </div>
                                        </div>
                                        <div class="col-auto d-flex align-items-center">
                                            <a class="fs-10 fw-medium text-warning-emphasis" href="">Просмотреть
                                                <i class="fas fa-chevron-right ms-1 fs-11"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item mb-0 rounded-0 py-3 px-x1 list-group-item-warning border-x-0 border-top-0">
                                    <div class="row flex-between-center">
                                        <div class="col">
                                            <div class="d-flex">
                                                <div class="fas fa-circle mt-1 fs-11"></div>
                                                <p class="fs-10 ps-2 mb-0"><strong>Новое обращение</strong> на смену данных</p>
                                            </div>
                                        </div>
                                        <div class="col-auto d-flex align-items-center">
                                            <a class="fs-10 fw-medium text-warning-emphasis" href="{{ route('dashboard.admin.change-data') }}">Просмотреть
                                                <i class="fas fa-chevron-right ms-1 fs-11"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <!--
                                <li class="list-group-item mb-0 rounded-0 py-3 px-x1 greetings-item text-700 border-x-0 border-top-0">
                                    <div class="row flex-between-center">
                                        <div class="col">
                                            <div class="d-flex">
                                                <div class="fas fa-circle mt-1 fs-11 text-primary"></div>
                                                <p class="fs-10 ps-2 mb-0"><strong>25 действий</strong> совершённых сотрудниками за сегодня</p>
                                            </div>
                                        </div>
                                        <div class="col-auto d-flex align-items-center">
                                            <a class="fs-10 fw-medium" href="">Просмотреть
                                                <i class="fas fa-chevron-right ms-1 fs-11"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const userTimezone = "{{ auth()->user()->timezone ?? 'Europe/Moscow' }}";

            function updateTime() {
                const now = new Date().toLocaleTimeString('ru-RU', {
                    timeZone: userTimezone,
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                });

                const timeElement = document.getElementById("live-time");
                if (timeElement) {
                    timeElement.textContent = now;
                }
            }

            updateTime();
            setInterval(updateTime, 1000);
        });
    </script>
@endpush
