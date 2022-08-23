<?php

namespace Database\Seeders;

use App\Domains\Menu\Models\MenuCategory;
use App\Domains\Menu\Models\MenuItem;
use App\Domains\Restaurant\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PopulateMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {
            $menu_categories[] = ['id' => Str::uuid()->toString(), 'restaurant_id' => $restaurant->id, 'name' => 'Pratos executivos', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
        }

        MenuCategory::insert($menu_categories);

        $categories = MenuCategory::all();

        foreach ($categories as $category) {
            $menu_items[] = [
                'id' => Str::uuid()->toString(),
                'file_id' => '82f7dda2-5f72-4535-8a31-1a3039320eb5',
                'menu_category_id' => $category->id,
                'restaurant_id' => $category->restaurant_id,
                'name' => 'Prato 1',
                'description' => 'Arroz à grega, file mignon, salada e batata frita.',
                'price' => '36.99',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            $menu_items[] = [
                'id' => Str::uuid()->toString(),
                'file_id' => 'd641d3e2-473f-47c1-a5f6-a57501af4ca2',
                'menu_category_id' => $category->id,
                'restaurant_id' => $category->restaurant_id,
                'name' => 'Prato 2',
                'description' => 'Arroz à grega, file mignon, peito de frango e salada.',
                'price' => '46.99',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            $menu_items[] = [
                'id' => Str::uuid()->toString(),
                'file_id' => '8fdea25b-809a-4600-a762-d85cb37e4ed6',
                'menu_category_id' => $category->id,
                'restaurant_id' => $category->restaurant_id,
                'name' => 'Prato 3',
                'description' => 'Arroz branco, feijão, peito de frango, vinagrete e batata frita.',
                'price' => '32.99',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            $menu_items[] = [
                'id' => Str::uuid()->toString(),
                'file_id' => '83e23978-cd9d-4f47-9b4d-de8b2edf5fe7',
                'menu_category_id' => $category->id,
                'restaurant_id' => $category->restaurant_id,
                'name' => 'Prato 4',
                'description' => 'Arroz branco, feijoada, peito de frango e salada com maionese.',
                'price' => '27.99',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        MenuItem::insert($menu_items);
    }
}
