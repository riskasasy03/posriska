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

  .produk-form-label{
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 6px;
    display: inline-block;
  }
  .produk-form .form-control{
    border: 1.5px solid var(--line);
    border-radius: 10px;
    background: var(--card);
    padding: .6rem .9rem;
    font-weight: 500;
    color: var(--ink);
  }
  .produk-form .form-control:focus{
    border-color: var(--accent);
    box-shadow: none;
    background: var(--card);
  }
  .produk-form .form-control.is-invalid{
    border-color: var(--danger);
  }
  .produk-form .invalid-feedback{
    color: var(--danger-deep);
    font-weight: 600;
  }
  .produk-thumb-preview{
    border: 1.5px solid var(--line) !important;
    border-radius: 10px;
    background: var(--card);
  }
  .btn-simpan{
    background: var(--accent);
    border: none;
    color: var(--ink);
    font-weight: 700;
    border-radius: 10px;
    padding: .55rem 1.4rem;
  }
  .btn-simpan:hover{
    background: var(--accent-deep);
    color: var(--ink);
  }
  .btn-simpan:active{
    background: #B9862A;
    color: var(--ink);
  }
  .btn-kembali{
    background: var(--card);
    border: 1.5px solid var(--line);
    color: var(--ink-soft);
    font-weight: 700;
    border-radius: 10px;
    padding: .55rem 1.4rem;
  }
  .btn-kembali:hover{
    background: var(--butter);
    color: var(--ink);
  }
  .btn-kembali:active{
    background: var(--butter);
    color: var(--ink);
  }
</style>

<div class="produk-form produk-form-card">

@csrf

@if (!empty($produk->foto))
    <div class="mb-2">
        <label class="produk-form-label">Foto Saat Ini</label><br>
        <img src="{{ asset('storage/' . $produk->foto) }}" 
             width="150"
             class="img-thumbnail produk-thumb-preview">
    </div>
@endif

 <div class="row">
    <div class="col">
        <div>
            <label class="produk-form-label">Gambar</label>
            <input type="file" 
                    name="foto" 
                    onchange="previewImage(this)"
                    class="form-control @error('foto') is-invalid @enderror">
            @error('foto')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="mb-2">
            <label class="produk-form-label">Preview Foto</label><br>
            <img id="preview" class="img-thumbnail produk-thumb-preview mt-2" style="display:none" width="150">
        </div>
    </div>
 </div>


<div>
    <label class="produk-form-label">Nama Produk</label><br>
    <input type="text" name="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $produk->nama ?? '') }}">
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
</div>

<div>
    <label class="produk-form-label">Harga Beli</label><br>
    <input type="number" name="purchase_price"
            class="form-control @error('purchase_price') is-invalid @enderror"
            value="{{ old('purchase_price', $produk->harga_beli ?? '') }}">
        @error('purchase_price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
</div>

<div>
    <label class="produk-form-label">Harga Jual</label><br>
    <input type="number" name="selling_price"
            class="form-control @error('selling_price') is-invalid @enderror"
            value="{{ old('selling_price', $produk->harga_jual ?? '') }}">
        @error('selling_price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
</div>

<div>
    <label class="produk-form-label">Stok</label><br>
    <input type="number" name="stock"
            class="form-control @error('stock') is-invalid @enderror"
            value="{{ old('stock', $produk->stok ?? '') }}">
        @error('stock')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
</div>

<button class="btn btn-simpan mt-3" type="submit">Simpan</button>
<a href="{{ route('produk.index') }}" class="btn btn-kembali mt-3">Kembali</a>

</div>

<script>
    function previewImage(input) {
        const preview = document.getElementById('preview');
        const file = input.files[0]

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    }
</script>