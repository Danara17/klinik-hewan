<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'author_id',
        'published_at'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getFormattedPublishedAtAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'post_categories', 'post_id', 'category_id');
    }
}
