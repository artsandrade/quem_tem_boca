<?php

namespace App\Domains\File\Repositories;

use App\Domains\File\Models\File;

class FileRepository
{
  public function create(array $data)
  {
    return File::create($data);
  }

  public function get(string $id)
  {
    return(File::where('id', $id)->first());
  }

  public function delete(string $id)
  {
    return File::find($id)->delete();
  }
}
