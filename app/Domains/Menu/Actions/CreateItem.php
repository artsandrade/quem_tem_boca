<?php

namespace App\Domains\Menu\Actions;

use App\Domains\Menu\Exceptions\ItemAlreadyExistsException;
use App\Domains\Menu\Repositories\MenuItemRepository;

class CreateItem
{
  private $data;

  public function __construct(array $data)
  {
    $this->data = $data;
  }

  public function execute()
  {
    $itemRepository = new MenuItemRepository();

    if ($itemRepository->getByName($this->data['restaurant_id'], $this->data['menu_category_id'], $this->data['name'])) {
      throw new ItemAlreadyExistsException();
    }

    return $itemRepository->create($this->data);
  }
}
