<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{
    public function delete(Request $request): JsonResponse
    {
        if (($media = Media::findByUuid($request->get('key'))) === null)
            return response()->json(['error' => 'Media not found !']);
        return response()->json(['status' => $media->delete()]);
    }
}