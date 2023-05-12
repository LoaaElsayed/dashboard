<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
        'role_id'
    ];
    public function department()
    {
        return $this->hasOne(Departmeant::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

}
