<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regions extends Model
{
    use HasFactory;

    protected $table = 'regions';

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'region_name',
    ];
}
