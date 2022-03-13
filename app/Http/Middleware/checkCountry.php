<?php

namespace App\Http\Middleware;

use App\Models\Country;
use Closure;
use Illuminate\Http\Request;

class checkCountry
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth('api')->check()) {
            $countries = Country::pluck('id')->toArray();
            $user = auth('api')->user();
            $cart = $user->cart()->first();
            $countryId = $cart->product->vendor->country_id ?? null;
            if ($request->wantsJson()) {
                if ($request->hasHeader('CountryID') && in_array(request()->header('CountryID'), $countries)) {
                    $user->country_id = $request->header('CountryID');
                    $user->save();
                }
                if ($request->hasHeader('CountryID') && $countryId != $request->header('CountryID')) {
                    $user->cart()->delete();
                }
            }
        }
        return $next($request);
    }
}
