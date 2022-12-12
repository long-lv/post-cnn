<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryChildren extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $table='category_children';
    protected $fillable=['name','parent_category'];
}
