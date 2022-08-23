<?php

namespace App\Domains\Category\Repositories;

use App\Domains\Category\Models\Category;

class CategoryRepository
{
  public function getAll()
  {
    return Category::all();
  }

  public function create(array $data)
  {
    return Category::create($data);
  }

  public function get(string $id)
  {
    return(Category::where('id', $id)->first());
  }

  public function getByName(string $name)
  {
    return Category::where('name', $name)->first();
  }

  public function update(array $data)
  {
    $category = Category::find($data['id']);

    foreach ($data as $key => $value) {
      $category->{$key} = $value;
    }

    return $category->save();
  }

  public function delete(string $id)
  {
    return Category::find($id)->delete();
  }
}
