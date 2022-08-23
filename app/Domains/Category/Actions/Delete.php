<?php

namespace App\Domains\Category\Actions;

use App\Domains\Category\Exceptions\CategoryNotFoundException;
use App\Domains\Category\Repositories\CategoryRepository;

class Delete
{
  private $id;

  public function __construct(string $id)
  {
    $this->id = $id;
  }

  public function execute()
  {
    $categoryRepository = new CategoryRepository();

    if (!$categoryRepository->get($this->id)) {
      throw new CategoryNotFoundException();
    }

    return $categoryRepository->delete($this->id);
  }
}
