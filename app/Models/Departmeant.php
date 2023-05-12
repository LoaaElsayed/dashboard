<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departmeant extends Model
{
    use HasFactory;
    protected $table = 'departments' ;
    protected $fillable = [
        'name',
        'admin_id'
    ];
    public function staff()
    {
        return $this->hasMany(Staff::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
