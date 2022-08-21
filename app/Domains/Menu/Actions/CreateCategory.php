<?php

namespace App\Domains\Menu\Actions;

use App\Domains\Menu\Exceptions\CategoryAlreadyExistsException;
use App\Domains\Menu\Repositories\MenuCategoryRepository;

class CreateCategory
{
  private $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function execute()
  {
    $categoryRepository = new MenuCategoryRepository();

    if ($categoryRepository->getByName($this->data['restaurant_id'], $this->data['name'])) {
      throw new CategoryAlreadyExistsException();
    }

    return $categoryRepository->create($this->data);
  }
}
