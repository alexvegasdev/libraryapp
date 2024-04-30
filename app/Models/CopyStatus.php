<?php

namespace App\Models;

use App\Enums\CopyStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CopyStatus extends Model
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

    protected $casts = [
		'name' => CopyStatusEnum::class,
	];


    /**
     *  Get the copies for the copystatus.
     */
    public function copies():HasMany
    {
        return $this->hasMany(Copy::class);
    }

    /**
     *  Get id by name
     * @param $name
     */
    public static function getIdByName($name)
    {
        return static::where('name', $name)->value('id');
    }

}
