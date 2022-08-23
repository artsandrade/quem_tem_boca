<?php

namespace App\Domains\File\Actions;

use App\Domains\File\Exceptions\FileNotFoundException;
use App\Domains\File\Repositories\FileRepository;

class Get
{
  private $id;

  public function __construct(string $id)
  {
    $this->id = $id;
  }

  public function execute()
  {
    $fileRepository = new FileRepository();

    if (!$file = $fileRepository->get($this->id)) {
      throw new FileNotFoundException();
    }

    return $file;
  }
}
