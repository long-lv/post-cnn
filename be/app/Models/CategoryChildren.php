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
        $this->belongsTo(Category::class);
    }
}
