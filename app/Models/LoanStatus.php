<?php

namespace App\Models;

use App\Enums\LoanStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanStatus extends Model
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
		'name' => LoanStatusEnum::class,
	];


    /**
     *  Get the loans for the loanstatus.
     */
    public function loans():HasMany
    {
        return $this->hasMany(Loan::class);
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
