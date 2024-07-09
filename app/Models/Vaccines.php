<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vaccines extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'vaccine_name',
        'gender_id',
        'admin_days',
        
    ];
    protected $dates = ['deleted_at'];
}
