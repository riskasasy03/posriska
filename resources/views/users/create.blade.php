@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')

<style>
  :root{
    --card:#FFFDF6;
    --ink:#3A3324;
    --shadow:0 16px 40px -20px rgba(58,51,36,0.22);
  }

  .form-page-title{
    font-weight: 800;
    color: var(--ink);
    margin-bottom: 22px;
  }

  .form-card{
    background: var(--card);
    border-radius: 10px;
    box-shadow: var(--shadow);
    padding: 28px 26px;
  }
</style>

<div class="container-fluid" style="max-width: 1100px;">
    <h4 class="form-page-title">Tambah User</h4>

    <div class="form-card">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @include('users._form')
        </form>
    </div>
</div>

@endsection