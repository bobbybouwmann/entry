<?php namespace Blackbirddev\Entry\Traits;

trait EntryUserTrait {

    /**
     * Many-to-Many relation with Role.
     *
     * @return mixed
     */
    public function role()
    {
        return $this->hasOne('App\Role');
    }

    /**
     * Check if the user has a role by name.
     *
     * @param $name
     *
     * @return bool
     */
    public function hasRole($name)
    {
        return ($this->role()->name == $name);
    }

    /**
     * Check if the user has a permission by name.
     *
     * @param $permission
     *
     * @return bool
     */
    public function hasPermission($permission)
    {
        return (in_array($permission, $this->role()->permissions->lists('name')));
    }

}