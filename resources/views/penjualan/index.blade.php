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

  .aksi-sep{
    color: var(--ink-soft);
  }

  /* ===== Modal overlay ===== */
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

  /* ===== Struk (receipt) ===== */
  .receipt-box {
    background: var(--card);
    border-radius: 4px;
    width: 320px;
    box-shadow: 0 15px 35px rgba(180, 150, 40, 0.25);
    animation: popIn 0.2s ease-out;
    padding-bottom: 20px;
  }
  @keyframes popIn {
    from { transform: scale(0.9); opacity: 0; }
    to   { transform: scale(1); opacity: 1; }
  }

  .receipt-zigzag{
    height: 10px;
    width: 100%;
    background:
      linear-gradient(135deg, var(--card) 50%, transparent 50%) 0 0/12px 12px repeat-x,
      linear-gradient(-135deg, var(--card) 50%, transparent 50%) 0 0/12px 12px repeat-x;
    background-color: rgba(60, 50, 20, 0.35);
  }

  .receipt-header{
    padding: 22px 26px 0;
    text-align: center;
  }
  .receipt-icon-wrap {
    width: 56px;
    height: 56px;
    margin: 0 auto 14px;
    background: var(--butter);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .receipt-icon-wrap.pending{
    background: var(--butter-soft);
    border: 1.5px dashed var(--accent-deep);
  }
  .receipt-header h2 {
    margin: 0;
    color: var(--ink);
    font-size: 17px;
    font-weight: 700;
  }
  .receipt-sub {
    margin: 6px 0 0;
    color: var(--ink-soft);
    font-size: 12px;
  }

  .receipt-section{
    margin: 16px 26px 0;
    padding-top: 14px;
    border-top: 1px dashed var(--line);
  }
  .receipt-row{
    display: flex;
    justify-content: space-between;
    gap: 12px;
    font-size: 12.5px;
    color: var(--ink-soft);
    margin-bottom: 6px;
  }
  .receipt-row:last-child{ margin-bottom: 0; }
  .receipt-row span:last-child{
    color: var(--ink);
    font-weight: 600;
    text-align: right;
  }
  .receipt-row.total span{
    color: var(--ink);
    font-size: 14px;
    font-weight: 800;
  }

  .receipt-status{
    display: inline-block;
    margin-top: 2px;
    padding: 2px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    background: var(--success-soft);
    color: var(--success);
  }
  .receipt-status.pending{
    background: var(--butter);
    color: var(--accent-deep);
  }

  .receipt-footer{
    margin: 18px 26px 0;
  }
  .btn-tutup {
    width: 100%;
    background: var(--accent);
    border: none;
    padding: 11px;
    border-radius: 8px;
    font-weight: 700;
    color: var(--ink);
    cursor: pointer;
  }
  .btn-tutup:hover { background: var(--accent-deep); }
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
            <button
              type="button"
              class="btn btn-sm btn-detail"
              data-id="{{$sale->id}}"
              data-tanggal="{{$sale->created_at->translatedFormat('d-m-Y H:i')}}"
              data-kasir="{{$sale->user->name}}"
              data-total="Rp.{{number_format($sale->total_pembayaran)}}"
              data-metode="{{$sale->metode_pembayaran}}"
              data-status="{{$sale->status}}"
            >Detail</button>
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
      <div class="receipt-box">
        <div class="receipt-zigzag"></div>

        <div class="receipt-header">
          <div class="receipt-icon-wrap" id="rcIconWrap">
            <svg id="rcIconCheck" viewBox="0 0 24 24" width="28" height="28">
              <path d="M5 13l4 4L19 7" fill="none" stroke="#8a6d1f" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <svg id="rcIconPending" viewBox="0 0 24 24" width="26" height="26" style="display:none;">
              <circle cx="12" cy="12" r="9" fill="none" stroke="#a3792a" stroke-width="2.2"/>
              <path d="M12 7v5l3.5 2" fill="none" stroke="#a3792a" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h2 id="rcTitle">Transaksi telah selesai</h2>
          <p class="receipt-sub" id="rcTransaksiId">#—</p>
        </div>

        <div class="receipt-section">
          <div class="receipt-row"><span>Tanggal</span><span id="rcTanggal">-</span></div>
          <div class="receipt-row"><span>Kasir</span><span id="rcKasir">-</span></div>
        </div>

        <div class="receipt-section">
          <div class="receipt-row"><span>Metode pembayaran</span><span id="rcMetode">-</span></div>
          <div class="receipt-row">
            <span>Status</span>
            <span><span class="receipt-status" id="rcStatus">-</span></span>
          </div>
        </div>

        <div class="receipt-section">
          <div class="receipt-row total"><span>Total pembayaran</span><span id="rcTotal">-</span></div>
        </div>

        <div class="receipt-footer">
          <button class="btn-tutup" id="closeModalBtn">Tutup</button>
        </div>
      </div>
    </div>

    <script>
      const modal = document.getElementById('successModal');

      document.querySelectorAll('.btn-detail').forEach(btn => {
        btn.addEventListener('click', () => {
          document.getElementById('rcTransaksiId').textContent = '#' + btn.dataset.id;
          document.getElementById('rcTanggal').textContent = btn.dataset.tanggal;
          document.getElementById('rcKasir').textContent = btn.dataset.kasir;
          document.getElementById('rcMetode').textContent = btn.dataset.metode;
          document.getElementById('rcTotal').textContent = btn.dataset.total;

          const status = btn.dataset.status;
          const isPaid = ['lunas', 'complete', 'completed'].includes(status.toLowerCase());

          const statusEl = document.getElementById('rcStatus');
          statusEl.textContent = status;
          statusEl.classList.toggle('pending', !isPaid);

          document.getElementById('rcTitle').textContent = isPaid
            ? 'Transaksi telah selesai'
            : 'Menunggu pembayaran';

          document.getElementById('rcIconWrap').classList.toggle('pending', !isPaid);
          document.getElementById('rcIconCheck').style.display = isPaid ? 'block' : 'none';
          document.getElementById('rcIconPending').style.display = isPaid ? 'none' : 'block';

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