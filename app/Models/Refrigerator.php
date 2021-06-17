<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refrigerator extends Model
{
    use HasFactory;
    protected $fillable = ['name','qty','value','weight','all'];
}
