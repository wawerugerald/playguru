<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industries extends Model
{
    use HasFactory;
    protected $table = 'industries';

    protected $fillable = [
        'name',
        'description',
    ];
}
