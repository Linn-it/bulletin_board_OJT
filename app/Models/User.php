<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile',
        'type',
        'phone',
        'dob',
        'address',
        'created_user_id',
        'updated_user_id'
    ];

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['name']) && isset($filters['email'])) {
            $query->where('name', 'like', '%' . request('name') . '%')
                ->where('email', 'like', '%' . request('email') . '%');
        } elseif ($filters['name'] ?? false) {
            $query->where('name', 'like', '%' . request('name') . '%');
        } elseif ($filters['email'] ?? false) {
            $query->where('email', 'like', '%' . request('email') . '%');
        } elseif ($filters['fromDate'] ?? false) {
            $query->where('created_at', 'like', '%' . request('fromDate') . '%');
        } elseif ($filters['toDate'] ?? false) {
            $query->where('updated_at', 'like', '%' . request('toDate') . '%');
        }
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts()
    {
        $this->hasMany(Post::class);
    }

    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }
}
