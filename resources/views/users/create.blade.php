@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')

<div class="container-fluid" style="max-width: 1100px;">
    <h4 class="form-page-title">Tambah User</h4>

    <div class="form-card">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @include('users._form')
        </form>
    </div>
</div>

@endsection