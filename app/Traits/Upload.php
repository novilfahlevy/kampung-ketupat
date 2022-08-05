<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Str;

trait Upload
{
    private function getImageInstance(UploadedFile|string $file)
    {
        // Base64
        if (gettype($file) == 'string') {
            return Image::make(file_get_contents($file));
        }
        
        return Image::make($file->getRealPath());
    }

    private function getImageExtension($file)
    {
        if ($file instanceof UploadedFile) {
            return $file->getClientOriginalExtension();
        }
        
        $mime = $file->mime();
        if ($mime == 'image/png') return 'png';
        else if ($mime == 'image/jpg') return 'jpg';
        else if ($mime == 'image/jpeg') return 'jpeg';

        return end(explode('/', $mime));
    }

    private function resizeAndSave(UploadedFile|string $file, $width, $height, $oldFilename = null)
    {
        $image = $this->getImageInstance($file);
        $filename = Str::random(40).'.'.$this->getImageExtension($image);
        $image->resize($width, $height);
        $image->save(storage_path('app/public/uploads/'.$filename));

        if ($oldFilename) {
            $this->deleteFile($oldFilename);
        }

        return $filename;
    }

    private function saveAndModify(UploadedFile|string $file, $modifyCallback, $oldFilename = null)
    {
        $image = $this->getImageInstance($file);
        $filename = Str::random(40).'.'.$this->getImageExtension($image);
        $modifyCallback($image);
        $image->save(storage_path('app/public/uploads/'.$filename));

        if ($oldFilename) {
            $this->deleteFile($oldFilename);
        }

        return $filename;
    }

    private function saveFile(UploadedFile $file, $oldFilename = null)
    {
        $filename = Storage::disk('uploads')->put('/', $file);
        if ($filename) {
            if ($oldFilename) {
                $this->deleteFile($oldFilename);
            }
            return $filename;
        }
        return null;
    }

    private function deleteFile($filename)
    {
        return Storage::disk('uploads')->delete($filename);
    }
}