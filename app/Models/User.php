<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'dni',
        'firstname',
        'lastname',
        'phone',
        'email',
        'password',
        'address',
        'role_id'
    ];

    public function record(){
        return $this->hasMany(Record::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

}
