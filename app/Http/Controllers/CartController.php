<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller
{

    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request, $id)
    {
        if (! Auth::check()) {
            // belum login cek dulu
            toast('Silakan login terlebih dahulu untuk menambahkan ke keranjang.', 'error');
            return redirect('/login');
        }

        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();

        if ($cart) {
            $cart->increment('qty', $request->qty);
        } else {
            Cart::create([
                'user_id'    => Auth::id(),
                'product_id' => $id,
                'qty'        => $request->qty,
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function updateCart(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);

        $request->validate([
            'qty' => 'required|integer|min:1|max:' . $cartItem->product->stock,
        ]);

        $cartItem->qty = $request->qty;
        $cartItem->save();

        toast('Jumlah berhasil diperbarui.', 'success');
        return redirect()->route('cart.index');
    }

    public function remove($id)
    {
        $cart = Cart::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $cart->delete();
        toast('Produk berhasil dihapus dari keranjang.', 'success');
        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            toast('Keranjang kosong. Tidak bisa checkout.', 'warning');
            return redirect()->route('cart.index');
        }

        //total harga
        $total = $cartItems->sum(function ($item) {
            return $item->qty * $item->product->price;
        });

        //simpan
        $order = Order::create([
            'user_id'     => Auth::id(),
            'order_code'  => 'ORD-' . strtoupper(Str::random(8)),
            'total_price' => $total,
            'status'      => 'pending',
        ]);

        // menyimpan order ke pivot `order_product`
        foreach ($cartItems as $item) {
            // mengurangi stok produk
            $product = Product::find($item->product_id);
            $product->stock -= $item->qty;
            $product->save();

            $order->products()->attach($item->product_id, [
                'qty'   => $item->qty,
                'price' => $item->product->price,
            ]);
        }

        
        Cart::where('user_id', Auth::id())->delete();

        toast('Pesanan berhasil dibuat!', 'success');
        return redirect()->route('orders.index');
    }

    public function showCheckoutPage()
{
    $cartItems = Cart::with('product')
        ->where('user_id', Auth::id())
        ->get();

    if ($cartItems->isEmpty()) {
        toast('Keranjang kosong. Tidak bisa checkout.', 'warning');
        return redirect()->route('cart.index');
    }

    $total = $cartItems->sum(function ($item) {
        return $item->qty * $item->product->price;
    });

    return view('checkout', compact('cartItems', 'total'));
}


}