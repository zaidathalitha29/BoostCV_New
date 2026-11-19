<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Creator;
use App\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $creator = Creator::where('user_id', Auth::id())->first();

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $reviews = $creator->reviews()
            ->with(['customer', 'order'])
            ->latest()
            ->paginate(10);

        $totalReviews = $creator->reviews()->count();

        $averageRating = $creator->reviews()->avg('rating') ?? 0;

        $ratingCounts = [];

        for ($rating = 5; $rating >= 1; $rating--) {
            $ratingCounts[$rating] = $creator->reviews()
                ->where('rating', $rating)
                ->count();
        }

        return view('creator.reviews.index', compact(
            'creator',
            'reviews',
            'totalReviews',
            'averageRating',
            'ratingCounts'
        ));
    }

    public function show($id)
    {
        $creator = Creator::where('user_id', Auth::id())->first();

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $review = $creator->reviews()
            ->with(['customer', 'order'])
            ->findOrFail($id);

        return view('creator.reviews.show', compact(
            'creator',
            'review'
        ));
    }
}
