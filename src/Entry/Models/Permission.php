<?php namespace App;

use Blackbirddev\Entry\Traits\EntryPermissionTrait;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

    use EntryPermissionTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'display_name', 'description'];

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