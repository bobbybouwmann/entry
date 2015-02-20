<?php namespace App;

use Blackbirddev\Entry\Traits\EntryRoleTrait;
use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    use EntryRoleTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

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