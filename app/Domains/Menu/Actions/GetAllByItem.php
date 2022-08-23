<?php

namespace App\Domains\Menu\Actions;

use App\Domains\Menu\Exceptions\ItemsNotFoundException;
use App\Domains\Menu\Repositories\MenuItemRepository;

class GetAllByItem
{
  private $name;

  public function __construct(?string $name)
  {
    $this->name = $name;
  }

  public function execute()
  {
    $itemRepository = new MenuItemRepository();

    if (!$items = $itemRepository->getAllByItem($this->name)) {
      throw new ItemsNotFoundException();
    }

    return $items;
  }
}
