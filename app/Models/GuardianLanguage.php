<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class GuardianLanguage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        
        'guardian_id',
        'language_id',
       
    ];
    protected $dates = ['deleted_at'];
}
