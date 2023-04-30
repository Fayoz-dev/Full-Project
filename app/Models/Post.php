<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'title_uz' , 'title_ru' , 'body_uz' , 'body_ru' , 'slug' , 'image' , 'view' , 'meta_title', 'meta_description' , 'meta_keywords', 'is_special'];

    public function category(){

        return $this -> belongsTo(Category::class);

    }

    public function tags(){

        return $this->belongsToMany(Tag::class);

    }

    public static function boot(){
        parent::boot();
        static::saving(function($post){

            $post->slug = \Str::slug($post->title_uz);

        });
    }
}
