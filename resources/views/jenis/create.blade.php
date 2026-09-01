@extends('layouts.app')

@section('title', 'Tambah Jenis')

@section('content')

<div class="container-fluid" style="max-width: 1100px;">
    <h4 class="form-page-title">Tambah Jenis</h4>
    <div class="form-card">
        <form action="{{ route('jenis.store') }}" method="POST">
            @include('jenis._form')
        </form>
    </div>
</div>

@endsection