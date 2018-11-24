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
    protected $fillable = ['email', 'name', 'state'];

    /**
     * Representing the enum state column of subscribers resource
     *
     */
    const STATE = [
        'ACTIVE' => 'active',
        'UNSUBSCRIBED' => 'unsubscribed',
        'JUNK' => 'junk',
        'BOUNCED' => 'bounced',
        'UNCONFIRMED' => 'unconfirmed',
    ];


    /**
     * Many to Many relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function fields()
    {
        return $this->belongsToMany(Field::class);
    }
}
