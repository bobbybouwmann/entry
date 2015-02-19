<?php namespace Blackbirddev\Entry;

class Entry
{

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
     * @param bool $requireAll
     *
     * @return bool
     */
    public function hasRole($role, $requireAll = false)
    {
        if ($user = $this->user()) {
            return $user->hasRole($role, $requireAll);
        }

        return false;
    }

    /**
     * Check if the current user has a permission by name
     *
     * @param $permission
     * @param bool $requireAll
     *
     * @return bool
     */
    public function can($permission, $requireAll = false)
    {
        if ($user = $this->user()) {
            return $user->can($permission, $requireAll);
        }

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