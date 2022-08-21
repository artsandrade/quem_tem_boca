<?php

namespace App\Domains\Menu\Actions;

use App\Domains\Menu\Exceptions\CategoriesNotFoundException;
use App\Domains\Menu\Repositories\MenuCategoryRepository;

class GetAllCategories
{
  private $restaurant_id;

  public function __construct(string $restaurant_id)
  {
    $this->restaurant_id = $restaurant_id;
  }

  public function execute()
  {
    $categoryRepository = new MenuCategoryRepository();

    if (!$category = $categoryRepository->getAll($this->restaurant_id)) {
      throw new CategoriesNotFoundException();
    }

    return $category;
  }
}
