<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'created_user_id',
        'updated_user_id',
    ];

    public function scopeFilter($query, $filters)
    {
        if ($filters ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_user_id');
    }
}
