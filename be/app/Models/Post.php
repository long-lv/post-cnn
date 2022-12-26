<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Models\CategoryChildren;
class Post extends Model
{
    use HasFactory;
    use Notifiable, SoftDeletes;
    protected $table='post';
    protected $primaryKey='id';
    protected $fillable=['title','desc','body','category_id','thumbnail','created_by','view','active'];
    public function category(){
        return $this->belongsTo(CategoryChildren::class,'category_id','id');
    }
    public function createdBy(){
        return $this->belongsTo(User::class,'created_by','id');
    }
}
