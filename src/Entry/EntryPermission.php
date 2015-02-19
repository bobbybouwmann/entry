<?php namespace Blackbirddev\Entry;

use Blackbirddev\Entry\Traits\EntryPermissionTrait;
use Illuminate\Database\Eloquent\Model;

class EntryPermission extends Model {

    use EntryPermissionTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permissions';

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