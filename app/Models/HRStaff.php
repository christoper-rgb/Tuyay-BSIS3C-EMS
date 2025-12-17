<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HRStaff extends Model
{
    protected $table = 'hr_staff';
    protected $primaryKey = 'hr_id';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password_hash',
        'full_name',
        'role',
    ];
}
