<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'hr_id',
        'admin_id',
        'action_type',
        'description',
        'timestamp',
        'performed_by',
    ];

    public function hr()
    {
        return $this->belongsTo(HRStaff::class, 'hr_id');
    }

    public function admin()
    {
        return $this->belongsTo(SystemAdmin::class, 'admin_id');
    }
}
