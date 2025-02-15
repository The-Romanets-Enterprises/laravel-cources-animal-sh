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
            <a href="{{ route("admin.photos.create") }}"
            class="btn btn-dark mb-3">{{ __('messages.photo.create') }}</a>

            @if(count($photos))
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Вид животного</th>
                    <th>Фото</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($photos as $photo)
                <tr>
                    <td>{{ $photo->id}}</td>
                    <td>{{ $photo->animal->name }}</td>
                    <td>{{ $photo->path }}</td>
                    <td>
                        <a href="{{ route("admin.photos.edit", ['photo' => $photo->id]) }}"
                        class="btn btn-info btn-sm float-left">
                        <i class="fas fa-pencil-alt"></i>
                        </a>
                        @if(auth()->user()->role == \App\Enum\Role::ADMIN)
                        <form action="{{ route("admin.photos.destroy", ['photo' => $photo->id]) }}"
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
            <p>{{ __('messages.photo.none') }}</p>
            @endif
        </div>
        <!-- /.card-body -->

        <div class="card-footer clearfix">
            {{ $photos->appends(request()->query())->links('vendor.pagination.my-pagination') }}
        </div>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

{{--    @include('admin.layouts.datatable-script')--}}
@endsection
