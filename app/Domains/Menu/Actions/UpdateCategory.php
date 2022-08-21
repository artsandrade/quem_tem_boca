<?php

namespace App\Domains\Menu\Actions;

use App\Domains\Menu\Exceptions\CategoryNotFoundException;
use App\Domains\Menu\Repositories\MenuCategoryRepository;

class UpdateCategory
{
  private $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function execute()
  {
    $categoryRepository = new MenuCategoryRepository();

    if (!$categoryRepository->get($this->data['id'], $this->data['restaurant_id'])) {
      throw new CategoryNotFoundException();
    }

    return $categoryRepository->update($this->data);
  }
}
