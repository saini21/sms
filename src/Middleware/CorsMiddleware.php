<?php
// In src/Middleware/TrackingCookieMiddleware.php
namespace App\Middleware;

use Cake\I18n\Time;

class TrackingCookieMiddleware {
    public function __invoke($request, $response, $next) {
        // Calling $next() delegates control to the *next* middleware
        // In your application's queue.
        $response = $next($request, $response);
        
        // When modifying the response, you should do it
        // *after* calling next.
        if (!$request->getCookie('landing_page')) {
            $expiry = new Time('+ 1 year');
            $response = $response->withCookie('landing_page', [
                'value' => $request->here(),
                'expire' => $expiry->format('U'),
            ]);
        }
        return $response;
    }
}

?>
