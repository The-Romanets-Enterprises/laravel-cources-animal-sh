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
                <a href="{{ route('admin.addresses.create') }}" class="btn btn-primary mb-3">{{ __('messages.address.create') }}</a>

                @if(count($addresses))
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Адрес</th>
                            <th>Почтовый индекс</th>
                            <th>Город</th>
                            <th>Пользователь</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($addresses as $address)
                            <tr>
                                <td>{{ $address->id }}</td>
                                <td>{{ $address->address }}</td>
                                <td>{{ $address->post_index }}</td>
                                <td>{{ $address->city->name }}</td>
                                <td>{{ $address->user->name }}</td>
                                <td>
                                    <a href="{{ route('admin.addresses.edit', ['address' => $address->id]) }}" class="btn btn-info btn-sm float-left">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('admin.addresses.destroy', ['address' => $address->id]) }}" method="post" class="float-left ml-1">
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
                @else
                    <p>{{ __('messages.address.none') }}</p>
                @endif
            </div>
            <!-- /.card-body -->

            <div class="card-footer clearfix">
                {{ $addresses->appends(request()->query())->links('vendor.pagination.my-pagination') }}
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
