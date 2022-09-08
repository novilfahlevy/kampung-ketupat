<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Traits\Upload;
use Exception;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    use Upload;

    public function __invoke(Request $request)
    {
        try {
            $filename = $this->saveFile($request->upload);
            if ($filename) {
                return response()->json(['url' => asset('storage/uploads/'.$filename)]);
            }
        } catch (Exception $error) {
            app('sentry')->captureException($error);
            return response()->json(['error' => ['message' => $error->getMessage()]]);
        }
    }
}
