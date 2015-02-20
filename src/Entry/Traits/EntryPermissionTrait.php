<?php namespace Blackbirddev\Entry\Traits;

trait EntryPermissionTrait {

    /**
     * Many-to-Many relation with Role.
     *
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'permission_role', 'permission_name', 'role_id');
    }

    /**
     * Set a custom primary key
     *
     * @return string
     */
    public function getKeyName()
    {
        if (empty($this->relations))
            return 'name';

        return 'id';
    }

}