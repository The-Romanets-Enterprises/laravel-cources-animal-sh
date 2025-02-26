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
                <a href="{{ route('admin.animal_pets.create') }}" class="btn btn-primary mb-3">{{ __('messages.animal_pet.create') }}</a>

                @if (count($animalPets))
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Вид животного</th>
                                <th>Пол, Кличка</th>
                                <th>Описание</th>
                                <th>Пользователь</th>
                                <th>Дата рождения</th>
                                <th>Статус</th>
                                <th>Тип шерсти</th>
                                <th>Характер</th>
                                <th>Фото</th>
                                <th>Видео</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($animalPets as $animalPet)
                                <tr>
                                    <td>{{ $animalPet->id }}</td>
                                    <td>{{ $animalPet->animal->name }}</td>
                                    <td>
                                        @php
                                            $sexTitle = $animalPet->sex instanceof \App\Enums\Sex
                                                ? $animalPet->sex->getTitle()
                                                : \App\Enums\Sex::from($animalPet->sex)->getTitle();
                                        @endphp
                                        {{ $sexTitle }}, {{ $animalPet->name }}
                                    </td>
                                    <td>{!! $animalPet->description !!}</td>
                                    <td>{{ $animalPet->user->full_name }}</td>
                                    <td>{{ $animalPet->birth_date ? $animalPet->birth_date->format('d.m.Y') : 'Нет данных' }}</td>
                                    <td>
                                        @php
                                            $statuses = [];
                                            if ($animalPet->is_sterilized) $statuses[] = 'Стерилизован';
                                            if ($animalPet->has_vaccination) $statuses[] = 'Вакцинирован';
                                            if ($animalPet->is_confirmed) $statuses[] = 'Заявка подтверждена';
                                        @endphp
                                        {{ count($statuses) ? implode(', ', $statuses) : 'Нет данных' }}
                                    </td>

                                    <td>{{ $animalPet->wool_type }}</td>
                                    <td>{!! $animalPet->character !!}</td>
                                    <td>
                                        @if ($animalPet->photos->isNotEmpty())
                                            @foreach ($animalPet->photos as $photo)
                                                <img src="{{ asset('storage/' . $photo->path) }}"
                                                     width="150" height="150"
                                                     alt="Фото {{ $animalPet->name }}"
                                                     class="mr-2">
                                            @endforeach
                                        @else
                                            <span>Фотографии отсутствуют</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($animalPet->videos->isNotEmpty())
                                            @foreach ($animalPet->videos as $video)
                                                <video width="150" height="150" controls>
                                                    <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @endforeach
                                        @else
                                            <span>Видео отсутствуют</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.animal_pets.edit', ['animal_pet' => $animalPet->id]) }}" class="btn btn-info btn-sm float-left">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('admin.animal_pets.destroy', ['animal_pet' => $animalPet->id]) }}" method="post" class="float-left ml-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('{{ __('Подтвердите удаление') }}')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
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
                {{ $animalPets->appends(request()->query())->links('vendor.pagination.my-pagination') }}
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
