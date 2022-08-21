<?php

namespace App\Domains\User\Models;

use App\Domains\Restaurant\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class UserAddress extends Model
{
  use HasFactory, Notifiable, SoftDeletes;

  protected $table = 'users_addresses';
  protected $primaryKey = 'id';
  protected $keyType = 'string';
  public $incrementing = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'user_id',
    'name',
    'zip_code',
    'street',
    'complement',
    'neighborhood',
    'city',
    'state',
    'latitude',
    'longitude',
    'status',
  ];

  protected static function boot()
  {
    parent::boot();

    static::creating(function (Model $model) {
      $model->setAttribute('id', Str::uuid()->toString());
    });
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
