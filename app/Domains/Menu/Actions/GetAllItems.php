<?php

namespace App\Domains\Menu\Actions;

use App\Domains\Menu\Exceptions\ItemsNotFoundException;
use App\Domains\Menu\Repositories\MenuItemRepository;

class GetAllItems
{
  private $restaurant_id;
  private $menu_category_id;

  public function __construct(string $restaurant_id, string $menu_category_id)
  {
    $this->restaurant_id = $restaurant_id;
    $this->menu_category_id = $menu_category_id;
  }

  public function execute()
  {
    $itemRepository = new MenuItemRepository();

    if (!$items = $itemRepository->getAll($this->restaurant_id, $this->menu_category_id)) {
      throw new ItemsNotFoundException();
    }

    return $items;
  }
}
