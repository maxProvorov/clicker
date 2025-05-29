<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class StatisticsController extends Controller
{
    public function show($code)
    {
        $link = Link::where('code', $code)->first();

        if (!$link) {
            return response()->json(['error' => 'Not found'], 404);
        }

        return response()->json([
            'clicks_count' => $link->clicks()->count(),
            'created_at' => $link->created_at,
        ]);
    }
}
