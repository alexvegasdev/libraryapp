<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookPhoto;
use App\Traits\Base64Decodable;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function updatePhoto(Request $request, BookPhoto $bookPhoto)
    {
        if (!$request->hasFile('photo')) {
            return response()->json(['error' => 'No photo uploaded'], 400);
        }

        if (!is_null($bookPhoto->uri) && Storage::disk('images')->exists($bookPhoto->uri)) {
            Storage::disk('images')->delete($bookPhoto->uri);
        }

        $newUri = $request->file('photo')->store('books', 'images');
        $bookPhoto->update(['uri' => $newUri]);
    
        return response()->json(['success'=>'Image updated']);
    }

}
