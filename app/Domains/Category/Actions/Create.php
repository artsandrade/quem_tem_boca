<?php

namespace App\Domains\Category\Actions;

use App\Domains\Category\Exceptions\CategoryAlreadyExistsException;
use App\Domains\Category\Repositories\CategoryRepository;

class Create
{
  private $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function execute()
  {
    $categoryRepository = new CategoryRepository();

    if ($categoryRepository->getByName($this->data['name'])) {
      throw new CategoryAlreadyExistsException();
    }

    return $categoryRepository->create($this->data);
  }
}
