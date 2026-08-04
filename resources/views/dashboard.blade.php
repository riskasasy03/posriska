<!-- memanggil file app.blade.php -->
@extends('layouts.app')

<!-- mengirimkan nilai ke tittle untuk ditampilkan -->
@section('title', 'login')

<!-- batas awal isi konten -->
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
    --line:#EDE3BE;
    --shadow:0 16px 40px -20px rgba(58,51,36,0.22);
  }

  body{ background: var(--butter-soft); }

  .page-title h1{
    font-weight: 800;
    color: var(--ink);
  }
  .page-title small{
    font-weight: 500;
  }

  .section-title{
    font-size: 15px;
    font-weight: 800;
    text-transform: uppercase;
    color: var(--ink-soft);
    margin: 32px 0 16px;
    text-align: middle;
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .section-title::before{
    content:"";
    width: 9px;
    height: 9px;
    border-radius: 30%;
    background: var(--accent);
  }

  .stat-card.card{
    border: none;
    border-radius: 16px;
    box-shadow: var(--shadow);
    overflow: hidden;
  }
  .stat-card .card-header{
    background: var(--butter);
    border: none;
    color: var(--ink);
    font-weight: 700;
    font-size: 13.5px;
    padding: 12px 18px;
  }
  .stat-card .card-body{
    background: var(--card);
    padding: 20px 18px;
  }
  .stat-card .card-title{
    margin: 0;
    font-weight: 800;
    font-size: 24px;
    color: var(--ink);
  }

  .table-card{
    background: var(--card);
    border-radius: 10px;
    box-shadow: var(--shadow);
    overflow: hidden;
    padding: 4px 4px 8px;
  }
  .table-card h3{
    font-size: 14.5px;
    font-weight: 800;
    color: var(--ink);
    padding: 14px 18px 10px;
    text-align: middle;
  }
 
  .table-card .table thead th{
    background: var(--butter-soft);
    color: var(--ink-soft);
    font-size: 12px;
    text-transform: uppercase;
    border: none;
    font-weight: 700;
  }
  .table-card .table tbody td{
    border-color: var(--line);
    color: var(--ink);
    font-size: 14px;
    vertical-align: middle;
  }
  .table-card .table tbody td.text-muted{
    font-style: italic;
  }
  .table-card .pagination{
    padding: 0 14px;
  }
</style>

<div class="text-center page-title">
    <h1>
        Ringkasan Hari Ini
        <small class="text-muted">
            ({{ $tanggalHariIni->translatedFormat('l, d F Y') }})
        </small>
    </h1>
    <div class="row">
        @can('viewAny', App\Models\User::class)
        <div class="col-md-12">
            <div class="section-title">Today's Sales</div>
        </div>
        <div class="col-md-6">
             <div class="card stat-card">
                <div class="card-header">
                    Total Nilai Penjualan Hari ini
                </div>
                <div class="card-body">
                    <h5 class="card-title">Rp {{ number_format($ringkasan['total_penjualan']) }}</h5>
                </div>
            </div>   
        </div>
        <div class="col-md-6">
            <div class="card stat-card">
                <div class="card-header">
                    Jumlah Transaksi Hari ini
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $ringkasan['total_transaksi'] }}</h5>
                </div>
            </div>   
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">Cash &amp; Payment Status</div>
        </div>
        <div class="col-md-6">
             <div class="card stat-card">
                <div class="card-header">
                    Total Pembayaran tunai
                </div>
                <div class="card-body">
                    <h5 class="card-title">Rp {{ number_format($ringkasan['total_cash']) }}</h5>
                </div>
            </div>   
        </div>
        <div class="col-md-6">
            <div class="card stat-card">
                <div class="card-header">
                    Total Pembayaran non-tunai
                </div>
                <div class="card-body">
                    <h5 class="card-title">Rp {{ number_format($ringkasan['total_non_tunai']) }}</h5>
                </div>
            </div>   
        </div>
    </div>
    @endcan
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">Critical Inventory Status</div>
        </div>
        <div class="col-md-6">
            <div class="table-card">
                <h3>Daftar produk stok rendah</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produkStokRendah as $index => $produk)
                        <tr>
                            <td>{{ $produkStokRendah->firstItem() + $index }}</td>
                            <td>{{ $produk->nama }}</td>
                            <td>{{ $produk->stok }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-muted text-center">
                                Seluruh produk berada dalam kondisi stok aman.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $produkStokRendah->links() }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="table-card">
                <h3>Produk habis stok</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produkStokRendah as $index => $produk)
                        <tr>
                            <td>{{ $produkStokRendah->firstItem() + $index }}</td>
                            <td>{{ $produk->nama }}</td>
                            <td>{{ $produk->stok }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-muted text-center">
                                Seluruh produk berada dalam kondisi stok aman.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $produkStokRendah->links() }}
            </div>
        </div>                            
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">Best Seller Products</div>
        </div>
        <div class="col-md-12">
            <div class="table-card">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Unit Terjual</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produkTerlaris as $produk)
                        <tr>
                            <td>{{ $produk->nama }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>{{ $produk->total_terjual }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-muted text-center">
                                Seluruh produk berada dalam kondisi stok aman.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- batas Akhir isi konten -->
@endsection