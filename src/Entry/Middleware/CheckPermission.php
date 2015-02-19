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

        dd($request->route()->getAction()['permission']);

        /**
         * If User has the correct permission based on the route_name linked in the database
         * then let them go to the correct location else redirect to the
         * homepage (route_name should be editable in config)
         */

        return $return;
    }

}