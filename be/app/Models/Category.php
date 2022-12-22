<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


class Category extends Model
{
    use HasFactory;
    use Notifiable, SoftDeletes;
    protected $table='category';
    protected $primaryKey='id';
    protected $fillable=['name','created_by'];
    public function children_category(){
        return $this->hasOne(children_category::class, 'id', 'parent_category');
    }
}
