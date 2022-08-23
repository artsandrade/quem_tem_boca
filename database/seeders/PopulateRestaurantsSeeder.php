<?php

namespace Database\Seeders;

use App\Domains\Restaurant\Models\Restaurant;
use App\Domains\Restaurant\Models\RestaurantBusinessHour;
use App\Domains\Restaurant\Models\RestaurantPhone;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PopulateRestaurantsSeeder extends Seeder
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
            $business_hours[] = ['id' => Str::uuid()->toString(), 'restaurant_id' => $restaurant->id, 'weekday' => 'sunday', 'from' => '10:00', 'to' => '22:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
            $business_hours[] = ['id' => Str::uuid()->toString(), 'restaurant_id' => $restaurant->id, 'weekday' => 'monday', 'from' => '10:00', 'to' => '22:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
            $business_hours[] = ['id' => Str::uuid()->toString(), 'restaurant_id' => $restaurant->id, 'weekday' => 'tuesday', 'from' => '10:00', 'to' => '22:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
            $business_hours[] = ['id' => Str::uuid()->toString(), 'restaurant_id' => $restaurant->id, 'weekday' => 'wednesday', 'from' => '10:00', 'to' => '22:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
            $business_hours[] = ['id' => Str::uuid()->toString(), 'restaurant_id' => $restaurant->id, 'weekday' => 'thursday', 'from' => '10:00', 'to' => '22:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
            $business_hours[] = ['id' => Str::uuid()->toString(), 'restaurant_id' => $restaurant->id, 'weekday' => 'friday', 'from' => '10:00', 'to' => '22:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
            $business_hours[] = ['id' => Str::uuid()->toString(), 'restaurant_id' => $restaurant->id, 'weekday' => 'saturday', 'from' => '10:00', 'to' => '22:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];


            $phones[] = ['id' => Str::uuid()->toString(), 'restaurant_id' => $restaurant->id, 'number' => '16981946352', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
        }

        RestaurantBusinessHour::insert($business_hours);
        RestaurantPhone::insert($phones);
    }
}
