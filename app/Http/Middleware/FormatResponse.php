<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class FormatResponse
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
        $response = $next($request);

        if ($response->status() == 422) {
            $data = $response->getOriginalContent();
            if (!empty($data['errors'])) {
                $data['message'] = array_first(array_first($data['errors']));
                $response->setContent(json_encode($data));
            }
        }


        return $response;
    }
}
