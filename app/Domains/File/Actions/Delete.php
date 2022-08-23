<?php

namespace App\Domains\File\Actions;

use App\Domains\File\Exceptions\FileNotFoundException;
use App\Domains\File\Repositories\FileRepository;
use App\Support\AmazonS3\S3;

class Delete
{
  private $id;

  public function __construct(string $id)
  {
    $this->id = $id;
  }

  public function execute()
  {
    $fileRepository = new FileRepository();

    if (!$filename = $fileRepository->get($this->id)) {
      throw new FileNotFoundException();
    }

    $file = new S3();
    $file->deleteFile($filename->file);

    return $fileRepository->delete($this->id);
  }
}
