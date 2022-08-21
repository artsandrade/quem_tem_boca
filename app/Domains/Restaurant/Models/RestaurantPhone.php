<?php

namespace App\Domains\Restaurant\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class RestaurantPhone extends Model
{
  use HasFactory, Notifiable, SoftDeletes, Uuid;

  protected $table = 'restaurants_phones';
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
    'number',
    'status',
  ];

  public function restaurant()
  {
    return $this->belongsTo(Restaurant::class, 'restaurant_id');
  }
}
