<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  protected $fillable = ['cat_id', 'title', 'text', 'slug'];

  public function category()
  {
    return $this->belongsTo(Category::class, 'cat_id', 'id');
  }

  public function photo()
  {
    return $this->hasOne(Photo::class, 'post_id');
  }
}
