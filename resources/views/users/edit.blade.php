@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

@include('layouts.navbar')

<div class="container-fluid" style="max-width: 1100px;">
    <h4 class="form-page-title">Edit User</h4>

    <div class="form-card">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @method('PUT')
            @include('users._form')
        </form>
    </div>
</div>

@endsection