<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'edition_year',
        'author_id'
    ];

    // Relacion de uno a uno
    public function author(){
        return $this->belongsTo(Author::class);
    }

    // Relacion de muchos a muchos
    public function genres(){
        return $this->belongsToMany(Genre::class);
    }

    public function copies(){
        return $this->hasMany(Copy::class);
    }
}
