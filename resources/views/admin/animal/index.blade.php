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
                <a href="{{ route("admin.animals.create") }}" class="btn btn-primary mb-3">{{ __('messages.animal.create') }}</a>

                @if(count($animals))
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Название</th>
                            <th>Фото</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($animals as $animal)
                            <tr>
                                <td>{{ $animal->id }}</td>
                                <td>{{ $animal->name }}</td>
                                <td><img src="{{ $animal->getPhoto() }}" alt="Фото животного" width="100"></td>
                                @if(auth()->user()->role == \App\Enums\Role::ADMIN)
                                    <td>
                                        <a href="{{ route("admin.animals.edit", ['animal' => $animal->id]) }}" class="btn btn-info btn-sm float-left">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <form action="{{ route("admin.animals.destroy", ['animal' => $animal->id]) }}" method="post" class="float-left ml-1">
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
                @else
                    <p>{{ __('messages.animal.none') }}</p>
                @endif
            </div>
            <!-- /.card-body -->

            <div class="card-footer clearfix">
                {{ $animals->appends(request()->query())->links('vendor.pagination.my-pagination') }}
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

    {{--    @include('admin.layouts.datatable-script')--}}
@endsection
