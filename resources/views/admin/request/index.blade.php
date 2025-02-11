@extends('layouts.layout')

@section('title')
    {{ $title ?? null }}
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    @include('layouts.page-header')

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $title ?? null }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a href="{{ route("admin.requests.create") }}"
                   class="btn btn-primary mb-3">{{ __('messages.request.create') }}</a>

                @if(count($animal_pets))
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Подтверждение заявки</th>
                            <th>Вид</th>
                            <th>Пол</th>
                            <th>Заявитель</th>
                            <th>Описание</th>
                            <th>Характер</th>
                            <th>Дата рождения</th>
                            <th>Тип шерсти</th>
                            <th>Стерилизован</th>
                            <th>Вакцинирован</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($animal_pets as $animal_pet)
                            <tr>
                                <td>{{ $animal_pet->id}}</td>
                                <td>{{ $animal_pet->is_confirmed ? 'Да' : 'Нет' }}</td>
                                <td>{{ $animal_pet->animal->name}}</td>
                                <td>{{ $animal_pet->sex->getTitle() }}</td>
                                <td>{{ $animal_pet->user->full_name }}</td>
                                <td>{{ $animal_pet->description }}</td>
                                <td>{{ $animal_pet->character}}</td>
                                <td>{{ $animal_pet->bith_date }}</td>
                                <td>{{ $animal_pet->wool_type}}</td>
                                <td>{{ $animal_pet->is_sterilized ? 'Да' : 'Нет' }}</td>
                                <td>{{ $animal_pet->has_vaccination ? 'Да' : 'Нет' }}</td>
                                <td>
                                    <a href="{{ route("admin.requests.edit", ['request' => $animal_pet->id]) }}"
                                       class="btn btn-info btn-sm float-left">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    @if(auth()->user()->role == \App\Enum\Role::ADMIN)
                                        <form action="{{ route("admin.requests.destroy", ['request' => $animal_pet->id]) }}"
                                              method="post" class="float-left ml-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Подтвердите удаление')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>{{ __('messages.user.none') }}</p>
                @endif
            </div>
            <!-- /.card-body -->

            <div class="card-footer clearfix">
                {{ $animal_pets->appends(request()->query())->links('vendor.pagination.my-pagination') }}
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

    {{--    @include('admin.layouts.datatable-script')--}}
@endsection
