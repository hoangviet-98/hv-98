<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginAdmin
{
    public function handle($request, Closure $next)
    {
        if (!get_data_user('admins')) {
            return $next($request);
        }
        return redirect()->to('/home');

    }

}
