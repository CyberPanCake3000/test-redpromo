<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\ReviewPhoto;

class ReviewController extends Controller
{
    const UPLOAD_PATH = 'tmp/reviews';
    public function store(Request $request)
    {
        $request->validate([
            'review' => 'required|min:5|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $review = new Review([
            'rating' => $request->input('rating'),
            'review' => $request->input('review'),
            'product_id' => $request->input('product_id'),
            'user_id' => $request->input('user_id'),
        ]);

        $review->save();

        $uploadPath = public_path(self::UPLOAD_PATH);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {

                $filename = uniqid().'_'.$review->id.'_'.time().'.'.$image->extension();
                $image->move($uploadPath, $filename);

                $path = self::UPLOAD_PATH . '/' . $filename;

                $reviewPhoto = new ReviewPhoto([
                    'path' => $path,
                    'review_id' => $review->id,
                ]);
                $reviewPhoto->save();
            }
        }

        return redirect()->route('product.show', $request->input('product_id'))->with(['message' => 'Success!']);
    }
}
