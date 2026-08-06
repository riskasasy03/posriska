@extends('layouts.app')

@section('title', 'Produk')

@section('content')

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
  .btn-create:active{
    background: #B9862A;
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
  .btn-edit:active{
    background: #B9862A;
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
  .btn-hapus:active{
    background: #A8492A;
  }

  .aksi-sep{
    color: var(--line);
  }
</style>

@include('layouts.navbar')

<h1 class="page-title">Daftar Produk</h1>

@can('create', App\Models\Produk::class)
<a href="{{ route('produk.create') }}" method="GET" class="btn btn-create mb-3">Create</a>
@endcan

<form action="{{ route('produk.index') }}" method="GET" class="mb-3 search-form">
    <div class="input-group">
        <input 
            type="text"
            name="search"
            value=""
            class="form-control"
            placeholder="Search nama produk"
        >
        <button class="btn" type="submit">
            Search
        </button>
    </div>
</form>

<div class="table-card">
<table class="table mb-0">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">User</th>
      <th scope="col">Foto</th>
      <th scope="col">Nama</th>
      <th scope="col">Harga Beli</th>
      <th scope="col">Harga Jual</th>
      <th scope="col">Stok</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($products as $product)
    <tr>
      <th scope="row">{{ $products->firstItem() + $loop->index }}</th>
      <td>{{ $product->user->name }}</td>
      <td>
        <img src="{{ asset('storage/'.$product->foto) }}" 
            width="100"
            class="img-thumbnail">
      </td>
      <td>{{ $product->nama }}</td>
      <td>{{ $product->harga_beli }}</td>
      <td>{{ $product->harga_jual }}</td>
      <td>{{ $product->stok }}</td>
      <td class="d-flex gap-1 align-items-center">
        @can('update', $product)
        <a href="{{ route('produk.edit', $product) }}" class="btn btn-edit">Edit</a>
        @endcan
        <span class="aksi-sep">||</span>
        @can('delete', $product)
        <form action="{{ route('produk.destroy', $product) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-hapus" onclick="return confirm('Apakah anda yakin menghapus user ini?')">
                Hapus
            </button>
        </form>
        @endcan
      </td>
    </tr>
    @empty
        <tr>
            <td collspan=8><h1>Data tidak tersedia.</h1></td>
        </tr>
    @endforelse

  {{ $products->links() }}
  </tbody>
</table>
</div>

@endsection