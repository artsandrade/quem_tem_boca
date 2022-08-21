<?php

namespace App\Domains\Menu\Models;

use App\Domains\Restaurant\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class MenuCategory extends Model
{
  use HasFactory, Notifiable, SoftDeletes;

  protected $table = 'menus_categories';
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
    'name',
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
    return $this->hasMany(MenuItem::class, 'menu_category_id');
  }

  public function restaurant()
  {
    return $this->belongsTo(Restaurant::class, 'restaurant_id');
  }
}
