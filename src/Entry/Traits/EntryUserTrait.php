<?php namespace Blackbirddev\Entry\Traits;

trait EntryUserTrait {

    /**
     * hasOne relation with Role.
     *
     * @return mixed
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * Check if the user has a role by name.
     *
     * @param $name
     * @param bool $requireAll
     *
     * @return bool
     */
    public function hasRole($name, $requireAll = false)
    {
        if (is_array($name))
        {
            foreach ($name as $roleName)
            {
                $hasRole = $this->hasRole($roleName);

                if ($hasRole && ! $requireAll)
                {
                    return true;
                }
                elseif ( ! $hasRole && $requireAll)
                {
                    return false;
                }
            }

            return $requireAll; // None of all of the roles where found so we return the $requireAll value.
        }
        else
        {
            foreach ($this->roles as $role)
            {
                if ($role->name == $name)
                {
                    return true;
                }
            }
        }

        return false;
    }


    /**
     * Check if the user has a permission by name.
     *
     * @param $permission
     * @param bool $requireAll
     *
     * @return bool
     */
    public function can($permission, $requireAll = false)
    {
        if (is_array($permission))
        {
            foreach ($permission as $permName)
            {
                $hasPermission = $this->can($permName);

                if ($hasPermission && ! $requireAll)
                {
                    return true;
                }
                elseif ( ! $hasPermission && $requireAll)
                {
                    return false;
                }
            }

            return $requireAll; // None of all of the permissions where found so we return the $requireAll value.
        }
        else
        {
            foreach ($this->role()->permissions as $perm)
            {
                if ($perm->name == $permission)
                {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Attach role to user.
     *
     * @param $role
     */
    public function attachRole($role)
    {
        if (is_object($role))
        {
            $role = $role->getKey();
        }

        if (is_array($role))
        {
            $role = $role['id'];
        }

        $this->roles()->attach($role);
    }

    /**
     * Detach role from user.
     *
     * @param $role
     */
    public function detachRole($role)
    {
        if (is_object($role))
        {
            $role = $role->getKey();
        }

        if (is_array($role))
        {
            $role = $role['id'];
        }

        $this->roles()->detach($role);
    }

    /**
     * Attach multiple roles to user.
     *
     * @param $roles
     */
    public function attachRoles($roles)
    {
        foreach ($roles as $role)
        {
            $this->attachRole($role);
        }
    }

    /**
     * Detach multiple roles from user.
     *
     * @param $roles
     */
    public function detachRoles($roles)
    {
        foreach ($roles as $role)
        {
            $this->detachRole($role);
        }
    }

}