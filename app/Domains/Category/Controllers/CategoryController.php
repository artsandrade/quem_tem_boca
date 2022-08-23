<?php

namespace App\Domains\Category\Controllers;

use App\Domains\Category\Actions as CategoryActions;
use App\Domains\Category\Requests as CategoryRequests;
use App\Domains\Category\Resources\CategoryResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;

class CategoryController extends Controller
{
  use HttpResponse;

  public function getAll()
  {
    $categories = new CategoryActions\GetAll();

    return CategoryResource::collection($categories->execute());
  }

  public function create(CategoryRequests\CreateRequest $request)
  {
    $data = $request->all();

    $category = new CategoryActions\Create($data);

    return new CategoryResource($category->execute());
  }

  public function get(string $id)
  {
    $category = new CategoryActions\Get($id);

    return new CategoryResource($category->execute());
  }

  public function update(CategoryRequests\UpdateRequest $request, string $id)
  {
    $data = $request->all();
    $data['id'] = $id;

    $category = new CategoryActions\Update($data);

    $category->execute();

    return $this->response('Category updated.', 200);
  }

  public function delete(string $id)
  {
    $category = new CategoryActions\Delete($id);

    $category->execute();

    return $this->response('Category deleted.', 200);
  }
}
