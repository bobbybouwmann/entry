<?php namespace Blackbirddev\Entry\Middleware;

use Blackbirddev\Entry\EntryFacade;
use Closure;
use Illuminate\Contracts\Auth\Guard;

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
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ( ! EntryFacade::hasPermission($request->route()->getName()))
            abort(403, 'Unauthorized action.');

        return $response;
    }

}