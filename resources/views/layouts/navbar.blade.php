<nav class="navbar navbar-expand-lg pos-navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Point of Sale</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0  mx-auto gap-4">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        {{-- Menu Users hanya untuk admin(role_id = 1) --}}
        @if(auth()->user()->role_id === 1)
          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}" href="{{ route('admin.users') }}">Users</a>
          </li>
        @endif
         <li class="nav-item">
          <a class="nav-link {{ Request::is('jenis') ? 'active' : '' }}" href="{{ route('jenis.index') }}">Jenis</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('produk') ? 'active' : '' }}" href="{{ route('produk.index') }}">Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('penjualan') ? 'active' : '' }}" href="{{ route('penjualan.index') }}">Penjualan</a>
        </li>
      </ul>
      <form action="{{ route('logout') }}" method="POST" class="mb-2 mb-lg-0">
        @csrf
        <button type="submit" class="btn btn-logout">Logout</button>
      </form>
    </div>
  </div>
</nav>

<style>
  :root{
    --butter:#F5E7A3;
    --butter-soft:#FBF3D0;
    --card:#FFFDF6;
    --ink:#3A3324;
    --ink-soft:#8A8064;
    --accent:#E8B84B;
    --danger:#D9724A;
    --danger-deep:#C25E38;
    --shadow:0 16px 40px -20px rgba(58,51,36,0.22);
  }

  .pos-navbar{
    background: var(--card);
    border-radius: 14px;
    box-shadow: var(--shadow);
    padding: 10px 18px;
  }

  .pos-navbar .navbar-brand{
    font-weight: 800;
    color: var(--ink);
    letter-spacing: .04em;
  }

  .pos-navbar .nav-link{
    color: var(--ink-soft);
    font-weight: 600;
    font-size: 14.5px;
    margin-right: 8px;
    border-bottom: 2px solid transparent;
    padding-bottom: 4px;
  }
  .pos-navbar .nav-link:hover{
    color: var(--ink);
  }
  .pos-navbar .nav-link.active{
    color: var(--ink);
    border-bottom-color: var(--accent);
  }

  .pos-navbar .btn-logout{
    background: var(--danger);
    color: #fff;
    font-weight: 700;
    font-size: 13.5px;
    border: none;
    border-radius: 9px;
    padding: 8px 18px;
  }
  .pos-navbar .btn-logout:hover{
    background: var(--danger-deep);
    color: #fff;
  }
</style>