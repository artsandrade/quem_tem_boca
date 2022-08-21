<?php

namespace App\Domains\Menu\Models;

use App\Domains\Restaurant\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class MenuItem extends Model
{
  use HasFactory, Notifiable, SoftDeletes;

  protected $table = 'menus_items';
  protected $primaryKey = 'id';
  protected $keyType = 'string';
  public $incrementing = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'restaurant_id',
    'menu_category_id',
    'name',
    'description',
    'price',
    'status',
  ];

  protected static function boot()
  {
    parent::boot();

    static::creating(function (Model $model) {
      $model->setAttribute('id', Str::uuid()->toString());
    });
  }

  public function menu_category()
  {
    return $this->belongsTo(MenuCategory::class, 'menu_category_id');
  }

  public function restaurant()
  {
    return $this->belongsTo(Restaurant::class, 'restaurant_id');
  }
}
