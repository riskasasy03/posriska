@csrf

<style>
  :root{
    --butter-soft:#FBF3D0;
    --card:#FFFDF6;
    --ink:#3A3324;
    --ink-soft:#8A8064;
    --accent:#E8B84B;
    --accent-deep:#D6A435;
    --danger:#D9724A;
    --line:#EDE3BE;
  }

  .pos-form .form-label{
    font-weight: 700;
    font-size: 13.5px;
    color: var(--ink);
  }
  .pos-form .form-control{
    border: 1.5px solid var(--line);
    border-radius: 10px;
    background: var(--butter-soft);
    padding: .55rem .8rem;
    font-weight: 600;
    color: var(--ink);
  }
  .pos-form .form-control:focus{
    border-color: var(--accent);
    background: var(--card);
    box-shadow: none;
  }
  .pos-form .form-control.is-invalid{ border-color: var(--danger); }
  .pos-form .btn-save{
    background: var(--accent);
    border: none;
    color: var(--ink);
    font-weight: 800;
    border-radius: 10px;
    padding: .55rem 1.4rem;
  }
  .pos-form .btn-save:hover{ background: var(--accent-deep); color: var(--ink); }
  .pos-form .btn-back{
    background: transparent;
    border: 1.5px solid var(--line);
    color: var(--ink-soft);
    font-weight: 700;
    border-radius: 10px;
    padding: .55rem 1.4rem;
  }
  .pos-form .btn-back:hover{ background: var(--butter-soft); color: var(--ink); }
</style>

<div class="pos-form">
    <div class="mb-3">
        <label class="form-label">Nama Jenis</label>
        <input type="text" name="nama_jenis"
               class="form-control @error('nama_jenis') is-invalid @enderror"
               value="{{ old('nama_jenis', $jenis->nama_jenis ?? '') }}"
               placeholder="Contoh: Cake, Minuman, Snack">
        @error('nama_jenis')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button class="btn btn-save">Simpan</button>
    <a href="{{ route('jenis.index') }}" class="btn btn-back">Kembali</a>
</div>