<?php namespace Blackbirddev\Entry\Traits;

trait EntryRoleTrait {

    /**
     * Many-to-Many relations with User.
     *
     * @return mixed
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    /**
     * Many-to-Many relation with Permission.
     *
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'permission_role', 'role_id', 'permission_name');
    }

    /**
     * Attach permission to the current role.
     *
     * @param mixed
     */
    public function attachPermission($permission)
    {
        if (is_object($permission))
        {
            $permission = $permission->getKey();
        }

        if (is_array($permission))
        {
            $permission = $permission['id'];
        }

        $this->permissions()->attach($permission);
    }

    /**
     * Detach permission from the current role.
     *
     * @param mixed
     */
    public function detachPermission($permission)
    {
        if (is_object($permission))
        {
            $permission = $permission->getKey();
        }

        if (is_array($permission))
        {
            $permission = $permission['id'];
        }

        $this->permissions()->detach($permission);
    }

    /**
     * Attach multiple permissions to role.
     *
     * @param mixed $permissions
     */
    public function attachPermissions($permissions)
    {
        foreach ($permissions as $permission)
        {
            $this->attachPermission($permission);
        }
    }

    /**
     * Detach multiple permissions from role
     *
     * @param mixed $permissions
     */
    public function detachPermissions($permissions)
    {
        foreach ($permissions as $permission) {
            $this->detachPermission($permission);
        }
    }

}