<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function kullanici()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }
}
