<?php

namespace App\Domains\Category\Actions;

use App\Domains\Category\Exceptions\CategoryNotFoundException;
use App\Domains\Category\Repositories\CategoryRepository;

class Update
{
  private $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function execute()
  {
    $categoryRepository = new CategoryRepository();

    if (!$categoryRepository->get($this->data['id'])) {
      throw new CategoryNotFoundException();
    }

    return $categoryRepository->update($this->data);
  }
}
