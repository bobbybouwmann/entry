<?php namespace Blackbirddev\Entry;

class Entry {

    /**
     * Laravel application
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Check if the current user has a role by name
     *
     * @param $role
     *
     * @return bool
     */
    public function hasRole($role)
    {
        if ($user = $this->user())
            return $user->hasRole($role);

        return false;
    }

    /**
     * Check if the current user has a permission by name
     *
     * @param $permission
     *
     * @return bool
     */
    public function hasPermission($permission)
    {
        if ($user = $this->user())
            return $user->hasPermission($permission);

        return false;
    }

    /**
     * Get the current authenticated user or return null.
     *
     * @return mixed
     */
    public function user()
    {
        return $this->app->auth->user();
    }

}