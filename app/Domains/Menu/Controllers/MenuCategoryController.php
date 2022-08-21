<?php

namespace App\Domains\Menu\Controllers;

use App\Domains\Menu\Actions as CategoryActions;
use App\Domains\Menu\Requests as CategoryRequests;
use App\Domains\Menu\Resources\CategoryResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;

class MenuCategoryController extends Controller
{
  use HttpResponse;

  public function getAll(string $restaurant_id)
  {
    $categories = new CategoryActions\GetAllCategories($restaurant_id);

    return new CategoryResource($categories->execute());
  }

  public function create(CategoryRequests\CreateCategoryRequest $request, string $restaurant_id)
  {
    $data = $request->all();
    $data['restaurant_id'] = $restaurant_id;

    $category = new CategoryActions\CreateCategory($data);

    return new CategoryResource($category->execute());
  }

  public function get(string $restaurant_id, string $id)
  {
    $category = new CategoryActions\GetCategory($id, $restaurant_id);

    return new CategoryResource($category->execute());
  }

  public function update(CategoryRequests\UpdateCategoryRequest $request, string $restaurant_id, string $id)
  {
    $data = $request->all();
    $data['id'] = $id;
    $data['restaurant_id'] = $restaurant_id;

    $category = new CategoryActions\UpdateCategory($data);

    $category->execute();

    return $this->response('Category updated.', 200);
  }

  public function delete(string $restaurant_id, string $id)
  {
    $category = new CategoryActions\DeleteCategory($id, $restaurant_id);

    $category->execute();

    return $this->response('Category deleted.', 200);
  }
}
