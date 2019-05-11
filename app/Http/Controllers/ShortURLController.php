<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShortURLController extends Controller
{
    public function submit(Request $request) {
        $this->validate($request, [
            'url' => 'required|string',
        ]);
        /*
         * Add storage functionality here. 
         * TODO - add check for duplicates, validate url, etc
         */

         $shortUrl = 'test';
        return response()->json($shortUrl, 200);
    }
}
