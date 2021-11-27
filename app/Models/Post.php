<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'post_image');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['leita'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%");
            });
        })
        ->when($filters['flokkur'] ?? null, function ($query, $sort) {
            $query->where(function ($query) use ($sort) {
                $query->whereHas('tags', function ($query) use($sort) {
                    $query->where('title', 'like', "%{$sort}%");
                });
            });
        })
        ->when($filters['höfundur'] ?? null, function ($query, $sort) {
            $query->where(function ($query) use ($sort) {
                $query->whereHas('author', function ($query) use($sort) {
                    $query->where('name', 'like', "%{$sort}%");
                });
            });
        });
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->locale('is_IS')->isoFormat('Do MMM YYYY');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->locale('is_IS')->isoFormat('Do MMM YYYY');
    }
}
