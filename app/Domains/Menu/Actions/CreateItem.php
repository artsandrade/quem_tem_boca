<?php

namespace App\Domains\Menu\Actions;

use App\Domains\File\Actions as FileActions;
use App\Domains\Menu\Exceptions\ItemAlreadyExistsException;
use App\Domains\Menu\Repositories\MenuItemRepository;

class CreateItem
{
  private $data;
  private $request;

  public function __construct(array $data, $request)
  {
    $this->data = $data;
    $this->request = $request;
  }

  public function execute()
  {
    $itemRepository = new MenuItemRepository();

    if ($itemRepository->getByName($this->data['restaurant_id'], $this->data['menu_category_id'], $this->data['name'])) {
      throw new ItemAlreadyExistsException();
    }

    $fileAction = new FileActions\Create($this->request, 'image', 'image');
    $file = $fileAction->execute();
    $this->data['file_id'] = $file->id;

    return $itemRepository->create($this->data);
  }
}
