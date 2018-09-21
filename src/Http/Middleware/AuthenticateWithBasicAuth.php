<?php

declare(strict_types=1);

namespace Cortex\Foundation\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as AuthFactory;

/* @TODO: Remove this override with Laravel v5.7 */
class AuthenticateWithBasicAuth
{
    /**
     * The guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param \Illuminate\Contracts\Auth\Factory $auth
     *
     * @return void
     */
    public function __construct(AuthFactory $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param string|null              $guard
     * @param string|null              $field
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null, $field = null)
    {
        return $this->auth->guard($guard)->basic($field) ?: $next($request);
    }
}
