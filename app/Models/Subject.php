<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table='subjects' ;
    protected $fillable = [
        'name',
        'academy_year',
        'semester',
        'department_id',
        'staff_id'
    ];

    public function department()
    {
        return $this->belongsTo(Departmeant::class);
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
