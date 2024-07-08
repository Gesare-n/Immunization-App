<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Kid extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'kid_name',
        'date_of_birth',
        'place_birth',
        'gender_id',
        'parent_id',
        'com_h_user_id',
        'hosp_user_id',
       
       
    ];
    protected $dates = ['deleted_at'];
}
