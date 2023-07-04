<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class duration extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'time_start',
        'time_end',
    ];
    public function lab_absance()
    {
        return $this->belongsTo(lab_absance::class);
    }

    public function lec_absance()
    {
        return $this->belongsTo(lec_absance::class);
    }
    public function schadules()
    {
        return $this->hasMany(schadule::class);
    }
}
