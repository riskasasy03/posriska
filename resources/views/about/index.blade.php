@extends('layouts.app')

@section('title', 'About')

@section('content')

<style>
    .about-page {
        padding: 50px 0;
    }

    .about-title {
        text-align: center;
        margin-bottom: 35px;
    }

    .about-title h1 {
        font-weight: 800;
        color: var(--ink);
    }

    .about-title p {
        color: var(--ink-soft);
        margin-top: 8px;
    }

    .about-card {
        background: var(--card);
        border: none;
        border-radius: 16px;
        box-shadow: var(--shadow);
        overflow: hidden;
        height: 100%;
    }

    .about-card-header {
        background: var(--butter);
        padding: 15px 20px;
        font-weight: 800;
        color: var(--ink);
        font-size: 17px;
    }

    .about-card-body {
        padding: 22px 20px;
        color: var(--ink);
        line-height: 1.8;
    }

    .about-card-body p {
        margin-bottom: 0;
    }

    .tech-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .tech-list li {
        padding: 10px 0;
        border-bottom: 1px solid var(--line);
        font-weight: 500;
    }

    .tech-list li:last-child {
        border-bottom: none;
    }

    .tech-list i {
        color: var(--accent-deep);
        margin-right: 10px;
    }

    .creator-card {
        background: var(--butter-soft);
        border: 1px solid var(--line);
        border-radius: 16px;
        padding: 25px;
        text-align: center;
        margin-top: 25px;
    }

    .creator-icon {
        width: 65px;
        height: 65px;
        background: var(--accent);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: var(--ink);
        margin-bottom: 12px;
    }

    .creator-card h4 {
        font-weight: 800;
        color: var(--ink);
        margin-bottom: 5px;
    }

    .creator-card p {
        color: var(--ink-soft);
        margin: 0;
    }
</style>

<div class="about-page">

    <div class="about-title">
        <h1>About Bakery Store</h1>
        <p>Mengenal lebih dekat aplikasi dan toko kami</p>
    </div>

    <div class="row g-4">

        {{-- Perkenalan --}}
        <div class="col-md-6">
            <div class="about-card">

                <div class="about-card-header">
                    <i class="bi bi-heart-fill me-2"></i>
                    Perkenalan
                </div>

                <div class="about-card-body">
                    <p>
                        Selamat datang di <strong>Bakery Store</strong>.
                        Aplikasi ini merupakan sistem Point of Sale (POS)
                        yang dibuat untuk membantu proses pengelolaan
                        produk dan transaksi penjualan dengan lebih mudah,
                        cepat, dan terorganisir.
                    </p>
                </div>

            </div>
        </div>

        {{-- Tentang Bakery --}}
        <div class="col-md-6">
            <div class="about-card">

                <div class="about-card-header">
                    <i class="bi bi-shop me-2"></i>
                    Tentang Toko Bakery
                </div>

                <div class="about-card-body">
                    <p>
                        Bakery Store adalah toko yang menyediakan berbagai
                        macam produk roti dan kue. Dengan adanya aplikasi ini,
                        proses pengelolaan data produk, stok, transaksi,
                        dan penjualan dapat dilakukan secara lebih efisien.
                    </p>
                </div>

            </div>
        </div>

        {{-- Teknologi --}}
        <div class="col-md-12">
            <div class="about-card">

                <div class="about-card-header">
                    <i class="bi bi-code-slash me-2"></i>
                    Teknologi yang Digunakan
                </div>

                <div class="about-card-body">

                    <div class="row">

                        <div class="col-md-4">
                            <ul class="tech-list">
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Laravel
                                </li>

                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    PHP
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-4">
                            <ul class="tech-list">
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    MySQL
                                </li>

                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Bootstrap
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-4">
                            <ul class="tech-list">
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    HTML
                                </li>

                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    CSS
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>


    {{-- Pembuat --}}
    <div class="creator-card">

        <div class="creator-icon">
            <i class="bi bi-person-fill"></i>
        </div>

        <h4>Riska Sasylia Putri</h4>

        <p>Pembuat dan Pengembang Aplikasi Bakery Store</p>

    </div>

</div>

@endsection