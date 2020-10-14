<?php


namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'slug'];
    protected $table = 'categories';
}
