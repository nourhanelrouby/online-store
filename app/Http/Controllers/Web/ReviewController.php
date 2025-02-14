<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\review\ReviewStoreRequest;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(ReviewStoreRequest $request, $productId)
    {
        $data = $request->all();
        $data['product_id'] = $productId;
        Review::create($data);
        return back()->with('success', 'Review added successfully');
    }
}
