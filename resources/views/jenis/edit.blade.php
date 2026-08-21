@extends('layouts.app')

@section('title', 'Edit Jenis')

@section('content')

<style>
  :root{ --card:#FFFDF6; --ink:#3A3324; --shadow:0 16px 40px -20px rgba(58,51,36,0.22); }
  .form-page-title{ font-weight: 800; color: var(--ink); margin-bottom: 22px; }
  .form-card{
    background: var(--card);
    border-radius: 16px;
    box-shadow: var(--shadow);
    padding: 28px 26px;
    max-width: 560px;
    margin: 0 auto;
  }
</style>

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