<?php namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class VerifyApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($user = User::where('api_key', $request->get('api_key'))->first()) {
            $request->replace(
                // Append the user_id to the request input
                $request->all() + ['user_id' => $user->id]
            );
            return $next($request);
        }

        return abort(401, 'Valid API key required.');
    }
}
