<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Pattern;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request, $patternId)
    {
        $pattern = Pattern::findOrFail($patternId);

        CartItem::create([
            'user_id' => Auth::id(),
            'pattern_id' => $patternId,
            'quantity' => 1 
        ]);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function remove(Request $request, $patternId)
    {
        CartItem::where('user_id', Auth::id())->where('pattern_id', $patternId)->delete();

        return redirect()->back()->with('success', 'Product removed successfully!');
    }
}
