<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'title',
        'description',
        'edition_year',
        'author_id'
    ];

    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    /**
     *  Get the author that owns the book.
     */
    public function author():BelongsTo      
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * The genres that belong to the book.
     */
    public function genres():BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    /**
     * Get the copies for the book.
     */

    public function copies():HasMany
    {
        return $this->hasMany(Copy::class);
    }

    /**
     * Get the photos for the book.
     */
    public function photos(): HasMany 
    {
        return $this->hasMany(BookPhoto::class);
    }

}
