<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    public function post()
    {
        return $this->hasMany(Post::class, 'fk_users_id');
    }

    public function like()
    {
        return $this->hasMany(Like::class, 'fk_users_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'fk_users_id');
    }

    public function favourite()
    {
        return $this->hasMany(Save::class, 'fk_users_id');
    }

}
