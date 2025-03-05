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
                                <th>Кличка</th>
                                <th>Описание</th>
                                <th>Дата рождения</th>
                                <th>Пользователь</th>
                                <th>Параметры</th>
                                <th>Фото</th>
                                <th>Видео</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($animal_pets as $animal_pet)
                                <tr>
                                    <td>{{ $animal_pet->id }}</td>
                                    <td>{{ $animal_pet->animal->name }}</td>
                                    <td>
                                        {{ $animal_pet->name . (($animal_pet->sex == \App\Enums\Sex::MALE) ? ' (М)' : ' (Ж)' )}}
                                    </td>
                                    <td>
                                        {!! $animal_pet->description !!}
                                        {!! __('messages.animal_pet.character'). ': ' . $animal_pet->character !!}
                                        {{ __('messages.animal_pet.wool_type'). ': ' . $animal_pet->wool_type }}
                                    </td>
                                    <td>{{ $animal_pet->birth_date->format('d.m.Y') }}</td>
                                    <td>{{ $animal_pet->user->getFullNameAttribute() }}</td>
                                    <td>
                                        {{ $animal_pet->is_sterilized ? __('messages.animal_pet.sterilized') : '' }}
                                        {{ $animal_pet->has_vaccination ? __('messages.animal_pet.vaccinated') : '' }}
                                        {{ $animal_pet->is_confirmed ? __('messages.animal_pet.confirmed') : '' }}
                                    </td>
                                    <td>
                                        @foreach($animal_pet->photos as $photo)
                                            <img src="{{ $photo->getPhoto() }}" alt="photo animal" height="125px" width="125px">
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($animal_pet->videos as $video)
                                            <video height="150px" width="200px" controls="controls">
                                                <source src="{{ $video->getVideo() }}">
                                            </video>
                                        @endforeach
                                    </td>
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
