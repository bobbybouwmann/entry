<?php namespace Blackbirddev\Entry\Traits;

trait EntryPermissionTrait {

    /**
     * Many-to-Many relation with Role.
     *
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'permission_role');
    }

}