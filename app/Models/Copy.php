<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
    

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function status()
    {
        return $this->belongsTo(CopyStatus::class);
    }

    public function records(){
        return $this->belongsToMany(Record::class);
    }

    public function scopeWhereStatus($query, $statusName)
    {
        return $query->where('status_id', CopyStatus::getIdByName($statusName));
    }

}
