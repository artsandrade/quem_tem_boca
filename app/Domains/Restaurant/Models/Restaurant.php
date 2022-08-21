<?php

namespace App\Domains\Restaurant\Models;

use App\Domains\Menu\Models\MenuCategory;
use App\Domains\Menu\Models\MenuItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Restaurant extends Model
{
  use HasFactory, Notifiable, SoftDeletes;

  protected $table = 'restaurants';
  protected $primaryKey = 'id';
  protected $keyType = 'string';
  public $incrementing = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'corporate_name',
    'document',
    'email',
    'zip_code',
    'street',
    'complement',
    'neighborhood',
    'city',
    'state',
    'latitude',
    'longitude',
    'delivery_time',
    'delivery_fee',
    'status',
  ];

  protected static function boot()
  {
    parent::boot();

    static::creating(function (Model $model) {
      $model->setAttribute('id', Str::uuid()->toString());
    });
  }

  public function menu_item()
  {
    return $this->hasMany(MenuItem::class, 'restaurant_id');
  }

  public function menu_category()
  {
    return $this->hasMany(MenuCategory::class, 'restaurant_id');
  }
  
  public function restaurant_phone()
  {
    return $this->hasMany(RestaurantPhone::class, 'restaurant_id');
  }

  public function restaurant_business_hour()
  {
    return $this->hasMany(RestaurantBusinessHour::class, 'restaurant_id');
  }
}
