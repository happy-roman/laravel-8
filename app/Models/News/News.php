<?php

namespace App\Models\News;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['id','category_id', 'title', 'text', 'isPrivate', 'image'];
    protected $table = 'news';

}
