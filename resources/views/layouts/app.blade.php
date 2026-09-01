<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Isi title yang kita kirimkan dari views lain-->
    <title>@yield('title')</title>
    <!-- memanggil Link bootstraps--> 
     @vite(['resources/css/app.css', 'resources/js/app.js'])

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

      .form-page-title{
        font-weight: 800;
        color: var(--ink);
        margin-bottom: 22px;
      }

      .form-card{
        background: var(--card);
        border-radius: 16px;
        box-shadow: var(--shadow);
        padding: 28px 26px;
        max-width: 560px;
        margin: 0 auto;
      }

      .btn-simpan{
        background: var(--accent);
        border: none;
        color: var(--ink);
        font-weight: 700;
        border-radius: 10px;
        padding: .55rem 1.4rem;
      }
      .btn-simpan:hover{ background: var(--accent-deep); color: var(--ink); }
      .btn-simpan:active{ background: #B9862A; color: var(--ink); }

      .btn-kembali{
        background: var(--card);
        border: 1.5px solid var(--line);
        color: var(--ink-soft);
        font-weight: 700;
        border-radius: 10px;
        padding: .55rem 1.4rem;
      }
      .btn-kembali:hover{ background: var(--butter); color: var(--ink); }
      .btn-kembali:active{ background: var(--butter); color: var(--ink); }
    </style>
</head>
<body>

<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Isi konten yang kita kirimkan dari views lain-->
     @yield('content')

</div>

</body>
</html>