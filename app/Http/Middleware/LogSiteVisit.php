<?php

namespace App\Http\Middleware;

use App\Models\SiteVisit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stevebauman\Location\Facades\Location;
use Carbon\Carbon;

class LogSiteVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $userAgent = $request->userAgent();
        $sessionKey = 'site_visit_logged_' . $ip;

        if (!session()->has($sessionKey)) {
            // Only log if this IP hasn’t been logged in this session
            $existingVisit = SiteVisit::where('ip_address', $ip)->first();

            if ($existingVisit) {
                $existingVisit->increment('visits_count');
                $existingVisit->last_visit_at = now();
                $existingVisit->save();
            } else {
                $location = \Stevebauman\Location\Facades\Location::get($ip) ?? (object)[
                    'countryName' => 'Unknown',
                    'regionName' => 'Unknown',
                    'cityName' => 'Unknown',
                ];

                SiteVisit::create([
                    'ip_address' => $ip,
                    'country' => $location ? $location ->countryName : "",
                    'region' => $location ? $location ->regionName : "",
                    'city' => $location ? $location ->cityName : "",
                    'user_agent' => $userAgent,
                    'device_type' => $this->detectDevice($userAgent),
                    'last_visit_at' => now(),
                ]);
            }

            // Store in session so we don’t count again until session resets
            session()->put($sessionKey, true);
        }

        return $next($request);
    }


    private function detectDevice($userAgent)
    {
        if (preg_match('/mobile/i', $userAgent)) return 'Mobile';
        if (preg_match('/tablet/i', $userAgent)) return 'Tablet';
        return 'Desktop';
    }

    private function isIgnored(Request $request)
    {
        $excludedPaths = [
            'api/*',
            'admin/*',
            // Add more patterns as needed
        ];

        foreach ($excludedPaths as $pattern) {
            if ($request->is($pattern)) {
                return true;
            }
        }

        return in_array($request->ip(), ['127.0.0.1', '::1']); // Local dev IPs
    }
}
