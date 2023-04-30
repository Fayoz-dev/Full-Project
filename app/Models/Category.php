<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name_uz','name_ru','slug', 'meta_title', 'meta_description', 'meta_keywords'];

    public function posts(){

        return $this->hasMany(Post::class);
    }

    public static function boot(){
        parent::boot();
        static::saving(function($category){

            $category->slug = \Str::slug($category->name_uz);

        });
    }
}
