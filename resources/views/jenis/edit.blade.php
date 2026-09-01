@extends('layouts.app')

@section('title', 'Edit Jenis')

@section('content')

<div class="container-fluid" style="max-width: 1100px;">
    <h4 class="form-page-title">Edit Jenis</h4>
    <div class="form-card">
        <form action="{{ route('jenis.update', $jenis) }}" method="POST">
            @method('PUT')
            @include('jenis._form')
        </form>
    </div>
</div>

@endsection