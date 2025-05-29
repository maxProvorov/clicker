<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Click;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function shorten(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        do {
            $code = Str::random(6);
        } while (Link::where('code', $code)->exists());

        Link::create([
            'original_url' => $request->url,
            'code' => $code,
        ]);

        return response()->json([
            'short_url' => url($code),
            'code' => $code,
        ]);
    }

    public function redirect($code, Request $request)
    {
        $link = Link::where('code', $code)->first();

        if (!$link) {
            return response()->json(['error' => 'Not found'], 404);
        }

        Click::create([
            'link_id' => $link->id,
            'ip_address' => $request->ip(),
        ]);
        
        return redirect($link->original_url);
    }
}
