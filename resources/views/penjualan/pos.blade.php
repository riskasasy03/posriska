@extends('layouts.app')

@section('title', 'POS')

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

  /* ---------- Card ---------- */
  .pos-card {
    background: var(--card);
    border: 1px solid var(--line);
    border-radius: 10px;
    box-shadow: var(--shadow);
  }

  /* ---------- Search ---------- */
  .pos-search {
    border: 1.5px solid var(--line);
    border-radius: 10px;
    background: var(--card);
    padding: .6rem .9rem;
    font-weight: 600;
  }

  .pos-search:focus {
    border-color: var(--accent);
    box-shadow: none;
    background: var(--card);
  }

  /* ---------- Produk item ---------- */
  .produk-btn {
    border: 1.5px solid var(--line) !important;
    background: var(--butter-soft) !important;
    color: var(--ink) !important;
    border-radius: 10px !important;
    transition: background .15s ease, border-color .15s ease;
  }

  .produk-btn:hover {
    background: var(--butter) !important;
    border-color: var(--accent) !important;
  }

  .produk-nama {
    font-weight: 700;
    color: var(--ink);
  }

  .produk-harga {
    color: var(--ink-soft);
  }

  .produk-qty-input {
    border: 1.5px solid var(--line);
    border-radius: 8px;
    text-align: center;
  }

  .produk-qty-input:focus {
    border-color: var(--accent);
    box-shadow: none;
  }

  .btn-tambah-produk {
    background: var(--accent) !important;
    border: none !important;
    color: var(--ink) !important;
    border-radius: 8px !important;
    font-weight: 700;
    transition: background .1s ease, transform .1s ease;
  }

  .btn-tambah-produk:hover {
    background: var(--accent-deep) !important;
    color: var(--ink) !important;
  }

  .btn-tambah-produk:active {
    background: #B9862A !important;
    transform: scale(0.95);
  }

  /* ---------- Keranjang table ---------- */
  .keranjang-table thead th {
    background: var(--butter-soft);
    color: var(--ink-soft);
    font-size: 12px;
    text-transform: uppercase;
    border: none !important;
    font-weight: 700;
    padding: 12px 20px;
  }

  .keranjang-table td,
  .keranjang-table th {
    border-color: var(--line) !important;
    color: var(--ink);
    font-size: 14px;
    padding: 14px 20px;
    vertical-align: middle;
  }

  .keranjang-table tbody tr:hover {
    background: var(--butter-soft);
  }

  .qty-input-cart {
    border: 1.5px solid var(--line);
    border-radius: 6px;
  }

  /* ---------- Footer / total ---------- */
  .pos-card-footer {
    background: var(--butter-soft);
    border-top: 1px solid var(--line);
    border-radius: 0 0 10px 10px;
    padding: 16px;
  }

  .total-text {
    font-size: 17px;
    color: var(--ink);
  }

  .payment-select {
    border: 1.5px solid var(--line);
    border-radius: 10px;
    background: var(--card);
  }

  .payment-select:focus {
    border-color: var(--accent);
    box-shadow: none;
  }

  /* ---------- Payment detail boxes (Cash / QRIS) ---------- */
  .payment-box {
    background: var(--card);
    border: 1px solid var(--line);
    border-radius: 8px;
    padding: 14px;
    margin-bottom: 12px;
  }

  .payment-box-label {
    font-size: 13px;
    color: var(--ink-soft);
    display: block;
    margin-bottom: 6px;
  }

  .payment-summary-row {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    color: var(--ink-soft);
  }

  .payment-kembalian-row {
    display: flex;
    justify-content: space-between;
    font-size: 16px;
    font-weight: 700;
    color: var(--accent-deep);
    margin-top: 6px;
  }

  .payment-warning {
    display: none;
    color: var(--danger-deep);
    font-size: 12px;
    margin-top: 6px;
  }

  .qris-box {
    text-align: center;
  }

  .qris-box-caption {
    font-size: 12px;
    color: var(--ink-soft);
    margin-top: 6px;
    letter-spacing: 1px;
  }

  .qris-box-total {
    font-size: 16px;
    font-weight: 700;
    color: var(--accent-deep);
    margin-top: 4px;
  }

  /* ---------- Buttons ---------- */
  .btn-checkout-pos {
    background: var(--accent) !important;
    color: var(--ink) !important;
    border: none !important;
    border-radius: 10px !important;
    font-weight: 700;
    transition: background .1s ease, transform .1s ease;
  }

  .btn-checkout-pos:hover {
    background: var(--accent-deep) !important;
    color: var(--ink) !important;
  }

  .btn-checkout-pos:active {
    background: #B9862A !important;
    transform: scale(0.98);
  }

  .btn-batal-pos {
    background: var(--butter-soft) !important;
    border: 1.5px solid var(--line) !important;
    color: var(--ink) !important;
    border-radius: 10px !important;
    font-weight: 700;
    transition: background .1s ease, color .1s ease, transform .1s ease;
  }

  .btn-batal-pos:hover {
    background: var(--butter) !important;
  }

  .btn-batal-pos:active {
    background: var(--danger) !important;
    border-color: var(--danger-deep) !important;
    color: #fff !important;
    transform: scale(0.98);
  }

  .btn-hapus-item {
    background: var(--danger) !important;
    border: none !important;
    color: #fff !important;
    border-radius: 8px !important;
    font-weight: 700;
  }

  .btn-hapus-item:hover {
    background: var(--danger-deep) !important;
  }
</style>

@if(session('errors'))
    <div class="alert alert-danger">
        {{ session('errors') }}
    </div>
@endif

<h4 class="page-title">
    Tambah dan Edit
</h4>

<div class="row">

{{-- ================== PRODUK ================== --}}
<div class="col-md-6">
    <div class="card pos-card">
        <div class="card-body" style="max-height:70vh; overflow:auto">
            <div class="mb-3">
                <form method="GET" action="{{ route('penjualan.create') }}">
                    <input type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control pos-search"
                            placeholder="Cari produk..."
                            onkeyup="this.form.submit()">
                </form>
            </div>
        @foreach($products as $product)
            <form method="POST" action="{{ route('itempenjualan.store') }}" class="row mb-2">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="col-7">
                    <button type="submit" class="btn produk-btn w-100 text-start p-2 {{ $sale->status === 
                    'COMPLETED' ? 'disabled' : '' }}">
                        <div class="d-flex align-items-center gap-2">

                            {{-- Gambar produk --}}
                            <img src="{{ asset('storage/'.$product->foto) }}"
                                 alt="Gambar"
                                 class="rounded-circle"
                                 style="width:45px; height:45px; object-fit:cover;">

                            {{-- Nama & harga --}}
                            <div>
                                <div class="produk-nama">{{ $product->nama }}</div>
                                <small class="produk-harga">{{ number_format($product->harga_jual) }}</small>
                            </div>

                        </div>
                    </button>
                </div>

                <div class="col-3">
                    <input type="number" name="quantity" value="1" min="1"
                            class="form-control produk-qty-input {{ $sale->status === 'COMPLETED' ? 'readonly' : '' }}">
                </div>

                <div class="col-2">
                    <button class="btn btn-tambah-produk w-100 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                    +</button>
                </div>
            </form>
        @endforeach
        </div>
    </div>
</div>

{{-- ================== KERANJANG ================== --}}
<div class="col-md-6">
    <div class="card pos-card">
        <table class="table table-bordered keranjang-table mb-0">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sale->itemPenjualan as $item)
                <!-- Isi tabel akan diisi oleh data keranjang -->
                <tr>
                    <td>{{ $item->produk->nama }}</td>
                    <td>Rp.{{ number_format($item->produk->harga_jual) }}</td>
                    <td>
                        <form method="Post" action=" {{ route('itempenjualan.update', $item->id) }}">
                            @csrf @method('PUT')
                            <input type="number" name="quantity"
                                   value="{{ $item->kuantitas }}"
                                   class="form-control form-control-sm qty-input-cart">
                        </form>
                    </td>
                    <td>Rp {{ number_format($item->subtotal) }}</td>
                    <td>
                        @can('delete', $item)
                        <form method="POST" action="{{ route('itempenjualan.destroy', $item->id) }}">
                            @csrf @method('DELETE')
                            <button class="btn btn-hapus-item btn-sm text-white">Hapus</button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Keranjang kosong.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pos-card-footer">
            <strong class="total-text d-block mb-2">Total: Rp {{ number_format($sale->total_pembayaran) }}</strong>

            <form method="POST"
                  action="{{ route('penjualan.update', $sale->id) }}"
                  onsubmit="return sebelumCheckout(event)" class="mb-2">
                @csrf
                @method('PUT')

                <select name="payment_method" id="paymentMethod" class="form-select payment-select mb-2" onchange="toggleMetode()">
                    <option value="">Pilih Pembayaran</option>
                    <option value="CASH">Cash</option>
                    <option value="QRIS">QRIS</option>
                </select>

                {{-- ---- Detail Pembayaran Cash ---- --}}
                <div id="cashBox" class="payment-box" style="display:none;">
                    <label class="payment-box-label">Uang Diterima</label>
                    <input type="number" name="uang_diterima" id="uangDiterima" oninput="hitungKembalian()"
                           placeholder="0" class="form-control mb-2">

                    <div class="payment-summary-row">
                        <span>Total Belanja</span>
                        <span>Rp {{ number_format($sale->total_pembayaran) }}</span>
                    </div>
                    <div class="payment-kembalian-row">
                        <span>Kembalian</span>
                        <span id="kembalianLabel">Rp 0</span>
                    </div>
                    <div id="kurangWarning" class="payment-warning">Uang belum cukup</div>
                </div>

                {{-- ---- Detail Pembayaran QRIS ---- --}}
                <div id="qrisBox" class="payment-box qris-box" style="display:none;">
                    <img id="qrisImg" src="" alt="QRIS" style="width:150px; height:150px;">
                    <div class="qris-box-caption">SCAN UNTUK BAYAR</div>
                    <div class="qris-box-total">
                        Rp {{ number_format($sale->total_pembayaran) }}
                    </div>
                </div>

                <button class="btn btn-checkout-pos w-100 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                    Checkout
                </button>
            </form>

            @can('delete', $sale)
            <form action="{{ route('penjualan.destroy', $sale->id) }}"
                  method="POST"
                  onsubmit="return confirm('Yakin ingin membatalkan transaksi!?')" class="mt-2">
                @csrf
                @method('DELETE')
                <button class="btn btn-batal-pos w-100 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                    Batal Transaksi
                </button>
            </form>
            @endcan
        </div>
    </div>
</div>

</div>

<script>
    const totalBelanja = {{ $sale->total_pembayaran }};

    function toggleMetode() {
        const metode = document.getElementById('paymentMethod').value;
        document.getElementById('cashBox').style.display = 'none';
        document.getElementById('qrisBox').style.display = 'none';

        if (metode === 'CASH') {
            document.getElementById('uangDiterima').value = '';
            document.getElementById('kembalianLabel').innerText = 'Rp 0';
            document.getElementById('cashBox').style.display = 'block';
        } else if (metode === 'QRIS') {
            document.getElementById('qrisImg').src =
                'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' + encodeURIComponent('TOTAL:' + totalBelanja);
            document.getElementById('qrisBox').style.display = 'block';
        }
    }

    function hitungKembalian() {
        const diterima = parseFloat(document.getElementById('uangDiterima').value) || 0;
        const kembalian = diterima - totalBelanja;
        const label = document.getElementById('kembalianLabel');
        const warning = document.getElementById('kurangWarning');

        if (kembalian < 0) {
            label.innerText = 'Rp 0';
            warning.style.display = 'block';
        } else {
            label.innerText = 'Rp ' + kembalian.toLocaleString('id-ID');
            warning.style.display = 'none';
        }
    }

    function sebelumCheckout(e) {
        const metode = document.getElementById('paymentMethod').value;

        if (!metode) {
            alert('Pilih metode pembayaran dulu');
            e.preventDefault();
            return false;
        }

        if (metode === 'CASH') {
            const diterima = parseFloat(document.getElementById('uangDiterima').value) || 0;
            if (diterima < totalBelanja) {
                alert('Uang diterima kurang dari total belanja');
                e.preventDefault();
                return false;
            }
        }

        return confirm('Yakin ingin checkout?');
    }
</script>
@endsection