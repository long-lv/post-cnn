<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table='post';
    protected $primaryKey='id';
    protected $fillable=['title','desc','body','category_id','thumbnail','created_by','view','active'];
}
