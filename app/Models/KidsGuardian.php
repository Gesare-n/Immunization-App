<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class KidsGuardian extends Model
{   
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'kid_id',
        'guardian_id',
        'relationship',
       
    ];
    protected $dates = ['deleted_at'];
}
