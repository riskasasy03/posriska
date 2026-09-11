@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

@include('layouts.navbar')

<h4 class="form-page-title">Tambah Produk</h4>

<div class="form-card">
    <form action="{{ route('produk.store') }}" 
          method="POST"
          enctype="multipart/form-data">
    @include('Produk._form')
    </form>
</div>
@endsection