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
                <a href="{{ route("admin.animal-pets.create") }}"
                   class="btn btn-dark mb-3">{{ __('messages.request.create') }}</a>

                @if(count($animalPets))
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Одобрена</th>
                            <th>Вид</th>
                            <th>Пол</th>
                            <th>Заявитель</th>
                            <th>Описание/характер</th>
                            <th>Дата рождения</th>
                            <th>Стерилизован</th>
                            <th>Вакцинирован</th>
                            <th>Фото</th>
                            <th>Видео</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($animalPets as $animalPet)
                            <tr>
                                <td>{{ $animalPet->id}}</td>
                                <td>{{ $animalPet->is_confirmed ? 'Да' : 'Нет' }}</td>
                                <td>{{ $animalPet->animal->name}}</td>
                                <td>{{ $animalPet->sex->getTitle() }}</td>
                                <td>{{ $animalPet->user->full_name }}</td>
                                <td>Описание: {!! $animalPet->description !!}<br>Характер: {!! $animalPet->character !!}</br><br>Тип шерсти: {!! $animalPet->wool_type !!}</br></td>
                                <td>{{ $animalPet->birth_date->format('d-M-Y') }}</td>
                                <td>{{ $animalPet->is_sterilized ? 'Да' : 'Нет' }}</td>
                                <td>{{ $animalPet->has_vaccination ? 'Да' : 'Нет' }}</td>
                                <td>
                                    @if ($animalPet->photos->isNotEmpty())
                                        @foreach ($animalPet->photos as $photo)
                                            <img src="{{ asset('storage/' . $photo->path) }}"
                                                 width="150" height="150"
                                                 alt="Фото {{ $animalPet->id }}"
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
                                    <a href="{{ route("admin.animal-pets.edit", [$animalPet]) }}"
                                       class="btn btn-info btn-sm float-left">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    @if(auth()->user()->role == \App\Enum\Role::ADMIN)
                                        <form action="{{ route("admin.animal-pets.destroy", [$animalPet]) }}"
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
                {{ $animalPets->appends(request()->query())->links('vendor.pagination.my-pagination') }}
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

    {{--    @include('admin.layouts.datatable-script')--}}
@endsection
