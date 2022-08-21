<?php

namespace App\Domains\User\Models;

use App\Domains\Restaurant\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Str;

class User extends Authenticatable implements JWTSubject
{
  use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

  protected $table = 'users';
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
    'email',
    'password',
    'phone',
    'user_type',
    'status',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
  ];

  protected static function boot()
  {
    parent::boot();

    static::creating(function (Model $model) {
      $model->setAttribute('id', Str::uuid()->toString());
    });
  }

  // Rest omitted for brevity

  /**
   * Get the identifier that will be stored in the subject claim of the JWT.
   *
   * @return mixed
   */
  public function getJWTIdentifier()
  {
    return $this->getKey();
  }

  /**
   * Return a key value array, containing any custom claims to be added to the JWT.
   *
   * @return array
   */
  public function getJWTCustomClaims()
  {
    return [];
  }

  public function restaurant()
  {
    return $this->belongsTo(Restaurant::class, 'restaurant_id');
  }

  public function users_address()
  {
    return $this->hasMany(UserAddress::class, 'user_id');
  }
}
