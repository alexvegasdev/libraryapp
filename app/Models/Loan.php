<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use SoftDeletes;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'loan_date',
        'return_date',
        'status_id'
    ];

    protected $casts = [
        'loan_date' => 'datetime:Y-m-d',
        'return_date' => 'datetime:Y-m-d',
    ];

    /**
     *  Get the user that owns the record.
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     *  The copies that belong to the record.
     */
    public function copies():BelongsToMany
    {
        return $this->belongsToMany(Copy::class,'copy_loan');
    }

    /**
     *  Get the status that owns the loan.
     */
    public function status():BelongsTo
    {
        return $this->belongsTo(LoanStatus::class);
    }

    /**
     *  Scope function  
     */
    public function scopeWhereStatus($query, $statusName)
    {
        return $query->where('status_id', LoanStatus::getIdByName($statusName));
    }

    
}
