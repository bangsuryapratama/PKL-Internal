<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->get();
        $title = 'Hapus Pesanan!';
        $text = 'Apakah Anda yakin ingin menghapus pesanan ini?';
        confirmDelete($title, $text);
        return view('backend.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('user','products')->findorfail($id);
        return view('backend.order.show', compact('order'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->products()->detach();
        $order->delete();
        toast('Pesanan berhasil dihapus', 'success');
        return redirect()->route('backend.orders.index');
    }

    public function updateStatus($id, \Illuminate\Http\Request $request)
    {

        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();
        toast('Status pesanan berhasil diperbarui', 'success');
        return redirect()->route('backend.orders.index');
    }
}
