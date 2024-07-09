<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Guardian extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        
        'guardian_name',
        'email',
        'phone',
        'id_no',
        'gender_id',
        'language_id',
       
    ];

    protected $dates = ['deleted_at'];
}
