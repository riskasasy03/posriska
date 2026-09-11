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
    background-color: var(--card);
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

  /* ---------- Confirm modal (checkout & batal) ---------- */
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
    background: var(--butter);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .confirm-icon.danger {
    background: #FBE4DA;
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
    background: var(--accent);
    color: var(--ink);
  }

  .btn-confirm-ya:hover { background: var(--accent-deep); }

  .btn-confirm-ya.danger {
    background: var(--danger);
    color: #fff;
  }

  .btn-confirm-ya.danger:hover { background: var(--danger-deep); }
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
                    <img src="{{ asset('images/qr.jpg') }}" alt="QRIS" style="width:150px; height:150px;">
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
                  onsubmit="return sebelumBatalTransaksi(event)" class="mt-2">
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

{{-- ================== MODAL KONFIRMASI CHECKOUT ================== --}}
<div class="confirm-overlay" id="confirmCheckoutModal">
    <div class="confirm-box">
        <div class="confirm-icon">
            <svg viewBox="0 0 24 24" width="26" height="26">
                <path d="M12 9v4M12 17h.01M10.29 3.86l-8.18 14.18A1.5 1.5 0 0 0 3.5 20.5h17a1.5 1.5 0 0 0 1.39-2.46L13.71 3.86a1.5 1.5 0 0 0-2.42 0z"
                      fill="none" stroke="#a3792a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div class="confirm-title">Yakin ingin checkout?</div>
        <div class="confirm-sub">Transaksi tidak bisa diubah lagi setelah checkout.</div>
        <div class="confirm-actions">
            <button type="button" class="btn-confirm-batal" id="btnBatalConfirm">Batal</button>
            <button type="button" class="btn-confirm-ya" id="btnYaConfirm">Ya, Checkout</button>
        </div>
    </div>
</div>

{{-- ================== MODAL KONFIRMASI BATAL TRANSAKSI ================== --}}
<div class="confirm-overlay" id="confirmBatalModal">
    <div class="confirm-box">
        <div class="confirm-icon danger">
            <svg viewBox="0 0 24 24" width="24" height="24">
                <path d="M6 6l12 12M18 6L6 18" fill="none" stroke="#c25e38" stroke-width="2.2" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="confirm-title">Yakin ingin membatalkan transaksi?</div>
        <div class="confirm-sub">Tindakan ini tidak bisa dibatalkan.</div>
        <div class="confirm-actions">
            <button type="button" class="btn-confirm-batal" id="btnTidakBatalTransaksi">Tidak</button>
            <button type="button" class="btn-confirm-ya danger" id="btnYaBatalTransaksi">Ya, Batalkan</button>
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

    /* ---------- Konfirmasi Checkout (modal custom, ganti confirm() bawaan) ---------- */
    let formCheckoutTerpending = null;

    function sebelumCheckout(e) {
        e.preventDefault();

        const metode = document.getElementById('paymentMethod').value;

        if (!metode) {
            alert('Pilih metode pembayaran dulu');
            return false;
        }

        if (metode === 'CASH') {
            const diterima = parseFloat(document.getElementById('uangDiterima').value) || 0;
            if (diterima < totalBelanja) {
                alert('Uang diterima kurang dari total belanja');
                return false;
            }
        }

        formCheckoutTerpending = e.target;
        document.getElementById('confirmCheckoutModal').classList.add('show');
        return false;
    }

    document.getElementById('btnYaConfirm').addEventListener('click', () => {
        document.getElementById('confirmCheckoutModal').classList.remove('show');
        if (formCheckoutTerpending) {
            formCheckoutTerpending.submit();
        }
    });

    document.getElementById('btnBatalConfirm').addEventListener('click', () => {
        document.getElementById('confirmCheckoutModal').classList.remove('show');
        formCheckoutTerpending = null;
    });

    document.getElementById('confirmCheckoutModal').addEventListener('click', (e) => {
        if (e.target.id === 'confirmCheckoutModal') {
            e.target.classList.remove('show');
            formCheckoutTerpending = null;
        }
    });

    /* ---------- Konfirmasi Batal Transaksi (modal custom, ganti confirm() bawaan) ---------- */
    let formBatalTerpending = null;

    function sebelumBatalTransaksi(e) {
        e.preventDefault();
        formBatalTerpending = e.target;
        document.getElementById('confirmBatalModal').classList.add('show');
        return false;
    }

    document.getElementById('btnYaBatalTransaksi').addEventListener('click', () => {
        document.getElementById('confirmBatalModal').classList.remove('show');
        if (formBatalTerpending) {
            formBatalTerpending.submit();
        }
    });

    document.getElementById('btnTidakBatalTransaksi').addEventListener('click', () => {
        document.getElementById('confirmBatalModal').classList.remove('show');
        formBatalTerpending = null;
    });

    document.getElementById('confirmBatalModal').addEventListener('click', (e) => {
        if (e.target.id === 'confirmBatalModal') {
            e.target.classList.remove('show');
            formBatalTerpending = null;
        }
    });
</script>
@endsection