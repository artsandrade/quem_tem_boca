<?php

namespace App\Domains\File\Resources;

use App\Support\AmazonS3\S3;
use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    $s3 = new S3();
    $url = $s3->getTemporaryUrl($this->file, 5);
    
    $data = [
      'id' => $this->id,
      'url' => $url,
      'filename' => $this->filename,
      'type' => $this->type,
      'extension' => $this->extension,
      'size' => $this->size,
      'created_at' => (string) $this->created_at,
      'updated_at' => (string) $this->updated_at,
    ];

    return $data;
  }
}
