<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'loan_date',
        'return_date',
        'user_id'
    ];

    public function customer(){
        return $this->belongsTo(User::class);
    }

    public function copies(){
        return $this->belongsToMany(Copy::class);
    }
}
