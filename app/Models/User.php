<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    // use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'post_count'
    ];
    public function posts() {
        return $this->hasMany(Post::class);
    }
}
