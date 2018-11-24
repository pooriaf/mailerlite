<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Field
 * @package App\Models
 */
class Field extends Model
{
    use SoftDeletes;

    /**
     * Fillable attributes of fields table on eloquent model
     *
     * @var array
     */
    protected $fillable = ['title', 'type'];

    /**
     * Representing the enum type column of fields resource
     *
     */
    const TYPE = [
        'DATE' => 'date',
        'NUMBER' => 'number',
        'STRING' => 'string',
        'BOOLEAN' => 'boolean',
    ];

    /**
     * Many to Many relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscribers()
    {
        return $this->belongsToMany(Subscriber::class);
    }
}
