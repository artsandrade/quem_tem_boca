<?php

namespace App\Domains\File\Actions;

use App\Domains\File\Exceptions\FileAlreadyExistsException;
use App\Domains\File\Exceptions\FileCantBeSavedException;
use App\Domains\File\Repositories\FileRepository;
use App\Support\AmazonS3\S3;

class Create
{
  private $request;
  private $file_request;
  private $path;

  public function __construct($request, string $file_request, string $path)
  {
    $this->request = $request;
    $this->file_request = $file_request;
    $this->path = $path;
  }

  public function execute()
  {
    $data['filename'] = $this->request->{$this->file_request}->getClientOriginalName();
    $data['extension'] = $this->request->{$this->file_request}->getClientOriginalExtension();
    $data['type'] = $this->request->{$this->file_request}->getClientMimeType();
    $data['size'] = $this->request->{$this->file_request}->getSize();

    $fileRepository = new FileRepository();

    $file = new S3();
    if (!$filename = $file->saveFile($this->request, $this->file_request, $this->path)) {
      throw new FileCantBeSavedException();
    }
    $data['file'] = $filename;

    return $fileRepository->create($data);
  }
}
