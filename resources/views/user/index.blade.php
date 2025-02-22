@extends('layouts.layout')

@section('title') {{ $title ?? null }} @endsection

@section('content')
    <!-- Content Header (Page header) -->
    @include('layouts.page-header')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </section>
@endsection
