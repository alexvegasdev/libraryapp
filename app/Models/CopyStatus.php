<?php

namespace App\Models;

use App\Enums\CopyStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function copies()
    {
        return $this->hasMany(Copy::class);
    }

    public static function getIdByName($name)
    {
        return static::where('name', $name)->value('id');
    }

    
}
