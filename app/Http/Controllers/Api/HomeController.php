<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdsResource;
use App\Http\Resources\AllVendorResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\CuisineResource;
use App\Http\Resources\VendorResource;
use App\Models\Ads;
use App\Models\Area;
use App\Models\Country;
use App\Models\Cuisine;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        setToken();
        if ($request->type == 2) {
            $trendingVendors = Vendor::checkAvailability()->when(request('type'), function ($query, $val) {
            })->with('image', 'cuisines')->withCount('orders', 'views')
                                     ->orderBy('orders_count', 'desc')
                                     ->whereIn('type', [2, 3])
                                     ->where('country_id', getCountry()->id)
                                     ->whereHas('orders', function ($q) {
                                         $q->where('orders.created_at', '>=', Carbon::now()->subDays(7));
                                     })->take(15)->get();
        } else {
            $trendingVendors = Vendor::checkAvailability()->when(request('type'), function ($query, $val) {
            })->with('image', 'cuisines')->withCount('bookings', 'views')
                                     ->orderBy('bookings_count', 'desc')
                                     ->whereIn('type', [1, 3])
                                     ->where('country_id', getCountry()->id)
                                     ->whereHas('bookings', function ($q) {
                                         $q->where('bookings.created_at', '>=', Carbon::now()->subDays(7));
                                     })->take(15)
                                     ->get();
        }

        $vendors = Vendor::checkAvailability()->when(request('keyword'), function ($query, $val) {
            return $query->where('name->ar', 'like', "%" . $val . "%")
                         ->orWhere('name->en', 'like', "%" . $val . "%");
        })->when(request('type'), function ($query, $val) {
            if ($val == 1) {
                return $query->whereIn('type', ['1', '3']);
            } elseif ($val == 2) {
                return $query->whereIn('type', ['2', '3']);
            } else {
                return $query->where('type', $val);
            }
        })->when(request('cuisines'), function ($query, $val) {
            return $query->whereHas('cuisines', function ($query) use ($val) {
                if (!is_array($val)) {
                    $val = explode(',', $val);
                }
                return $query->whereIn('cuisine_id', $val);
            });
        })->where('country_id', getCountry()->id)->with('image', 'cuisines')->withCount('bookings', 'views')
                         ->latest()->paginate(10);
        $data['trending'] = VendorResource::collection($trendingVendors);
        $vendors = VendorResource::collection($vendors);
        $data['last_page'] = $vendors->lastPage();
        $data['current_page'] = $vendors->currentPage();
        $vendors = collect($vendors);
        $counter = (int)($vendors->count() / 3);
        $ads_ids = [];
        for ($i = 0; $i < $counter; $i++) {
            if ($i == $counter) break;
            $count = 3 + (4 * $i);
            $ads = Ads::with('image')->where('type', 'home')->whereNotIn('id', $ads_ids)->orderBy('sort')->take(3);
            $ads_ids = array_merge($ads->pluck('id')->toArray(), $ads_ids);
            //dd($ads_ids);
            if ($ads->count()) {
                $vendors->splice($count, 0, collect(['ads' => AdsResource::collection($ads->where('type', 'home')
                                                                                          ->orderBy('sort')->get())]));
            }
        }
        $data['vendors'] = $vendors;
        $data['all_vendors'] = AllVendorResource::collection(Vendor::paginate(10));
        return api_response($data);
    }

//    function paginateCollection($items, $perPage = 15, $page = null, $options = [])
//    {
//        $page = $page ?: (\Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1);
//        $items = $items instanceof \Illuminate\Support\Collection ? $items : \Illuminate\Support\Collection::make($items);
//        return new \Illuminate\Pagination\LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
//    }


    public function show($id)
    {
        $vendor = Vendor::with('image', 'images')->withCount('bookings', 'views')->findOrFail($id);
        $vendor->views()->firstOrCreate(['ip' => request()->ip()]);
        return api_response(new VendorResource($vendor), 'Restaurant details');
    }


    public function cuisines()
    {
        $cuisines = Cuisine::orderBy('sort')->paginate(10);
        return api_response(CuisineResource::collection($cuisines), 'List of cuisines');
    }


    public function countries()
    {
        $countries = Country::with('image')->orderBy('sort', 'asc')->get();
        return api_response(CountryResource::collection($countries), 'List of countries');
    }


    public function ads()
    {
        $ads = new AdsResource(Ads::with('image')->orderBy('sort')->first());
        return api_response($ads, 'List of ads screen');
    }

    public function regions(Request $request)
    {
        $regions = Area::where(function ($q) use ($request) {
            if ($request->has('country_id')) {
                $q->where('country_id', $request->country_id);
            }
        })->get();
        return api_response($regions, 'list of regions');
    }
}
