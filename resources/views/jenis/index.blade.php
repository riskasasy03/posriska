@extends('layouts.app')

@section('title', 'Jenis Produk')

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
  .page-wrap{ max-width: 1100px; margin: 0 auto; padding: 0 20px; }
  .page-title{ font-weight: 800; color: var(--ink); margin-bottom: 18px; }

  .btn-create{
    background: var(--accent); border: none; color: var(--ink);
    font-weight: 700; border-radius: 10px; padding: .5rem 1.2rem; margin-bottom: 20px;
  }
  .btn-create:hover{ background: var(--accent-deep); color: var(--ink); }

  .search-form .form-control{
    border: 1.5px solid var(--line); border-radius: 10px 0 0 10px;
    background: var(--card); padding: .6rem .9rem; font-weight: 600;
  }
  .search-form .form-control:focus{ border-color: var(--accent); box-shadow: none; }
  .search-form .btn{
    border-radius: 0 10px 10px 0; border: 1.5px solid var(--line); border-left: none;
    background: var(--card); color: var(--ink-soft); font-weight: 700;
  }
  .search-form .btn:hover{ background: var(--butter); color: var(--ink); }

  .table-card{
    background: var(--card); border-radius: 16px; box-shadow: var(--shadow);
    overflow: hidden; padding: 4px;
  }
  .table-card table{ margin-bottom: 0; }
  .table-card thead th{
    background: var(--butter-soft); color: var(--ink-soft); font-size: 12px;
    text-transform: uppercase; letter-spacing: .05em; border: none;
    font-weight: 700; padding: 12px 20px;
  }
  .table-card tbody td{
    border-color: var(--line); color: var(--ink); font-size: 14px;
    padding: 14px 20px; vertical-align: middle;
  }

  .btn-edit{ background: var(--accent); border: none; color: var(--ink); font-weight: 700; border-radius: 8px; }
  .btn-edit:hover{ background: var(--accent-deep); color: var(--ink); }
  .btn-hapus{ background: var(--danger); border: none; color: #fff; font-weight: 700; border-radius: 8px; }
  .btn-hapus:hover{ background: var(--danger-deep); }
  .aksi-sep{ color: var(--line); margin: 0 4px; }

  /* ---------- Confirm modal (hapus jenis) ---------- */
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

<div class="page-wrap">

  <h1 class="page-title">Halaman Jenis Produk</h1>
  <a href="{{ route('jenis.create') }}" class="btn btn-create">Create</a>

  <form action="{{ route('jenis.index') }}" method="GET" class="mb-3 search-form">
    <div class="input-group">
      <input type="text" name="search" value="{{ request('search') }}"
             class="form-control" placeholder="Search nama jenis">
      <button class="btn" type="submit">Search</button>
    </div>
  </form>

  <div class="table-card">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Jenis</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($jenis as $item)
        <tr>
            <td>{{ $jenis->firstItem() + $loop->index }}</td>
            <td>{{ $item->nama_jenis }}</td>

            <td>
                <a href="{{ route('jenis.edit', $item) }}" class="btn btn-sm btn-edit">Edit</a>
                <span class="aksi-sep">||</span>
                <form action="{{ route('jenis.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return sebelumHapusJenis(event)">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-hapus">
                      Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-muted text-center">Belum ada jenis produk.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-3">
    {{ $jenis->links() }}
  </div>

</div>

{{-- ================== MODAL KONFIRMASI HAPUS JENIS ================== --}}
<div class="confirm-overlay" id="confirmHapusJenisModal">
    <div class="confirm-box">
        <div class="confirm-icon">
            <svg viewBox="0 0 24 24" width="24" height="24">
                <path d="M6 6l12 12M18 6L6 18" fill="none" stroke="#c25e38" stroke-width="2.2" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="confirm-title">Yakin hapus jenis ini?</div>
        <div class="confirm-sub">Produk terkait tidak ikut terhapus.</div>
        <div class="confirm-actions">
            <button type="button" class="btn-confirm-batal" id="btnBatalHapusJenis">Batal</button>
            <button type="button" class="btn-confirm-ya" id="btnYaHapusJenis">Ya, Hapus</button>
        </div>
    </div>
</div>

<script>
    let formHapusJenisTerpending = null;

    function sebelumHapusJenis(e) {
        e.preventDefault();
        formHapusJenisTerpending = e.target;
        document.getElementById('confirmHapusJenisModal').classList.add('show');
        return false;
    }

    document.getElementById('btnYaHapusJenis').addEventListener('click', () => {
        document.getElementById('confirmHapusJenisModal').classList.remove('show');
        if (formHapusJenisTerpending) {
            formHapusJenisTerpending.submit();
        }
    });

    document.getElementById('btnBatalHapusJenis').addEventListener('click', () => {
        document.getElementById('confirmHapusJenisModal').classList.remove('show');
        formHapusJenisTerpending = null;
    });

    document.getElementById('confirmHapusJenisModal').addEventListener('click', (e) => {
        if (e.target.id === 'confirmHapusJenisModal') {
            e.target.classList.remove('show');
            formHapusJenisTerpending = null;
        }
    });
</script>

@endsection