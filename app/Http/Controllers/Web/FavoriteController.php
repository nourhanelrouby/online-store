<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\FavoriteStoreRequest;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function favorite(FavoriteStoreRequest $request)
    {
        $removeFavorite = Favorite::where('user_id', $request->user_id)
            ->where('product_id', $request->product_id)->exists();
        if ($removeFavorite) {
            $delFavorite = Favorite::where('user_id', $request->user_id)
                ->where('product_id', $request->product_id)->first();
            $delFavorite->delete();
        } else {
            Favorite::create([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
            ]);
        }
        return redirect()->back();
    }
    public function favoriteProducts()
    {
        $user = Auth::guard('web')->user();
        $favorites = $user->favoriteProducts;
//        return $favorites;
        return view('website.favorite.index', [
            'favorites' => $favorites
        ]);
    }
}
