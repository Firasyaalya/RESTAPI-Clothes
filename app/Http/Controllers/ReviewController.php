<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    
    public function store(Request $request)
    {
        $validated= $request->validate([
            'type_id' => 'required',
            'review_content' => 'required',
            'rating_content' => 'required'
        ]);

        $request['user_id'] = auth()->user()->id;
        $reviews = Review::create($request->all());

        return response()->json($reviews);
        // return new CommentResource($comment->loadMissing(['comentator:id,username']));

    }
}
