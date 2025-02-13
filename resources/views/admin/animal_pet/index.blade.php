@extends('layouts.layout')

@section('title') {{ $title ?? null }} @endsection

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
                <a href="{{ route("admin.animal-pets.create") }}" class="btn btn-primary mb-3">{{ __('messages.animal_pet.create') }}</a>

                @if(count($animal_pets))
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Категория</th>
                                <th>Пол</th>
                                <th>Кличка</th>
                                <th>Описание</th>
                                <th>Дата рождения</th>
                                <th>Шерсть</th>
                                <th>Характер</th>
                                <th>Пользователь</th>
                                <th>Кастрация</th>
                                <th>Вакцинация</th>
                                <th>Одобрен</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($animal_pets as $animal_pet)
                                <tr>
                                    <td>{{ $animal_pet->id }}</td>
                                    <td>{{ $animal_pet->animal->name }}</td>
                                    <td>{{ $animal_pet->sex->getTitle() }}</td>
                                    <td>{{ $animal_pet->name }}</td>
                                    <td>{{ $animal_pet->description }}</td>
                                    <td>{{ $animal_pet->birth_date }}</td>
                                    <td>{{ $animal_pet->wool_type }}</td>
                                    <td>{{ $animal_pet->character }}</td>
                                    <td>{{ $animal_pet->user->getFullNameAttribute() }}</td>
                                    <td>{{ $animal_pet->is_sterilized ? __('messages.yes') : __('messages.no') }}</td>
                                    <td>{{ $animal_pet->has_vaccination ? __('messages.yes') : __('messages.no') }}</td>
                                    <td>{{ $animal_pet->is_confirmed ? __('messages.yes') : __('messages.no') }}</td>
                                    @if(auth()->user()->role == \App\Enums\Role::ADMIN)
                                        <td>
                                            <a href="{{ route("admin.animal-pets.edit", ['animal_pet' => $animal_pet->id]) }}" class="btn btn-info btn-sm float-left">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <form action="{{ route("admin.animal-pets.destroy", ['animal_pet' => $animal_pet->id]) }}" method="post" class="float-left ml-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Подтвердите удаление')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>{{ __('messages.animal_pet.none') }}</p>
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
