@extends('layouts.dashboard')

@section('title') {{ $title ?? null }} @endsection

@section('content')
    <div class="card mb-3" id="customersTable" data-list='{"valueNames":["nickname","status","created_at","updated_at"],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">Заявки от пользователей на смену личных данных</h5>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar">
                <table class="table table-sm table-striped fs-10 mb-0 overflow-hidden">
                    <thead class="bg-200">
                    <tr>
                        <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="nickname">Пользователь</th>
                        <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="status">Статус</th>
                        <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="created_at">Создано</th>
                        <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="updated_at">Рассмотрено</th>
                    </tr>
                    </thead>
                    <tbody class="list" id="table-customers-body">
                        <tr class="btn-reveal-trigger">
                            <td class="nickname align-middle white-space-nowrap py-2">
                                <a href="{{ route('dashboard.admin.change-data-id') }}">
                                    <div class="d-flex d-flex align-items-center">
                                        <div class="avatar avatar-xl me-2">
                                            <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" alt="" />
                                        </div>
                                        <div class="flex-1">
                                            <h5 class="mb-0 fs-10">Имя Фамилия</h5>
                                        </div>
                                    </div>
                                </a>
                            </td>
                            <td class="status align-middle fs-9 white-space-nowrap">
                                <small class="badge rounded badge-subtle-secondary dark__bg-1000">В ожидании</small>
                            </td>
                            <td class="created_at align-middle py-2">06.03.2025 (10:00:00)</td>
                            <td class="updated_at align-middle py-2">-</td>
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
