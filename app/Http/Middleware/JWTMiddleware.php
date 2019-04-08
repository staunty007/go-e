<?php

namespace App\Http\Middleware;

    use Closure;
    use JWTAuth;
    use Exception;
    use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

    class JwtMiddleware extends BaseMiddleware
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
            // $request['user'] = $user;

            try {
                $user = JWTAuth::parseToken()->authenticate();
                $request['user'] = $user;
            } catch (Exception $e) {
                if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                    return response()->json([
                        'success' => false,
                        'data' => 'Token is Invalid'
                    ]);
                    // return response()->json(['status' => 'Token is Invalid']);
                }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                    // return response()->json(['status' => 'Token is Expired']);
                    return response()->json([
                        'success' => false,
                        'data' => 'Token is Expired'
                    ]);
                }else{
                    // return response()->json(['status' => 'Authorization Token not found']);
                    return response()->json([
                        'success' => false,
                        'data' => 'Authorization Token not found'
                    ]);
                }
            }
            return $next($request);
        }
    }