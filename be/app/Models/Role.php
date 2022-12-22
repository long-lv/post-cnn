<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    use HasFactory;
    use Notifiable, SoftDeletes;
    protected $table='role';
    protected $primaryKey='id';
    protected $fillable=['name'];
}
