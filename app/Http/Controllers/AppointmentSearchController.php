<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\General\CollectionHelper;
use App\Specialty;
use App\Doctor;

class AppointmentSearchController extends Controller
{
    /**
     * Main page for appointments search
     */
    public function search()
    {
        // Retrieve all doctor specialties
        $specialties = Specialty::all();

        return view('appointments.search', [
            'specialties' => $specialties
        ]);
    }

    /**
     * Page for the search results
     */
    public function results()
    {
        /**
         * Retrive data from request
         */
        $specialty  = request('specialty');
        $location   = request('location');
        $name       = request('name');

        /**
         * Retrieve available doctors
         */
        $doctors = Doctor::where('full_name', 'LIKE', '%'.$name.'%');

        // Filter doctors with given specialty (if applicable)
        if ($specialty != -1) {
            $doctors = $doctors->whereHas('specialties', function($s) use ($specialty) {
                $s->where('id', $specialty);
            });
        }

        // Get the doctors
        $doctors = $doctors->get();

        // Filter doctors from given location
        if ($location) {

            /**
             * Filter by City
             */
            if (strlen($location) == 7) {
                $doctors = $doctors->filter(function($d) use ($location) {
                    $clinic = $d->clinic;
                    return $clinic->co_city == $location;
                });
            }
            /**
             * Or Filter by State
             */
            else {
                $doctors = $doctors->filter(function($d) use ($location) {
                    $clinic = $d->clinic;
                    $city = $clinic->city;
                    return $city->co_state == $location;
                });
            }

        }

        // Paginate doctors
        $doctors = CollectionHelper::paginate($doctors, $doctors->count(), 10);

        // Append doctors on request
        $doctors->appends(request()->query());

        
        return view('appointments.search-result', [
            'doctors' => $doctors
        ]);   
    }

}
