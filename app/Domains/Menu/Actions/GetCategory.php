<?php

namespace App\Domains\Menu\Actions;

use App\Domains\Menu\Exceptions\CategoryNotFoundException;
use App\Domains\Menu\Repositories\MenuCategoryRepository;

class GetCategory
{
  private $id;
  private $restaurant_id;

  public function __construct(string $id, string $restaurant_id)
  {
    $this->id = $id;
    $this->restaurant_id = $restaurant_id;
  }

  public function execute()
  {
    $categoryRepository = new MenuCategoryRepository();

    if (!$category = $categoryRepository->get($this->id, $this->restaurant_id)) {
      throw new CategoryNotFoundException();
    }

    return $category;
  }
}
