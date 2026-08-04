@extends('layouts.app')

@section('title', 'Penjualan')

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
    --success:#3FA66B;        /* tambahan untuk badge status */
    --success-soft:#E6F5EC;
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
    background: var(--accent);
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
    background: var(--butter);
    color: var(--ink);
    font-weight: 700;
  }
  .search-form .btn:hover{
    background: var(--accent);
    color: var(--ink);
  }

  .table-card{
    background: var(--card);
    border: 1.5px solid var(--line);
    border-radius: 14px;
    box-shadow: var(--shadow);
    overflow: hidden;
    padding: 12px;
  }

  .table-card table{
    border-collapse: separate;
    border-spacing: 0;
  }

  .table-card thead th{
    background: var(--butter-soft);
    color: var(--ink-soft);
    font-size: 12px;
    text-transform: uppercase;
    border: 1px solid var(--line);
    border-top: none;
    font-weight: 700;
    padding: 14px 22px;
  }
  .btn-detail{
    background: var(--ink);
    border: 1.5px solid var(--ink);
    color: var(--butter-soft);
    font-weight: 700;
    border-radius: 8px;
    padding: .45rem 1rem;
  }
  .btn-detail:hover{
    background: #2A251A;
    color: var(--butter-soft);
  }
  .badge-status{
    display:inline-block;
    padding:.35rem .75rem;
    border-radius:20px;
    font-size:12px;
    font-weight:700;
    text-transform:uppercase;
  }
  .badge-completed{
    background: var(--success-soft);
    color: var(--success);
  }
  .badge-pending{
    background:#FDECD3;
    color:#B5791A;
  }
  .badge-cancelled{
    background:#FBE3DC;
    color: var(--danger-deep);
  }
  .aksi-sep{
    color: var(--ink-soft);
  }
</style>

<div class="page-wrap">

  @if(session('errors'))
  <div class="alert alert-danger">
      {{ session('errors') }}
  </div>
  @endif

  <h1 class="page-title">Halaman Penjualan</h1>

  <a href="{{ route('penjualan.create') }}" class="btn btn-create">Create</a>

  <form action="{{ route('penjualan.index') }}" method="GET" class="mb-3 search-form">
      <div class="input-group">
          <input
                  type="text"
                  name="search"
                  value="{{ request()->search }}"
                  class="form-control"
                  placeholder="Search penjualan"
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
          <th scope="col">Tanggal Transaksi</th>
          <th scope="col">Kasir</th>
          <th scope="col">Total Pembayaran</th>
          <th scope="col">Metode Pembayaran</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($sales as $sale)
        <tr>
          <th scope="row">{{$sales->firstItem() + $loop->index}}</th>
          <th>{{$sale->created_at->translatedFormat('d-m-Y H:i:s')}}</th>
          <td>{{$sale->user->name}}</td>
          <td>Rp.{{number_format($sale->total_pembayaran)}}</td>
          <td>{{$sale->metode_pembayaran}}</td>
          <td>{{$sale->status}}</td>
          <td>
             <a href="" class="btn btn-sm btn-detail">Detail</a>
             @can('view', $sale)
             <span class="aksi-sep">||</span>
             <a href="{{ route('penjualan.edit', $sale) }}" class="btn btn-sm btn-edit">Edit</a>
             @endcan
             @can('delete', $sale)
             <span class="aksi-sep">||</span>
             <form action="{{ route('penjualan.destroy', $sale) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-hapus" onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">
                     Hapus
                </button>
             </form>
             @endcan
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="7">Data Tidak Ditemukan</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{$sales->links()}}

</div>

@endsection