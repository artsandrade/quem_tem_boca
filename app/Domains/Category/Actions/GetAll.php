<?php

namespace App\Domains\Category\Actions;

use App\Domains\Category\Exceptions\CategoriesNotFoundException;
use App\Domains\Category\Repositories\CategoryRepository;

class GetAll
{
  public function __construct()
  {
  }

  public function execute()
  {
    $categoryRepository = new CategoryRepository();

    if (!$categories = $categoryRepository->getAll()) {
      throw new CategoriesNotFoundException();
    }

    return $categories;
  }
}
