<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';

    // PRIMARY KEY sa table mo ay `id`
    protected $primaryKey = 'id';

    protected $fillable = [
        'hr_id',
        'employee_id',
        'report_type',
        'generated_date',
        'description',
    ];

    // Relasyon sa HR Staff
    public function hr()
    {
        return $this->belongsTo(HRStaff::class, 'hr_id', 'hr_id');
    }

    // Relasyon sa Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
