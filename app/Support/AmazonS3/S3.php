<?php

namespace App\Support\AmazonS3;

use Illuminate\Support\Facades\Storage;

class S3
{
  public function getTemporaryUrl(string $file, int $expires)
  {
    return Storage::temporaryUrl($file, now()->addMinutes($expires));
  }

  public function saveFile($request, $file_request, $path)
  {
    return Storage::disk('s3')->put($path, $request->{$file_request});
  }

  public function deleteFile($file)
  {
    return Storage::disk('s3')->delete([$file]);
  }
}
