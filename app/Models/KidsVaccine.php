<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class KidsVaccine extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'kid_id',
        'vaccine_id',
        'hosp_user_id',
        'exp_admin_date',
        'admin_date',
        'real_admin_date',
    ];
    protected $dates = ['deleted_at'];
}
