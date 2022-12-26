<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\CategoryChildren;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use Notifiable, SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable;
    protected $table='user';
    protected $primaryKey='id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'thumbnail',
        'role_id'
    ];

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
    ];
    public function post(){
        return $this->hasMany(Post::class, 'created_by');
    }
    public function category(){
        return $this->hasMany(Category::class, 'id', 'created_by');
    }
    public function categoryChildren(){
        return $this->hasMany(CategoryChildren::class, 'id', 'created_by');
    }
}
