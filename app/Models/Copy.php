<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Copy extends Model
{
    use SoftDeletes;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'book_id',
        'status_id'
    ];
    
    /**
     *  Get the book that owns the copy.
     */
    public function book():BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    /**
     *  Get the status that owns the copy.
     */
    public function status():BelongsTo
    {
        return $this->belongsTo(CopyStatus::class);
    }

    /**
     *  Get the loans that belong to the copy.
     */
    public function loans():BelongsToMany
    {
        return $this->belongsToMany(Loan::class, 'copy_loan');
    }

    /**
     *  Scope function  
     */
    public function scopeWhereStatus($query, $statusName)
    {
        return $query->where('status_id', CopyStatus::getIdByName($statusName));
    }

}
