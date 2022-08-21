<?php

namespace App\Domains\Menu\Actions;

use App\Domains\Menu\Exceptions\ItemNotFoundException;
use App\Domains\Menu\Repositories\MenuItemRepository;

class GetItem
{
  private $id;
  private $restaurant_id;
  private $menu_category_id;

  public function __construct(string $id, string $restaurant_id, string $menu_category_id)
  {
    $this->id = $id;
    $this->restaurant_id = $restaurant_id;
    $this->menu_category_id = $menu_category_id;
  }

  public function execute()
  {
    $itemRepository = new MenuItemRepository();

    if (!$item = $itemRepository->get($this->id, $this->restaurant_id, $this->menu_category_id)) {
      throw new ItemNotFoundException();
    }

    return $item;
  }
}
