<?php

namespace App\Models;

use App\Enums\GenreEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use SoftDeletes;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];


    public function books():BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }

    /**
     * Get id by Name 
     * @param $name
     */
    public static function getIdByName($name)
    {
        return static::where('name', $name)->value('id');
    }

    protected $casts = [
		'name' => GenreEnum::class,
	];
}
