<?php

namespace App\Http\Controllers;

use App\Models\ItemPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:produk,id',
            'quantity' => 'required|integer|min:1'
        ]);

        DB::transaction(function () use ($request) {

            $sale = Penjualan::where('user_id', Auth::id())
                ->where('status', 'OPEN')
                ->firstOrFail();

            $product = Produk::lockForUpdate()->findOrFail($request->product_id);

            if ($product->stok < $request->quantity) {
                return redirect()->route('penjualan.create')->with('errors', 'Produk stok tidak
                mencukupi');
            }

            $product->decrement('stok', $request->quantity);

            $item = ItemPenjualan::where('penjualan_id', $sale->id)
                ->where('produk_id', $product->id)
                ->lockForUpdate()
                ->first();

            if ($item) {
                // UPDATE
                $item->kuantitas += $request->quantity;
            } else {
                //CREATE
                $item = new ItemPenjualan([
                    'penjualan_id' => $sale->id,
                    'produk_id' => $product->id,
                    'kuantitas' => $request->quantity,
                    'harga_satuan' => $product->harga_jual,
                ]);
            }

            // hitung subtotal SETELAH kuantitas fix
            $item->subtotal = $item->kuantitas * $item->harga_satuan;
            $item->save();

            $sale->total_pembayaran = $sale->itemPenjualan()->sum('subtotal');
            $sale->save();
        });

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemPenjualan $itempenjualan)
    {
        $this->authorize('delete', $itempenjualan);
        
        DB::transaction(function () use ($itempenjualan) {
            $produk = $itempenjualan->produk;
            $sale = $itempenjualan->penjualan;

            $produk->increment('stok', $itempenjualan->kuantitas);

            $itempenjualan->delete();

            $sale->update([
                'total_pembayaran' => $sale->itemPenjualan()->sum('subtotal')
            ]);
        });

        return back();

    }
}
