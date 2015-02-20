<?php namespace Blackbirddev\Entry\Middleware;

use Closure;

class CheckPermission {

    /**
     * @var
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param callable $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        $return = $next($request);

        dd($this->auth);

        // Get the correct route name.
        // Check if the current user has the permission with the same name as the route name.

        // Redirect to the correct page
        // If not redirect to the homepage

        dd($request->route()->getAction()['permission']);

        return $return;
    }

}