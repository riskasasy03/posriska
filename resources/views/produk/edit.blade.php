@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')

@include('layouts.navbar')

<h4 class="form-page-title">Edit Produk</h4>

<div class="form-card">
    <form action="{{ route('produk.update', $produk) }}"
          method="POST"
          enctype="multipart/form-data">
          @method('PUT')
    @include('Produk._form')
    </form>
</div>
@endsection