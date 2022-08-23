<?php

namespace App\Domains\Menu\Controllers;

use App\Domains\Menu\Actions as ItemActions;
use App\Domains\Menu\Requests as ItemRequests;
use App\Domains\Menu\Requests\GetAllByItemRequest;
use App\Domains\Menu\Resources\ItemResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;

class MenuItemController extends Controller
{
  use HttpResponse;

  public function getAll(string $restaurant_id)
  {
    $items = new ItemActions\GetAllItems($restaurant_id);

    return ItemResource::collection($items->execute());
  }

  public function getAllByItem(GetAllByItemRequest $request)
  {
    $items = new ItemActions\GetAllByItem($request->name);

    return ItemResource::collection($items->execute());
  }

  public function create(ItemRequests\CreateItemRequest $request, string $restaurant_id, string $menu_category_id)
  {
    $data = $request->all();
    $data['restaurant_id'] = $restaurant_id;
    $data['menu_category_id'] = $menu_category_id;

    $item = new ItemActions\CreateItem($data, $request);

    return new ItemResource($item->execute());
  }

  public function get(string $restaurant_id, string $menu_category_id, string $id)
  {
    $item = new ItemActions\GetItem($id, $restaurant_id, $menu_category_id);

    return new ItemResource($item->execute());
  }

  public function update(ItemRequests\UpdateItemRequest $request, string $restaurant_id, string $menu_category_id, string $id)
  {
    $data = $request->all();
    $data['id'] = $id;
    $data['restaurant_id'] = $restaurant_id;
    $data['menu_category_id'] = $menu_category_id;

    $item = new ItemActions\UpdateItem($data);

    $item->execute();

    return $this->response('Item updated.', 200);
  }

  public function delete(string $restaurant_id, string $menu_category_id, string $id)
  {
    $item = new ItemActions\DeleteItem($id, $restaurant_id, $menu_category_id);

    $item->execute();

    return $this->response('Item deleted.', 200);
  }
}
