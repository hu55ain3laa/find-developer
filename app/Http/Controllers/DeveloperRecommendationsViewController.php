<?php

namespace App\Http\Controllers;

use App\Enums\RecommendationStatus;
use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperRecommendationsViewController extends Controller
{
    public function show($developerSlug)
    {
        $developer = Developer::with([
            'jobTitle',
            'recommendationsReceived.recommender' => function ($query) {
                $query->with('jobTitle');
            }
        ])->where('slug', $developerSlug)->firstOrFail();

        // Get only approved recommendations
        $recommendations = $developer->recommendationsReceived()
            ->where('status', RecommendationStatus::APPROVED)
            ->with('recommender.jobTitle')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('developer-recommendations', compact('developer', 'recommendations'));
    }
}
