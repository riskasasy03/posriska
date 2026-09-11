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

  /* Wrapper flex di DALAM td, bukan pada td itu sendiri,
     supaya vertical-align: middle bawaan td tetap berfungsi
     dan tombol Aksi sejajar dengan baris lain. */
  .aksi-wrap{
    display: flex;
    align-items: center;
    gap: .5rem;
  }
  .aksi-wrap form{
    display: inline-flex;
  }

  /* ---------- Confirm modal (hapus produk) ---------- */
  .confirm-overlay {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(58, 51, 36, 0.4);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 1000;
  }

  .confirm-overlay.show { display: flex; }

  .confirm-box {
    background: var(--card);
    border-radius: 14px;
    width: 320px;
    padding: 26px 24px 22px;
    text-align: center;
    box-shadow: 0 20px 45px -15px rgba(58,51,36,0.35);
    animation: confirmPop 0.15s ease-out;
  }

  @keyframes confirmPop {
    from { transform: scale(0.92); opacity: 0; }
    to   { transform: scale(1); opacity: 1; }
  }

  .confirm-icon {
    width: 54px;
    height: 54px;
    margin: 0 auto 14px;
    background: #FBE4DA;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .confirm-title {
    font-weight: 800;
    color: var(--ink);
    font-size: 16px;
    margin-bottom: 4px;
  }

  .confirm-sub {
    color: var(--ink-soft);
    font-size: 13px;
    margin-bottom: 20px;
  }

  .confirm-actions {
    display: flex;
    gap: 10px;
  }

  .confirm-actions button {
    flex: 1;
    padding: 10px;
    border-radius: 10px;
    font-weight: 700;
    border: none;
    cursor: pointer;
  }

  .btn-confirm-batal {
    background: var(--butter-soft);
    border: 1.5px solid var(--line) !important;
    color: var(--ink);
  }

  .btn-confirm-batal:hover { background: var(--butter); }

  .btn-confirm-ya {
    background: var(--danger);
    color: #fff;
  }

  .btn-confirm-ya:hover { background: var(--danger-deep); }
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
      <th scope="col">Jenis</th>
      <th scope="col">Harga Pokok</th>
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
      <td>{{ $product->jenis->nama_jenis ?? '-' }}</td>
      <td>{{ $product->harga_beli }}</td>
      <td>{{ $product->harga_jual }}</td>
      <td>{{ $product->stok }}</td>
      <td>
        <div class="aksi-wrap">
          @can('update', $product)
          <a href="{{ route('produk.edit', $product) }}" class="btn btn-edit">Edit</a>
          @endcan
          <span class="aksi-sep">||</span>
          @can('delete', $product)
          <form action="{{ route('produk.destroy', $product) }}" method="POST" onsubmit="return sebelumHapusProduk(event)">
              @csrf
              @method('DELETE')
              <button class="btn btn-hapus">
                  Hapus
              </button>
          </form>
          @endcan
        </div>
      </td>
    </tr>
    @empty
        <tr>
            <td colspan="9"><h1>Data tidak tersedia.</h1></td>
        </tr>
    @endforelse

  {{ $products->links() }}
  </tbody>
</table>
</div>

{{-- ================== MODAL KONFIRMASI HAPUS PRODUK ================== --}}
<div class="confirm-overlay" id="confirmHapusModal">
    <div class="confirm-box">
        <div class="confirm-icon">
            <svg viewBox="0 0 24 24" width="24" height="24">
                <path d="M6 6l12 12M18 6L6 18" fill="none" stroke="#c25e38" stroke-width="2.2" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="confirm-title">Yakin ingin menghapus produk ini?</div>
        <div class="confirm-sub">Tindakan ini tidak bisa dibatalkan.</div>
        <div class="confirm-actions">
            <button type="button" class="btn-confirm-batal" id="btnBatalHapus">Batal</button>
            <button type="button" class="btn-confirm-ya" id="btnYaHapus">Ya, Hapus</button>
        </div>
    </div>
</div>

<script>
    let formHapusTerpending = null;

    function sebelumHapusProduk(e) {
        e.preventDefault();
        formHapusTerpending = e.target;
        document.getElementById('confirmHapusModal').classList.add('show');
        return false;
    }

    document.getElementById('btnYaHapus').addEventListener('click', () => {
        document.getElementById('confirmHapusModal').classList.remove('show');
        if (formHapusTerpending) {
            formHapusTerpending.submit();
        }
    });

    document.getElementById('btnBatalHapus').addEventListener('click', () => {
        document.getElementById('confirmHapusModal').classList.remove('show');
        formHapusTerpending = null;
    });

    document.getElementById('confirmHapusModal').addEventListener('click', (e) => {
        if (e.target.id === 'confirmHapusModal') {
            e.target.classList.remove('show');
            formHapusTerpending = null;
        }
    });
</script>

@endsection