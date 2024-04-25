<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BookPhoto;
use App\Traits\Base64Decodable;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BookPhotoController extends Controller
{
    use Base64Decodable;

    public function storeFile(Request $request)
    {
        BookPhoto::create([
            'uri'=>$request->file('photo')->store('books', 'images'),
            'book_id'=>$request->book_id,
        ]);

        return response()->json(['success'=>'Image created']);
    }

    public function storeBase64(Request $request)
    {
        return BookPhoto::create([
            'uri' => $this->saveImage($request->photo, 'books', Str::uuid()),
            'book_id'=>$request->book_id,
        ]);
    }

}
