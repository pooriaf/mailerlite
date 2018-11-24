<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Subscriber
 * @package App\Models
 */
class Subscriber extends Model
{
    use SoftDeletes;

    /**
     * Guarding state parameter
     * @var array
     */
    protected $fillable = ['email', 'name'];

    /**
     * Representing the enum state column of subscribers table
     */
    const STATE = [
        'ACTIVE' => 'active',
        'UNSUBSCRIBED' => 'unsubscribed',
        'JUNK' => 'junk',
        'BOUNCED' => 'bounced',
        'UNCONFIRMED' => 'unconfirmed',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function fields()
    {
        return $this->belongsToMany(Field::class);
    }
}
