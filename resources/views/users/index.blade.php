@extends('layouts.app')

@section('title', 'Users')

@section('content')

@include('layouts.navbar')

<style>
  :root{
    --butter:#F5E7A3;
    --butter-soft:#FBF3D0;
    --card:#FFFDF6;
    --ink:#3A3324;
    --ink-soft:#8A8064;
    --accent:#E8B84B;
    --accent-deep:#D6A435;
    --danger:#D9724A;
    --danger-deep:#C25E38;
    --line:#EDE3BE;
    --shadow:0 16px 40px -20px rgba(58,51,36,0.22);
  }

  body{ background: var(--butter-soft); }

  .page-title{
    font-weight: 800;
    color: var(--ink);
    margin-bottom: 18px;
  }

  .btn-create{
    background: var(--accent);
    border: none;
    color: var(--ink);
    font-weight: 700;
    border-radius: 10px;
    padding: .5rem 1.2rem;
    margin-bottom: 20px;
  }
  .btn-create:hover{
    background: var(--accent-deep);
    color: var(--ink);
  }

  .search-form .form-control{
    border: 1.5px solid var(--line);
    border-radius: 10px 0 0 10px;
    background: var(--card);
    padding: .6rem .9rem;
    font-weight: 600;
  }
  .search-form .form-control:focus{
    border-color: var(--accent);
    box-shadow: none;
  }
  .search-form .btn{
    border-radius: 0 10px 10px 0;
    border: 1.5px solid var(--line);
    border-left: none;
    background: var(--card);
    color: var(--ink-soft);
    font-weight: 700;
  }
  .search-form .btn:hover{
    background: var(--butter);
    color: var(--ink);
  }

  .table-card{
    background: var(--card);
    border-radius: 10px;
    box-shadow: var(--shadow);
    overflow: hidden;
    padding: 4px;
  }

  .table-card thead th{
    background: var(--butter-soft);
    color: var(--ink-soft);
    font-size: 12px;
    text-transform: uppercase;
    border: none;
    font-weight: 700;
    padding: 12px 20px;
  }
  .table-card tbody td{
    border-color: var(--line);
    color: var(--ink);
    font-size: 14px;
    padding: 14px 20px;
    vertical-align: middle;
  }

  .btn-edit{
    background: var(--accent);
    border: none;
    color: var(--ink);
    font-weight: 700;
    border-radius: 8px;
  }
  .btn-edit:hover{
    background: var(--accent-deep);
    color: var(--ink);
  }
  .btn-hapus{
    background: var(--danger);
    border: none;
    color: #fff;
    font-weight: 700;
    border-radius: 8px;
  }
  .btn-hapus:hover{
    background: var(--danger-deep);
  }

</style>

<div class="page-wrap">

  <h1 class="page-title">Halaman Users</h1>
  <a href="{{ route('admin.users.create') }}" class="btn btn-create">Create</a>

  <form action="{{ route('admin.users') }}" method="GET" class="mb-3 search-form">
    <div class="input-group">
      <input type="text"
             name="search"
             value="{{ request('search') }}"
             class="form-control"
             placeholder="Search username or email"
      >
      <button class="btn" type="submit">
        Search
      </button>
    </div>
  </form>

  <div class="table-card">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $users->firstItem() + $loop->index }}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>
                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-edit">
                    Edit Akun
                </a>
                <span class="aksi-sep">||</span>
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-hapus" onclick="return confirm('Yakin hapus user ini?')">
                      Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>

@endsection