<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreImageRequest;

class ImageController extends Controller
{
    public function store(StoreImageRequest $request)
    {
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        Storage::disk('public')->put(
          'images/' . $imageName,
            file_get_contents($image)
        );
        return redirect()->route('Book/');
    }

}
