<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff' ;

    public function department()
    {
        return $this->belongsTo(Departmeant::class);
    }
    public function subject()
    {
        return $this->hasOne(Subject::class);
    }

}
