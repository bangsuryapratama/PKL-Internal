<?php
namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'point'   => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);
        $review             = new Review();
        $review->user_id    = Auth::id();
        $review->product_id = $request->product_id;
        $review->point      = $request->point;
        $review->comment    = $request->comment;
        $review->save();

        toast('Terima kasih atas ulasan Anda!', 'success');
        return back();
    }
}