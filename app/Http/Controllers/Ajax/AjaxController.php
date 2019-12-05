<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\State;

class AjaxController extends Controller
{
    /**
     * Get locations for appointment search index page
     */
    public function getLocations()
    {
        $query = request('q');
        $results = [];

        /**
         * Add cities with query to results
         */
        $cities = City::where('city_name', 'like', '%'.$query.'%')->get();

        foreach ($cities as $city) {
            $results[] = [
                'id' => $city->co_city,
                'text' => $city->city_name,
            ];
        }

        /**
         * Add states with query to results
         */
        $states = State::where('state_name', 'like', '%'.$query.'%')->get();

        foreach ($states as $state) {
            $results[] = [
                'id' => $state->co_state,
                'text' => $state->state_name . ' - ' . $state->state_abbrev,
            ];
        }

        /**
         * Return JSON
         */
        return response()->json($results);
    }
}
