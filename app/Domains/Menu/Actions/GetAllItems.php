<?php

namespace App\Domains\Menu\Actions;

use App\Domains\Menu\Exceptions\ItemsNotFoundException;
use App\Domains\Menu\Repositories\MenuItemRepository;

class GetAllItems
{
  private $restaurant_id;

  public function __construct(string $restaurant_id)
  {
    $this->restaurant_id = $restaurant_id;
  }

  public function execute()
  {
    $itemRepository = new MenuItemRepository();

    if (!$items = $itemRepository->getAll($this->restaurant_id)) {
      throw new ItemsNotFoundException();
    }

    return $items;
  }
}
