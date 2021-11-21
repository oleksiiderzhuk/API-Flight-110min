<?php

namespace App\Services\v1;

use App\Flight;

class FlightService{
    public function getAllFlights(){
        return Flight::all(); 
    }

    public function getFlights(){
        return $this->filterFlights(Flight::all()); 
    }

    protected function filterFlights($flights){
        $data = [];
        foreach ($flights as $flight){

            $href = route('flights.show', $flight->flightNumber);
            $href = str_replace(
                '\\\\-', 
                '', 
                $href);

            $entry = [
                'flightNumber' => $flight->flightNumber,
                'status' => $flight->status,
                // ,

                'href' => $href,
            ];
            $data[] = $entry;
        }
        return $data;
    }
}

