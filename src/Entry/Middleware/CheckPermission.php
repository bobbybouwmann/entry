<?php namespace Blackbirddev\Entry\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;

class CheckPermission extends Middleware {

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
        $action = $request->route()->getAction();
        dd($action);

        if ($this->auth->user()->can($action['permission']))
        {

            return $next($request);
        }

        return redirect()->route('home');
    }

}