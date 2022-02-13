<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Actions\Actionable;
use Laravel\Nova\Fields\Searchable;

class Post extends Model
{
    use HasFactory, Searchable, Actionable;

    protected $fillable = [
        'is_published'
      ];


    protected $casts = [
        'publish_at' => 'datetime',
        'publish_until' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
