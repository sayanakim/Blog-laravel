<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // поля кот.должны видны при массовом заполнении
    protected $fillable = ['title', 'body', 'img', 'slug'];

    // поля кот.должны быть не доступны при массовом заполнении
//    protected $guarded = [];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function state()
    {
        return $this->hasOne(State::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
