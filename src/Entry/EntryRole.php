<?php namespace Blackbirddev\Entry;

use Blackbirddev\Entry\Traits\EntryRoleTrait;
use Illuminate\Database\Eloquent\Model;

class EntryRole extends Model {

    use EntryRoleTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * Create a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    }

}