<?php

namespace App\Domains\Menu\Actions;

use App\Domains\Menu\Exceptions\ItemNotFoundException;
use App\Domains\Menu\Repositories\MenuItemRepository;

class UpdateItem
{
  private $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function execute()
  {
    $itemRepository = new MenuItemRepository();

    if (!$itemRepository->get($this->data['id'], $this->data['restaurant_id'], $this->data['menu_category_id'])) {
      throw new ItemNotFoundException();
    }

    return $itemRepository->update($this->data);
  }
}
