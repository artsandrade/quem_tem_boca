<?php

namespace App\Domains\File\Models;

use App\Domains\Menu\Models\MenuItem;
use App\Domains\Restaurant\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class File extends Model
{
  use HasFactory, Notifiable, SoftDeletes;

  protected $table = 'files';
  protected $primaryKey = 'id';
  protected $keyType = 'string';
  public $incrementing = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'file',
    'filename',
    'type',
    'extension',
    'size',
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
    return $this->hasOne(MenuItem::class, 'file_id');
  }

  public function restaurant()
  {
    return $this->hasOne(Restaurant::class, 'file_id');
  }
}
