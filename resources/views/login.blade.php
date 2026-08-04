{{-- memanggil file app.blade.php --}}
@extends('layouts.app')

{{-- mengirimkan nilai ke title untuk ditampilkan --}}
@section('title', 'Ini Halaman Ujicoba')

{{-- batas awal isi konten --}}
@section('content')

@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
  :root{
    --butter:#F5E7A3;
    --butter-soft:#FBF3D0;
    --ink:#3A3324;
    --ink-soft:#8A8064;
    --accent:#E8B84B;
    --accent-deep:#D6A435;
    --line:#EDE3BE;
  }

  body{
    background:var(--butter-soft);
  }

  .login-card{
    width: 20rem;
    border: none;
    border-radius: 20px;
    background: #FFFDF6;
    box-shadow: 0 20px 50px -18px rgba(58,51,36,0.25);
    overflow: hidden;
  }

  .login-card .card-header{
    background: var(--butter);
    border: none;
    color: var(--ink);
    font-weight: 800;
    font-size: 1.1rem;
    padding: 18px 20px;
  }

  .login-card .card-body{
    padding: 26px 26px 24px;
  }

  .login-card .form-label{
    font-weight: 700;
    font-size: .85rem;
    color: var(--ink);
  }

  .login-card .form-control{
    border: 1.5px solid var(--line);
    border-radius: 10px;
    background: var(--butter-soft);
    padding: .6rem .8rem;
    font-weight: 600;
    color: var(--ink);
  }

  .login-card .form-control:focus{
    border-color: var(--accent);
    background: #FFFDF6;
    box-shadow: none;
  }

  .login-card .btn-primary{
    width: 100%;
    background: var(--accent);
    border: none;
    color: var(--ink);
    font-weight: 800;
    border-radius: 10px;
    padding: .6rem 1rem;
    margin-top: 6px;
  }

  .login-card .btn-primary:hover{
    background: var(--accent-deep);
    color: var(--ink);
  }
</style>

<div class="card login-card text-center position-absolute top-50 start-50 translate-middle">
  <h5 class="card-header">Login POS</h5>
  <div class="card-body">
    <form action="{{ route('auth') }}" method="POST">
      @csrf
      <div class="mb-3 text-start">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('email')
          <div class="badge text-bg-danger mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3 text-start">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        @error('password')
          <div class="badge text-bg-danger mt-1">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

{{-- batas Akhir isi konten --}}
@endsection