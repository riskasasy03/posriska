@extends('layouts.app')

@section('title', 'Penjualan')

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
    background: #000000;
    color: var(--butter-soft);
  }
.modal-overlay {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(60, 50, 20, 0.35);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 1000;
  }
  .modal-overlay.show { display: flex; }
 
  .modal-box {
    background: #FFF6D9;
    border: 1px solid #F0DFA0;
    border-radius: 16px;
    padding: 40px 35px 32px;
    text-align: center;
    width: 330px;
    box-shadow: 0 15px 35px rgba(180, 150, 40, 0.25);
    animation: popIn 0.2s ease-out;
  }
  @keyframes popIn {
    from { transform: scale(0.9); opacity: 0; }
    to   { transform: scale(1); opacity: 1; }
  }
 
  .modal-icon-wrap {
    width: 70px;
    height: 70px;
    margin: 0 auto 18px;
    background: #F5DE85;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  }
 
  .modal-box h2 {
    margin: 0 0 6px;
    color: #4a3c0d;
    font-size: 19px;
  }
  .modal-sub {
    margin: 0 0 24px;
    color: #8a763a;
    font-size: 13px;
  }
 
  .btn-tutup {
    background: #E7BE4C;
    border: none;
    padding: 10px 34px;
    border-radius: 8px;
    font-weight: bold;
    color: #2b2b2b;
    cursor: pointer;
  }
  .btn-tutup:hover { background: #d4ac3a; }
  .aksi-sep{
    color: var(--ink-soft);
  }
</style>

@include('layouts.navbar')

  @if(session('errors'))
  <div class="alert alert-danger">
      {{ session('errors') }}
  </div>
  @endif

  <h1 class="page-title">Riwayat Penjualan</h1>

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
            <button type="button" class="btn btn-sm btn-detail" onclick="showDetailPennjualan('Lunas')">Detail</button>
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

      <div class="modal-overlay" id="successModal">
    <div class="modal-box">
      <div class="modal-icon-wrap">
        <svg viewBox="0 0 24 24" width="34" height="34">
          <path d="M5 13l4 4L19 7" fill="none" stroke="#8a6d1f" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <h2>Transaksi telah Selesai</h2>
      <button class="btn-tutup" id="closeModalBtn">Tutup</button>
    </div>
  </div>
  
  <script>
    const modal = document.getElementById('successModal');
  
    document.querySelectorAll('.btn-detail').forEach(btn => {
      btn.addEventListener('click', () => {
        modal.classList.add('show');
      });
    });
  
    document.getElementById('closeModalBtn').addEventListener('click', () => {
      modal.classList.remove('show');
    });
  
    // klik di luar modal-box juga nutup
    modal.addEventListener('click', (e) => {
      if (e.target === modal) modal.classList.remove('show');
    });
  </script>

  </div>

  {{$sales->links()}}

</div>

@endsection