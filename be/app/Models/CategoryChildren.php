<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CategoryChildren extends Model
{
    use HasFactory;
    use Notifiable, SoftDeletes;
    protected $primaryKey='id';
    protected $table='category_children';
    protected $fillable=['name','parent_category'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function created_by(){
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function post(){
        return $this->hasOne(Post::class,'id','category_id');
    }
}
