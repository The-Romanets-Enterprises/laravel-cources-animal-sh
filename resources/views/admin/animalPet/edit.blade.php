@extends('layouts.layout')

@section('title') {{ $title ?? null }} @endsection

@section('content')
    <!-- Content Header (Page header) -->
    @include('layouts.page-header')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('messages.request.single') }} {{ $animalPet->id }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.animalPets.update', [$animalPet]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('messages.update') }}</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
