@extends('layouts.dashboard')

@section('title') {{ $title ?? null }} @endsection

@section('content')
    <div class="card mb-3">
        <div class="card-body overflow-hidden p-lg-6">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img class="img-fluid" src="{{ asset('assets/dashboard/img/icons/spot-illustrations/21.png') }}" alt="" />
                </div>
                <div class="col-lg-6 ps-lg-4 my-5 text-center text-lg-start">
                    <h3 class="text-primary">У Вас нет заявок!</h3>
                    <p class="lead">Создайте свою первую заявку!</p>
                    <a class="btn btn-falcon-primary" href="">Создать</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3" id="customersTable" data-list='{"valueNames":["nickname","sex","description","status","created_at"],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">Ваши заявки</h5>
                </div>
                <div class="col-8 col-sm-auto text-end ps-2">
                    <div class="d-none" id="table-customers-actions">
                        <div class="d-flex">
                            <select class="form-select form-select-sm" aria-label="Bulk actions">
                                <option selected="">Выберите действие</option>
                                <option value="Delete">Удалить</option>
                            </select>
                            <button class="btn btn-falcon-default btn-sm ms-2" type="button">Применить</button>
                        </div>
                    </div>
                    <div id="table-customers-replace-element">
                        <button class="btn btn-falcon-default btn-sm text-success" type="button">
                            <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                            <span class="d-none d-sm-inline-block ms-1">Создать</span>
                        </button>
                        <button class="btn btn-falcon-default btn-sm" type="button">
                            <span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span>
                            <span class="d-none d-sm-inline-block ms-1">Экспортировать всё</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar">
                <table class="table table-sm table-striped fs-10 mb-0 overflow-hidden">
                    <thead class="bg-200">
                    <tr>
                        <th>
                            <div class="form-check fs-9 mb-0 d-flex align-items-center">
                                <input class="form-check-input" id="checkbox-bulk-customers-select" type="checkbox" data-bulk-select='{"body":"table-customers-body","actions":"table-customers-actions","replacedElement":"table-customers-replace-element"}' />
                            </div>
                        </th>
                        <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="nickname">Кличка</th>
                        <th class="text-900 sort pe-1 align-middle white-space-nowrap ps-5" data-sort="sex">Пол</th>
                        <th class="text-900 sort pe-1 align-middle white-space-nowrap ps-5" data-sort="description">Описание</th>
                        <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="status">Статус</th>
                        <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="created_at">Создано</th>
                        <th class="text-900 align-middle white-space-nowrap no-sort ps-3">Дополнительно</th>
                    </tr>
                    </thead>
                    <tbody class="list" id="table-customers-body">
                        <tr class="btn-reveal-trigger">
                            <td class="align-middle py-2" style="width: 28px;">
                                <div class="form-check fs-9 mb-0 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" id="customer-1" data-bulk-select-row="data-bulk-select-row" />
                                </div>
                            </td>
                            <td class="nickname align-middle white-space-nowrap py-2">
                                <a href="">
                                    <div class="d-flex d-flex align-items-center">
                                        <div class="avatar avatar-xl me-2">
                                            <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" alt="" />
                                        </div>
                                        <div class="flex-1">
                                            <h5 class="mb-0 fs-10">Рэкс</h5>
                                        </div>
                                    </div>
                                </a>
                            </td>
                            <td class="sex align-middle white-space-nowrap ps-5 py-2">Мужской</td>
                            <td class="description align-middle white-space-nowrap ps-5 py-2">Текст описания животного (первые несколько слов...)</td>
                            <td class="status align-middle text-center fs-9 white-space-nowrap">
                                <small class="badge rounded badge-subtle-secondary dark__bg-1000">На модерации</small>
                            </td>
                            <td class="created_at align-middle py-2">06.03.2025</td>
                        </tr>
                        <tr class="btn-reveal-trigger">
                            <td class="align-middle py-2" style="width: 28px;">
                                <div class="form-check fs-9 mb-0 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" id="customer-1" data-bulk-select-row="data-bulk-select-row" />
                                </div>
                            </td>
                            <td class="nickname align-middle white-space-nowrap py-2">
                                <a href="">
                                    <div class="d-flex d-flex align-items-center">
                                        <div class="avatar avatar-xl me-2">
                                            <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" alt="" />
                                        </div>
                                        <div class="flex-1">
                                            <h5 class="mb-0 fs-10">Зевс</h5>
                                        </div>
                                    </div>
                                </a>
                            </td>
                            <td class="sex align-middle white-space-nowrap ps-5 py-2">Мужской</td>
                            <td class="description align-middle white-space-nowrap ps-5 py-2">Текст описания животного (первые несколько слов...)</td>
                            <td class="status align-middle text-center fs-9 white-space-nowrap">
                                <small class="badge rounded badge-subtle-success false">Одобрено</small>
                            </td>
                            <td class="created_at align-middle py-2">06.03.2025</td>
                            <td class="align-middle white-space-nowrap ps-5 py-2">
                                <div class="dropdown font-sans-serif position-static">
                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="customer-dropdown-1" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs-10"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="customer-dropdown-1">
                                        <div class="py-2">
                                            <a class="dropdown-item" href="">Редактировать</a>
                                            <a class="dropdown-item text-danger" href="">Удалить</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="btn-reveal-trigger">
                            <td class="align-middle py-2" style="width: 28px;">
                                <div class="form-check fs-9 mb-0 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" id="customer-1" data-bulk-select-row="data-bulk-select-row" />
                                </div>
                            </td>
                            <td class="nickname align-middle white-space-nowrap py-2">
                                <a href="">
                                    <div class="d-flex d-flex align-items-center">
                                        <div class="avatar avatar-xl me-2">
                                            <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" alt="" />
                                        </div>
                                        <div class="flex-1">
                                            <h5 class="mb-0 fs-10">Афина</h5>
                                        </div>
                                    </div>
                                </a>
                            </td>
                            <td class="sex align-middle white-space-nowrap ps-5 py-2">Женский</td>
                            <td class="description align-middle white-space-nowrap ps-5 py-2">Текст описания животного (первые несколько слов...)</td>
                            <td class="status align-middle text-center fs-9 white-space-nowrap">
                                <small class="badge rounded badge-subtle-danger false">Отклонено</small>
                            </td>
                            <td class="created_at align-middle py-2">06.03.2025</td>
                            <td class="align-middle white-space-nowrap ps-5 py-2">
                                <div class="dropdown font-sans-serif position-static">
                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="customer-dropdown-1" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs-10"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="customer-dropdown-1">
                                        <div class="py-2">
                                            <a class="dropdown-item" href="">Узнать подробности</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-center">
            <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev">
                <span class="fas fa-chevron-left"></span>
            </button>
            <ul class="pagination mb-0"></ul>
            <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next">
                <span class="fas fa-chevron-right"></span>
            </button>
        </div>
    </div>
@endsection
